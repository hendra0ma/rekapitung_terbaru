@extends('layouts.main-perhitungan-kelurahan');
@section('content')
<!-- PAGE-HEADER -->
<div class="row">
    <div class="col-lg-4">
        <h1 class="page-title fs-1 mt-2">Dashboard Rekapitung
            <!-- Kota -->
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$village['name']}}
                <!-- Kota -->
            </li>
        </ol>
        <h4 class="fs-4 mt-2 fw-bold">Multi Administator</h4>
    </div>

    <div class="col-lg-8 justify-content-end mt-2">
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-9 justify-content-end">
                <div class="card" style="margin-bottom: 0px;">
                    <div class="card-body">
                        <div class="row mx-auto">
                            <div class="col-5 ">
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

</div>

<!-- PAGE-HEADER END -->
<div class="row mt-3">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header bg-info-gradient">
                <h3 class="card-title text-white">Suara TPS Masuk</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="container" style="margin-left: 3%; margin-top: 10%;">
                            <div class="text-center">Progress {{substr($realcount,0,5)}}% dari 100%</div>
                            <div id="chart-pie" class="chartsh h-100 w-100"></div>
                        </div>
                    </div>
                    <div class="col-md">
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

    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header bg-secondary-gradient">
                <h3 class="card-title text-white">Suara Terverifikasi</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="container" style="margin-left: 3%; margin-top: 10%;">
                            <div class="text-center">Terverifikasi 6 TPS dari 1 TPS Masuk</div>
                            <div id="chart-donut" class="chartsh h-100 w-100"></div>
                        </div>
                    </div>
                    <div class="col-md">
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

<div class="row mt-3">

    <div class="col-md-12">
        <div class="container-fluid">
            <div class="tab">
                <div class="row">
                    <div class="col-md">
                        <button class="btn tablink w-100 rounded-0 text-dark" onclick="openPage('saksi-masuk', this, '#45aaf2 ')" id="defaultOpen">Suara TPS Masuk</button>
                    </div>
                    <div class="col-md">
                        <button class="btn tablink w-100 rounded-0 text-dark" onclick="openPage('saksi-terverifikasi', this, '#f7b731')">Suara TPS Terverifikasi</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="saksi-masuk" class="tabcontent">
            <div class="card">
                <div class="card-header">
                    <h5 class="cart-title mx-auto text-center fw-bold my-auto">Suara TPS Masuk (Kelurahan {{$district['name']}})</h5>
                </div>
                <div class="card-body">

                    <!-- 1st card -->
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary">
                            <tr>
                                <th class="align-middle text-white text-center align-middle" rowspan="2">Tps</th>
                                @foreach ($paslon_candidate as $item)
                                <th class="text-white text-center align-middle">{{ $item['candidate']}} - {{ $item['deputy_candidate']}}</th>
                                @endforeach

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tps_kel as $item)


                            <tr data-id="{{$item['id']}}" data-bs-toggle="modal" class="modal-id" data-bs-target="#modal-id">
                                <td> <a href="#" class="modal-id text-dark" style="font-size: 0.8em;" id="Cek">TPS {{$item['number']}}</a>
                                    @foreach ($paslon_candidate as $cd)

                                    <?php
                                     $tpsass = \App\Models\Tps::where('number', (string)$item['number'])->where('villages_id', (string)$id)->first();?>          
                                 <?php   $saksi_data = \App\Models\SaksiData::join('saksi', 'saksi.id', '=', 'saksi_data.saksi_id')->where('paslon_id', $cd['id'])->where('tps_id', $tpsass->id)->sum('voice'); ?>
                                <td>{{$saksi_data}}</td>

                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="saksi-terverifikasi" class="tabcontent">
            <div class="card">
                <div class="card-header">
                    <h5 class="cart-title mx-auto text-center fw-bold my-auto">Suara TPS Terverifikasi (Kelurahan {{$district['name']}})</h5>
                </div>
                <div class="card-body">

                    <!-- 1st card -->
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-white text-center align-middle" rowspan="2">Tps</th>
                                @foreach ($paslon_candidate as $item)
                                <th class="text-white text-center align-middle">{{ $item['candidate']}} - {{ $item['deputy_candidate']}}</th>
                                @endforeach

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tps_kel as $item)


                            <tr data-id="{{$item['id']}}" data-bs-toggle="modal" class="modal-id" data-bs-target="#modal-id">
                                <td> <a href="#" class="modal-id text-dark" style="font-size: 0.8em;" id="Cek">TPS {{$item['number']}}</a>
                                    @foreach ($paslon_candidate as $cd)

                                    <?php
                                      $tpsass = \App\Models\Tps::where('number', (string)$item['number'])->where('villages_id', (string)$id)->first();?>          
                                  <?php  $saksi_data = \App\Models\SaksiData::join('saksi', 'saksi.id', '=', 'saksi_data.saksi_id')->where('paslon_id', $cd['id'])->where('tps_id', $tpsass->id)->sum('voice'); ?>
                                <td>{{$saksi_data}}</td>

                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function openPage(pageName, elmnt, color) {
        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";

        }
        tablinks = document.getElementsByClassName("tablink");
        let darkmode = document.body.className.split(' ');

        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
            (darkmode.length == 3) ? tablinks[i].style.color = "white": tablinks[i].style.color = "black";
        }

        document.getElementById(pageName).style.display = "block";




        elmnt.style.backgroundColor = color;
        elmnt.style.color = 'white';
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

