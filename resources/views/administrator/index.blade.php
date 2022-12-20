@extends('layouts.mainlayout')

@section('content')

<?php

use App\Models\Config;
use App\Models\District;
use App\Models\Regency;
use App\Models\SaksiData;
use App\Models\Tps;
use App\Models\Village;
use App\Models\User;
use Illuminate\Support\Facades\DB;

$config = Config::all()->first();
$regency = District::where('regency_id', $config['regencies_id'])->get();
$kota = Regency::where('id', $config['regencies_id'])->first();
$dpt = District::where('regency_id', $config['regencies_id'])->sum('dpt');
$tps = Tps::count();
?>

<style>
    .open-desktop{
        display: block;
    }
    
    @media (max-width: 1680px) { 
        
        .open-desktop{
            display: none;
        }
        
        .break-point-1{
            flex: 0 0 50%;
            max-width: 50%;
        }
        
        .break-point-2{
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
    @media (max-width: 1024px) { 
        
        .open-desktop{
            display: none;
        }
        
        .break-point-1{
            flex: 0 0 100%;
            max-width: 100%;
        }
        
        .break-point-2{
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>

<div class="row mt-3">
    <div class="col-lg-3 col-md-6 break-point-1">
        <h1 class="page-title fs-1 mt-2">Dashboard Rekapitung
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$kota['name']}}
                <!-- Kota -->
            </li>
        </ol>
        @if($config->multi_admin == "yes")
        <?php
        $userOnline = User::where('role_id',1)->count();
        $jumlahOrang = 0;
        // foreach($userOnline as $user){
        //     if(Cache::has('is_online' . $user->id)){
        //         $jumlahOrang +=1;
        //     }
        // }
        ?>
        <h4 class="fs-4 mt-2 fw-bold">Multi Administator ({{$userOnline}}) </h4> <!-- This Dummy Data -->
        @else
        <h4 class="fs-4 mt-2 fw-bold">Multi Administator (1) </h4> <!-- This Dummy Data -->
        
        @endif
        <h5>
            {{Auth::user()->name}}
        </h5>
    </div>
    
    <div class="col-lg-9 col-xxl-0 justify-content-end mt-2 break-point-1">
        <div class="row">
            

            <div class="col open-desktop">
                
                <div class="">
                    <div class="card" style="margin-bottom: 0px;">
                        <div class="card-body" style="padding: 5px; padding-bottom: 0px">
                            <div class="card-header text-center" style="padding: 0px; padding-bottom: 10px">
                                <div class="card-title mx-auto">
                                    
                                    Mode Sistem <i class="fa fa-question-circle"  data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Mode sistem adalah status sistem Rekapitung yang dibagi menjadi tiga bagian, yaitu : mode saksi, mode relawan dan mode hacker. Ketiga mode ini berjalan pada hari yang sama dengan pembagian waktu yang telah di tetapkan."></i>
                                </div>
                            </div>
                            <div class="row mx-auto text-center">
                                <div class="col-xxl-3 my-auto">
                                    <a href="https://time.is/Jakarta" id="time_is_link" rel="nofollow" style="font-size:25px"></a>
                                    <span id="Jakarta_z41c" style="font-size:27px"></span> <div style="font-size:27px">WIB</div>
                                    <script src="//widget.time.is/t.js"></script>
                                    <script>
                                    time_is_widget.init({Jakarta_z41c:{}});
                                    </script>
                                </div>
                                <div class="col-md me-auto">
                                    <div class="row">
                                        
                                        <div class="col mt-2">
                                            <div class="card" style="margin-bottom: 0px;">
                                                <div class="card-body text-center" style="padding: 0px;">
                                                    <i class="fe fe-user fs-4"></i>
                                                </div>
                                                <div class="card-footer text-center" style="color: black; padding: 0px">
                                                    @if ($jam > 8 && $jam < 21)
                                                    <div class="badge bg-success">Saksi : Aktif</div>
                                                    @else
                                                    <div class="badge bg-danger">Saksi : Nonaktif</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <h5  style="font-size:13px" class="text-center mt-3">09.00 - 21.00</h5>
                                        </div>
                                        <div class="col mt-2">
                                            <div class="card" style="margin-bottom: 0px;">
                                                <div class="card-body text-center" style="padding: 0px;">
                                                    <i class="fe fe-user fs-4"></i>
                                                </div>
                                                <div class="card-footer text-center" style="color: black; padding: 0px">
                                                    
                                                    @if ($jam > 14 && $jam < 21)
                                                    <div class="badge bg-success">Relawan : aktif</div>
                                                    @else
                                                    
                                                    <div class="badge bg-danger">Relawan : Nonaktif</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <h5  style="font-size:13px" class="text-center mt-3">14.00 - 21.00</h5>
                                        </div>
                                        <div class="col mt-2">
                                            <div class="card" style="margin-bottom: 0px;">
                                                <div class="card-body text-center" style="padding: 0px;">
                                                    <i class="fe fe-user fs-4"></i>
                                                </div>
                                                <div class="card-footer text-center" style="color: black; padding: 0px">
                                                        @if ($jam >= 21)
                                                        <div class="badge bg-success">Hacker : Aktif</div>
                                                        @else
                                                        <div class="badge bg-danger">Hacker : Nonaktif</div>
                                                        @endif
                                                </div>
                                            </div>
                                            <h5  style="font-size:13px" class="text-center mt-3">21.00 - dst</h5>
                                        </div>
                                    </div>
                                
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
              
              
        

            <div class="col-lg-6 col-md-6 justify-content-end  break-point-2">
                <div class="card" style="margin-bottom: 0px;">
                    <div class="card-body">
                        <div class="row mx-auto">
                            <div class="col-3 ">
                                <div class="counter-icon box-shadow-secondary brround candidate-name text-white bg-danger" style="margin-bottom: 0;">
                                    1
                                </div>
                            </div>
                            <div class="col me-auto">
                                <h6 class="">Suara Tertinggi</h6>
                                <h3 class="mb-2 number-font">{{$paslon_tertinggi['candidate']}} /
                                    {{$paslon_tertinggi['deputy_candidate']}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-8 justify-content-end mt-2">
        <div class="row">
            <div class="col-lg-4 justify-content-end">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="card-title text-white">Real Count</div>
                    </div>
                    <div class="card-body">
                        <p class="">{{substr($realcount,0,5)}}%</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="card-title text-white">TPS Masuk</div>
                    </div>
                    <div class="card-body">
                        <p class="">{{$total_verification_voice}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="card-title text-white">Suara Masuk</div>
                    </div>
                    <div class="card-body">
                        <p class="">{{$total_incoming_vote}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<div class="row" id="marquee1">
    <div class="input-group input-group-sm">
        <div class="input-group-prepend">
            <button class="btn btn-danger text-white rounded-0 mt-5">Suara Masuk</button>
        </div>
        <div class="form-control mt-5 bg-dark" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            <marquee id="cobamarq1">
                @foreach ($marquee as $item)
                <?php $kecamatan =  District::where('id', $item['districts'])->first(); ?>
                <?php $kelurahan =  Village::where('id', $item['villages'])->first(); ?>
                <?php $tps =  Tps::where('id', $item['tps_id'])->first(); ?>
                <span class="text-danger">▼</span><span class="text-white" style="font-size: 20px;">{{$item['name']}} Kecamatan {{$kecamatan['name']}}, Kelurahan {{$kelurahan['name']}}, TPS {{$tps['number']}}
                </span><span class="text-success">▲</span>
                @endforeach
            </marquee>


        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="{{($config->otonom == 'yes')?'col-lg-12 col-md-12':'col-lg-6 col-md-12'}}">
        <div class="card">
            <div class="card-header bg-info-gradient">
                <h3 class="card-title text-white">Suara TPS Masuk</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="container" style="margin-left: 3%; margin-top: 10%;">
                            <div class="text-center">Progress {{substr($realcount,0,5)}}% dari 100%</div>
                            <div id="chart-pie" class="chartsh h-100 w-100"></div>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <?php $i = 1; ?>
                        @foreach ($paslon as $pas)
                        <div class="row mt-2">
                            <div class="col-lg col-md col-sm col-xl mb-3">
                                <div class="card" style="margin-bottom: 0px;">
                                    <div class="card-body">
                                        <div class="row me-auto">
                                            <div class="col-4">
                                                <div class="counter-icon box-shadow-secondary brround candidate-name text-white " style="margin-bottom: 0; background-color: {{$pas->color}};">
                                                    {{$i++}}
                                                </div>
                                            </div>
                                            <div class="col me-auto">
                                                <h6 class="">{{$pas->candidate}} </h6>
                                                <h6 class="">{{$pas->deputy_candidate}} </h6>
                                                <?php
                                                $voice = 0;
                                                ?>
                                                @foreach ($pas->saksi_data as $dataTps)
                                                <?php
                                                $voice += $dataTps->voice;
                                                ?>
                                                @endforeach
                                                <h3 class="mb-2 number-font">{{ $voice }} suara</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12" style="display:{{($config->otonom == 'yes')?'none':'block'}}">
        <div class="card">
            <div class="card-header bg-secondary-gradient">
                <h3 class="card-title text-white">Suara TPS Terverifikasi</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="container" style="margin-left: 3%; margin-top: 10%;">
                            <div class="text-center">Terverifikasi {{$saksi_terverifikasi}} TPS dari {{$saksi_masuk}} TPS Masuk</div>
                            <div id="chart-donut" class="chartsh h-100 w-100"></div>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <?php $i = 1; ?>
                        @foreach ($paslon_terverifikasi as $pas)
                        <div class="row mt-2">
                            <div class="col-lg col-md col-sm col-xl mb-3">
                                <div class="card" style="margin-bottom: 0px;">
                                    <div class="card-body">
                                        <div class="row me-auto">
                                            <div class="col-4">
                                                <div class="counter-icon box-shadow-secondary brround candidate-name text-white ms-auto" style="margin-bottom: 0; background-color: {{$pas->color}};">
                                                    {{$i++}}
                                                </div>
                                            </div>
                                            <div class="col me-auto">
                                                <h6 class="">{{$pas->candidate}} </h6>
                                                <h6 class="">{{$pas->deputy_candidate}} </h6>
                                                <?php
                                                $voice = 0;
                                                ?>
                                                @foreach ($pas->saksi_data as $dataTps)
                                                <?php
                                                $voice += $dataTps->voice;
                                                ?>
                                                @endforeach
                                                <h3 class="mb-2 number-font">{{ $voice }} suara</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="{{($config->otonom == 'yes')?'col-lg-12 col-md-12':'col-lg-6 col-md-12'}}">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Suara TPS Masuk (Seluruh Kecamatan)</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-white text-center align-middle">KECAMATAN</th>
                            @foreach ($paslon as $item)
                            <th class="text-white text-center align-middle">{{ $item['candidate']}} - <br> {{ $item['deputy_candidate']}}</th>
                            @endforeach

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($kec as $item)
                        <tr onclick='check("{{Crypt::encrypt($item->id)}}")'>
                            <td><a href="{{url('/')}}/administrator/perhitungan_kecamatan/{{Crypt::encrypt($item['id'])}}">{{$item['name']}}</a></td>
                            @foreach ($paslon as $cd)
                            <?php $saksi_dataa = SaksiData::join('saksi', 'saksi.id', '=', 'saksi_data.saksi_id')->where('paslon_id', $cd['id'])->where('saksi_data.district_id', $item['id'])->sum('voice'); ?>
                            <td>{{$saksi_dataa}}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>

                    <script>
                        let check = function(id) {
                            window.location = `public/kecamatan/${id}`;
                        }
                    </script>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12" style="display:{{($config->otonom == 'yes')?'none':'block'}}">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Suara TPS Terverifikasi (Seluruh Kecamatan)</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary">
                        <td class="text-white text-center align-middle">KECAMATAN</td>
                        @foreach ($paslon as $item)
                        <th class="text-white text-center align-middle">{{ $item['candidate']}} - <br> {{ $item['deputy_candidate']}}</th>
                        @endforeach
                    </thead>
                    <tbody>
                        @foreach ($kec as $item)
                        <tr onclick='check("{{Crypt::encrypt($item->id)}}")'>
                            <td><a href="{{url('/')}}/administrator/perhitungan_kecamatan/{{Crypt::encrypt($item['id'])}}">{{$item['name']}}</a></td>
                            @foreach ($paslon as $cd)
                            <?php $saksi_dataa = SaksiData::join('saksi', 'saksi.id', '=', 'saksi_data.saksi_id')->where('paslon_id', $cd['id'])->where('saksi_data.district_id', $item['id'])->where('saksi.verification',1)->sum('voice'); ?>
                            <td>{{$saksi_dataa}}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">Tabulasi (Kota Tangerang Selatan)</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg justify-content-end">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="card-title text-white">Total TPS</div>
                    </div>
                    <div class="card-body">
                        <h3 class="">{{ $total_tps }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-header bg-danger">
                        <div class="card-title text-white">TPS Masuk</div>
                    </div>
                    <div class="card-body">
                        <h3 class="">{{ $tps_masuk }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="card-title text-white">TPS Kosong</div>
                    </div>
                    <div class="card-body">
                        <h3 class="">{{ $tps_kosong }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-header bg-cyan">
                        <div class="card-title text-white">Suara Masuk</div>
                    </div>
                    <div class="card-body">
                        <h3 class="">90713</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="card-title text-white">Suara Terverifikasi</div>
                    </div>
                    <div class="card-body">
                        <h3 class="">{{$total_verification_voice}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mg-b-20">
    <div class="card-header">
        <div class="card-title">Admin Demography Tracking</div>

        <div class="ms-auto">
        <a class="nav-link icon full-screen-link nav-link-bg"id="ikon-map-full"data-bs-target="#mapFull"data-bs-toggle="modal">
                        <i class="fe fe-minimize"></i>
                    </a>
        </div>
    </div>
    <div class="card-body">
        <div class="ht-300" id="map" style="height:600px"></div>
    </div>
</div>
<div class="modal"data-easein="expandIn" id="mapFull" tabindex="-1" aria-labelledby="mapFullLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="mapFullLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body map2">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
