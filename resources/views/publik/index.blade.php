<?php

use App\Models\District;
use App\Models\Village;
use App\Models\Tps;
use App\Models\SaksiData;
use App\Models\Paslon;
?>
@extends('layouts.mainpublic')
@section('content')


<?php
$saksidatai = SaksiData::sum("voice");
$dpt = District::where('regency_id', $config->regencies_id)->sum("dpt");
$data_masuk = (int)$saksidatai / (int)$dpt * 100;

?>
<div class="tab-content" id="pills-tabContent p-3">

    <!-- 1st card -->
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="card rounded-0">
            <div class="card-body">
                <!-- nav options -->
                <div class="row">
                    <div class="col-md">
                        <p class="text-center">
                        <div class="badge bg-primary">PROGRESS : {{substr($data_masuk, 0, 3)}}% DARI 100%</div>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="chart-pie" class="chartsh h-100 text-white"></div>
                    </div>
                </div>

                <div class="row mt-5">
                    <?php $i = 1; ?>
                    @foreach ($paslon as $pas)
                    <div class="col-lg col-md col-sm col-xl mb-3">
                        <div class="card overflow-hidden" style="margin-bottom: 0px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-auto">
                                        <div class="counter-icon box-shadow-secondary brround ms-auto candidate-name text-white" style="margin-bottom: 0; background-color: {{$pas->color}};">
                                            {{$i++}}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6 class="">{{$pas->candidate}} </h6>
                                        <h6 class="">{{$pas->deputy_candidate}} </h6>
                                        <?php
                                        $voice = 0;
                                        ?>
                                        @foreach ($pas->saksi_data as $dataTps)
                                        <?php
                                        $voice += $dataTps->voice;
                                        ?>
                                        @endforeach <br>
                                        <h3 class="mb-2 number-font">{{ $voice }} suara</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 mt-3">
                        <h5 class="text-uppercase">
                            <div class="row fw-bold">
                                <div class="col-md-12">
                                    HITUNG SUARA
                                </div>
                                <div class="col-md-12">
                                    PEMILIHAN WALI KOTA DAN WAKIL WALI {{$kota['name']}}
                                </div>
                            </div>
                           
                        </h5>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="text-uppercase">
                            <span class="badge bg-primary">Progress : {{$tps_selesai}} TPS Dari {{$tps_belum}} TPS</span>
                        </h5>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 mt-5 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-primary">
                                <tr>
                                    <?php $i = 1 ?>
                                    <th class="align-middle text-white">Kecamatan</th>
                                    @foreach ($paslon_candidate as $item)
                                    <th class="align-middle text-white">({{$i++}}) <br> {{ $item['candidate']}} / <br> {{$item['deputy_candidate']}}</th>
                                    @endforeach

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kec as $item)
                                <tr onclick='check("{{Crypt::encrypt($item->id)}}")'>
                                    <td class="align-middle"><a class="text-dark" href="public/kecamatan/{{Crypt::encrypt($item['id'])}}">{{$item['name']}}</a></td>
                                    @foreach ($paslon_candidate as $cd)
                                    <?php $saksi_dataa = SaksiData::where('paslon_id', $cd['id'])->where('district_id', $item['id'])->sum('voice'); ?>
                                    <td class="align-middle">{{$saksi_dataa}}</td>
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
        </div>
    </div>

    <div class="tab-pane fade show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="card">
            <div class="card-body">
                <!-- nav options -->
                <div class="row">
                    <div class="col-md">
                        <p class="text-center">
                        <div class="badge bg-primary">RANDOM : {{substr($tps_selesai_quick / $tps_belum_quick * 100, 0, 4)}}% (10%) DARI 100%</div>
                        </p>
                    </div>
                </div>
                
                <!-- nav options -->
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div id="chart-donut" class="chartsh h-100"></div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 mt-3">
                        <h5 class="text-uppercase">
                            <div class="row fw-bold">
                                <div class="col-md-12">
                                    HITUNG SUARA
                                </div>
                                <div class="col-md-12">
                                    PEMILIHAN WALI KOTA DAN WAKIL WALI {{$kota['name']}}
                                </div>
                            </div>
                        </h5>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="text-uppercase">
                            <span class="badge bg-primary">Progress : {{$tps_selesai_quick}} TPS Dari {{$tps_belum_quick}} TPS</span>
                        </h5>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 mt-5">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom">
                                <thead class="bg-primary">
                                    <tr>
                                        <th class="text-white align-middle">Kecamatan</th>
                                        <th class="text-white align-middle">Sumber Kelurahan</th>
                                        <th class="text-white align-middle">Total TPS</th>
                                        <th class="text-white align-middle">Quick Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($district_quick as $item)
   <?php $count_tps = Tps::where('villages_id',(string)$item['id'])->count(); ?>
                                    <?php $count_tps_quick = Tps::where('villages_id',(string)$item['id'])->where('sample', 1)->count(); ?>
                                    <?php $kecc = District::where('id', $item['district_id'])->first(); ?>
                                    <tr @if ($kecc['id'] == 3674040)
                                    style="background-color: rgb(80, 78, 78); color :white;"
                                    @else

                                @endif
                                >
                                        <td class="align-middle">
                                            {{$kecc['name']}}
                                        </td>
                                        <td class="align-middle">
                                            <a href="modaltpsQuick" class="modaltpsQuick @if ($kecc['id'] == 3674040)
                                 text-white
                                            @else
 text-dark
                                        @endif" style="font-size: 0.8em;" id="Cek" data-id="{{$item['id']}}" data-bs-toggle="modal" id="" data-bs-target="#modaltpsQuick">{{$item['name']}}</a>
                                        </td>
                                        <td class="align-middle">{{$count_tps}}</td>
                                        <td class="align-middle">@if ($kecc['id'] == 3674040)
                                            {{$count_tps_quick}}
                                            @else
                                            0
                                        @endif</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </div>
    <div class="tab-pane fade show" id="pills-terverifikasi" role="tabpanel" aria-labelledby="pills-terverifikasi-tab">
        <div class="card rounded-0">
            <div class="card-body">
                <!-- nav options -->


                <div class="row mt-5">
                    <div class="col-md-12">
                        <div id="chart-verif" class="chartsh h-100"></div>
                    </div>
                </div>

                <div class="row mt-5">
                    <?php $i = 1; ?>
                    @foreach ($paslon_terverifikasi as $pas)
                    <div class="col-lg col-md col-sm col-xl mb-3    ">
                        <div class="card overflow-hidden" style="margin-bottom: 0px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-auto">
                                        <div class="counter-icon box-shadow-secondary brround ms-auto candidate-name text-white" style="margin-bottom: 0;  background-color: {{$pas->color}};">
                                            {{$i++}}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6 class="">{{$pas->candidate}} </h6>
                                        <?php
                                        $voice = 0;
                                        ?>
                                        @foreach ($pas->saksi_data as $dataTps)
                                        <?php
                                        $voice += $dataTps->voice;
                                        ?>
                                        @endforeach <br>
                                        <h3 class="mb-2 number-font">{{ $voice }} suara</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 mt-3">
                        <h5 class="text-uppercase">
                            <div class="row fw-bold">
                                <div class="col-md-12">
                                    HITUNG SUARA
                                </div>
                                <div class="col-md-12">
                                    PEMILIHAN WALI KOTA DAN WAKIL WALI {{$kota['name']}}
                                </div>
                            </div>
                        </h5>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="text-uppercase">
                            <span class="badge bg-primary">Progress : {{$tps_selesai}} TPS Dari {{$tps_belum}} TPS</span>
                        </h5>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 mt-5">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="align-middle text-white">Kecamatan</th>
                                    @foreach ($paslon_candidate as $item)
                                    <th class="text-white">{{ $item['candidate']}}</th>
                                    @endforeach

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($kec as $item)
                                <tr onclick='check("{{Crypt::encrypt($item->id)}}")'>
                                    <td><a class="text-dark" href="public/kecamatan/{{Crypt::encrypt($item['id'])}}">{{$item['name']}}</a></td>
                                    @foreach ($paslon_candidate as $cd)
                                    <?php $saksi_dataa = SaksiData::join('saksi', 'saksi.id', '=', 'saksi_data.saksi_id')->where('paslon_id', $cd['id'])->where('saksi_data.district_id', $item['id'])->where('verification', 1)->sum('voice'); ?>
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



        </div>

    </div>
</div>
</div>
</div>

</div>






@endsection