<!-- SWEET-ALERT JS -->
<script src="../../assets/plugins/sweet-alert/sweetalert.min.js"></script>
<script src="../../assets/js/sweet-alert.js"></script>

<script>
    $('.c1saksi').click(function() {
        $('body').removeClass('timer-alert');
        swal({
            title: "C1 Saksi",
            text: "C1 Saksi adalah hasil perhitungan suara di TPS yang dikirimkan oleh saksi resmi partai.",
            type: "warning",
            confirmButtonText: 'Ok',
        });
    })
</script>

<script>
    $('.c1relawan').click(function() {
        $('body').removeClass('timer-alert');
        swal({
            title: "C1 Relawan",
            text: "C1 Relawan adalah hasil perhitungan suara di TPS yang dikirimkan oleh relawan.",
            type: "warning",
            confirmButtonText: 'Ok',
        });
    })
</script>

<script>
    $('.c1saksipend').click(function() {
        $('body').removeClass('timer-alert');
        swal({
            title: "C1 Saksi (Pending)",
            text: "C1 Saksi (Pending) adalah kiriman data TPS dari saksi yang tertahan karena adanya data C1 dari TPS yang sama telah dikirimkan oleh Relawan setempat. Hal ini biasanya terjadi karena C1 Saksi terlambat dikirimkan dan atau tidak adanya Saksi di TPS tersebut.",
            type: "warning",
            confirmButtonText: 'Ok',
        });
    })
</script>

<script>
    $('.c1relawanband').click(function() {
        $('body').removeClass('timer-alert');
        swal({
            title: "C1 Relawan (Banding)",
            text: "C1 Banding adalah data C1 yang berbeda di TPS yang sama. Kiriman C1 Banding berasal dari masyarakat / relawan untuk dibandingkan dengan C1 Saksi.",
            type: "warning",
            confirmButtonText: 'Ok',
        });
    })
</script>
<!-- CONTAINER END -->
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="periksaModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto C1 Plano</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <a>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"><img width="550px" src="https://demo.tangsel.pilwalkot.rekapitung.id/assets/upload/c1plano.jpg" class="zoom" data-magnify-src="https://demo.tangsel.pilwalkot.rekapitung.id/assets/upload/c1plano.jpg">
                        </div>
                    </div>
                    <form>
                        <div class="row justify-content-between mt-4 mb-4">
                            <div class="col-md-3 text-center">
                                <label for="suara01 w-100">Suara 01</label>
                                <input class="form-control" type="text" value="12" size="10" disabled>
                            </div>
                            <div class="col-md-3 text-center">
                                <label for="suara02">Suara 02</label>
                                <input class="form-control" type="text" value="23" size="10" disabled>
                            </div>
                            <div class="col-md-3 text-center">
                                <label for="suara03">Suara 03</label>
                                <input class="form-control" type="text" value="0" size="10" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="jumlahsuarasah">Jumlah Suara Sah :</label>
                                <input class="form-control" id="jumlahsuarasah" type="text" value="35" size="10" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </a>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="periksaModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto C2 Plano</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <a>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12"><img width="550px" src="https://demo.tangsel.pilwalkot.rekapitung.id/assets/upload/c1plano.jpg" class="zoom" data-magnify-src="https://demo.tangsel.pilwalkot.rekapitung.id/assets/upload/c1plano.jpg">
                        </div>
                    </div>
                    <form>
                        <div class="row justify-content-between mt-4 mb-4">
                            <div class="col-md-3 text-center">
                                <label for="suara01 w-100">Suara 01</label>
                                <input class="form-control" type="text" value="12" size="10" disabled>
                            </div>
                            <div class="col-md-3 text-center">
                                <label for="suara02">Suara 02</label>
                                <input class="form-control" type="text" value="23" size="10" disabled>
                            </div>
                            <div class="col-md-3 text-center">
                                <label for="suara03">Suara 03</label>
                                <input class="form-control" type="text" value="0" size="10" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="jumlahsuarasah">Jumlah Suara Sah :</label>
                                <input class="form-control" id="jumlahsuarasah" type="text" value="35" size="10" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </a>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection