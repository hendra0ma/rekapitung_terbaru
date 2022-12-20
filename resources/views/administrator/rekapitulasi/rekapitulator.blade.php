<?php

use App\Models\Saksi;
use App\Models\SaksiData;
use App\Models\Rekapitulator;
?>
@extends('layouts.main-rekapitulator')

@section('content')
<div class="row mt-3" id="pdf">
    <div class="col-lg-10">
        <h1 class="page-title fs-1 mt-2">Dashboard Rekapitung
            <!-- Kota -->
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Komparasi KPU
                <!-- Kota -->
            </li>
        </ol>
        <h4 class="fs-4 mt-2 fw-bold">Administrator Election Results Comparison (ERC) (2)</h4>
    </div>
    <div class="col-lg-2">
        <div class="ms-auto pageheader-btn mt-5">
            <div class="row">
                <div class="col">
                    <!-- Authentication -->
                    <a href="{{url('')}}/rekapitulator/print_kecamatan" class="btn btn-dark btn-icon text-white w-100">
                        <span>
                            <i class="fa fa-print"></i>
                        </span> Print
                    </a>
                </div>
                <div class="col">
                    <!-- Authentication -->
                    <a href="#" onclick="saveDiv('pdf','Title')" class="btn btn-success btn-icon text-white w-100">
                        <span>
                            <i class="fa fa-save"></i>
                        </span> save
                    </a>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="row mt-5" id="pdf">

    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row w-100">
                    <div class="col-md-12 text-center">
                        <h5><img style="width: 145px;"
                            src="{{url('/')}}/assets/images/brand/logo_gold.png"
                            alt=""></h5>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h5 class="card-title mx-auto">
                            <center>
                                Election Results Comparison (ERC)
                            </center>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center text-white align-middle">
                                Kelurahan
                            </th>
                            <th class="text-center text-white align-middle">
                                Suara Masuk (%)
                            </th>
                            @foreach ($suara as $suar)
                            <th class="text-center text-white align-middle">
                                {{$suar['candidate']}} - <br>
                                {{$suar['deputy_candidate']}}
                            </th>
                            @endforeach
                            <th class="text-center text-white align-middle">
                                Unduh
                            </th>
                        </tr>
                    </thead>

                    @foreach ($kecamatan as $item)
                    <?php $saksi  = Saksi::where('village_id', $item['id'])->get(); ?>
                    <?php $persen = count($saksi)  /   $item['tps'] * 100;
                    ?>
                    <tr>
                        <td>
                            {{$item['name']}}
                        </td>
                        <td>
                            {{floor($persen)}}%
                        </td>
                        @foreach ($suara as $suar)
                        <?php $saksi_data = SaksiData::where('paslon_id', $suar['id'])->where('village_id', (string)$item['id'])->sum('voice'); ?>
                        <td>
                            @if ($saksi_data == NULL)
                            Belum ada data
                            @else
                            {{$saksi_data}}
                            @endif
                        </td>
                        @endforeach
                        <td>
                            <a class="btn btn-success" href="#">Unduh</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row w-100">
                    <div class="col-md-12 text-center">
                        <h5><img style="width: 100px;"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/KPU_Logo.svg/925px-KPU_Logo.svg.png"
                            alt=""></h5>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h5 class="card-title mx-auto">
                            <center>
                                Hasil Rekapitulasi KPU
                            </center>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center text-white align-middle">
                                Kelurahan
                            </th>
                            <th class="text-center text-white align-middle">
                                Suara Masuk (%)
                            </th>
                            @foreach ($suara as $suar)
                            <th class="text-center text-white align-middle">
                                {{$suar['candidate']}} - <br>
                                {{$suar['deputy_candidate']}}
                            </th>
                            @endforeach
                            <th class="text-center text-white align-middle">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    @foreach ($kecamatan as $kelurahan)
                    <?php $rekapitulator = Rekapitulator::where('village_id', (string)$kelurahan['id'])->get() ?>
                    <tr>
                        <td>
                            {{$kelurahan['name']}}
                        </td>
                        <td>
                            {{floor($persen)}}%
                        </td>
                        <form action="action_rekapitulator/{{Crypt::encrypt($kelurahan['id'])}}" method="post">
                            @csrf
                            <input class="form-control" type="hidden" name="id" value="{{$id}}">
                            @foreach ($rekapitulator as $item)
                            <td> <input class="form-control" type="text" name="{{$item['id']}}" value="{{$item['value']}}"></td>
                            @endforeach
                            <td>
                                <button class="btn btn-success" type="submit">Save</button>
                            </td>
                        </form>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
