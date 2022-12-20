<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Zanex – Bootstrap  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin, dashboard, dashboard ui, admin dashboard template, admin panel dashboard, admin panel html, admin panel html template, admin panel template, admin ui templates, administrative templates, best admin dashboard, best admin templates, bootstrap 4 admin template, bootstrap admin dashboard, bootstrap admin panel, html css admin templates, html5 admin template, premium bootstrap templates, responsive admin template, template admin bootstrap 4, themeforest html">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Rekapitung</title>

    <!-- BOOTSTRAP CSS -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet" />
    <link href="../../assets/css/dark-style.css" rel="stylesheet" />
    <link href="../../assets/css/skin-modes.css" rel="stylesheet" />

    <!-- SIDE-MENU CSS -->
    <link href="../../assets/css/sidemenu.css" rel="stylesheet" id="sidemenu-theme">

    <!--C3 CHARTS CSS -->
    <link href="../../assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

    <!-- P-scroll bar css-->
    <link href="../../assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="../../assets/css/icons.css" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="../../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="../../assets/colors/color1.css" />

    <!-- TABS STYLES -->
    <link href="../../assets/plugins/tabs/tabs.css" rel="stylesheet" />
</head>

<body class="app sidebar-mini">

    <div class="container-md">

        <div class="row mt-5 justify-content-center">
            <div class="col-md-12 text-center">
                <h1 class="mx-auto fw-bold">DOKUMEN FBR REKAPITUNG</h1>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header mx-auto text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>{{$kota['name']}}, </h5>
                            </div>
                            <div class="col-md-12">
                                <h5>KECAMATAN {{$kecamatan['name']}}, KELURAHAN</h5>
                            </div>
                            <div class="col-md-12">
                                <h5>{{$kelurahan['name']}}</h5>
                            </div>
                            <div class="col-md-12">
                                <h3 class="text-danger">TPS {{$data_tps->number}}</h3>
                            </div>
                            <div class="col-md-12">
                                <p>No. Dokumen: {{$qrcode_hukum['nomor_berkas']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- nav options -->
                        <ul class="nav nav-tabs mb-3 shadow-sm row" id="pills-tab" role="tablist">
                            <li class="nav-item col-lg-4">
                                <a class="nav-link rounded-0 w-100 active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                    <div class="mx-auto">
                                        Detail
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item col-lg-4">
                                <a class="nav-link rounded-0 w-100" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                    <div class="mx-auto">
                                        Kecurangan
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item col-lg-4">
                                <a class="nav-link rounded-0 w-100" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                                    <div class="mx-auto">
                                        Surat Pernyataan
                                    </div>
                                </a>
                            </li>
                        </ul> <!-- content -->

                        <div class="tab-content" id="pills-tabContent p-3">

                            <!-- 1st card -->
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td>Nama Saksi</td>
                                        <td>{{$qrcode_hukum['name']}}</td>
                                    </tr>
                                    <tr>
                                        <td>No Hp Saksi</td>
                                        <td>{{$qrcode_hukum['no_hp']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Admin Verifikasi</td>
                                        <td>{{$verifikator_id['name']}}</td>
                                    </tr>
                                    <tr>
                                        <td>No Hp Admin Verifikasi</td>
                                        <td>{{$verifikator_id['no_hp']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Saksi Mengirim Data</td>
                                        <td>{{$qrcode_hukum['tanggal_masuk']}}</td>
                                    </tr>
                                </table>
                            </div>

                            <!-- 2nd card -->
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                <ul class="nav nav-tabs mb-3 shadow-sm" id="pills-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#deskripsi" role="tab" aria-controls="pills-home" aria-selected="true">Deskripsi</a> </li>
                                    <li class="nav-item"> <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#foto" role="tab" aria-controls="pills-profile" aria-selected="false">Foto</a> </li>
                                    <li class="nav-item"> <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#video" role="tab" aria-controls="pills-contact" aria-selected="false">Video</a> </li>
                                </ul> <!-- content -->

                                <div class="tab-content" id="pills-tabContent p-3">

                                    <!-- 1st card -->
                                    <div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="pills-home-tab">
                                     
                                       <h2>Kecurangan</h2>
                                     
                                        <ul class="list-style-1">
                                            @foreach ($list as $item)
                                            <li>{{$item['text']}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade show" id="foto" role="tabpanel" aria-labelledby="pills-home-tab">
                                        @foreach ($bukti_foto as $item)
                                        <img class="d-block w-100" alt="" src="{{asset('storage')}}/{{ $item->url }}" data-bs-holder-rendered="true">

                                        @endforeach
                                    </div>
                                    @foreach ($bukti_vidio as $item)
                                    <div class="tab-pane fade show" id="video" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <video style="width: 100%; height: auto;" controls>
                                            <source src="{{asset('storage/'.$item->url)}}" type=video/ogg>
                                            <source src="{{asset('storage/'.$item->url)}}" type=video/mp4>
                                        </video>
                                    </div>
                                    @endforeach
                                   
                                </div>

                            </div> <!-- 3nd card -->

                            <div class="tab-pane fade third" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <h1>Surat Pernyataan</h1>
                                <b>Yang bertanda tangan dibawah ini:</b>

                                <table class="table mt-2">
                                    <tr>
                                        <td>NIK</td>
                                        <td>:</td>
                                        <td>{{$qrcode_hukum['nik']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{$qrcode_hukum['name']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{$qrcode_hukum['address']}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Hp</td>
                                        <td>:</td>
                                        <td>{{$qrcode_hukum['no_hp']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{$qrcode_hukum['email']}}</td>
                                    </tr>
                                    <tr>
                                        <td>TPS</td>
                                        <td>:</td>
                                        <td>{{$data_tps->number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan</td>
                                        <td>:</td>
                                        <td>{{$kelurahan['name']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td>{{$kecamatan['name']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kota/Kab</td>
                                        <td>:</td>
                                        <td>{{$kota['name']}}</td>
                                    </tr>
                                </table>
                                {!! html_entity_decode($qrcode_hukum['deskripsi']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JQUERY JS -->
    <script src="../../assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="../../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="../../assets/js/jquery.sparkline.min.js"></script>

    <!-- Select2 js-->
    <script src="../../assets/plugins/select2/js/select2.min.js"></script>

    <!-- SIDE-MENU JS -->
    <script src="../../assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="../../assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="../../assets/plugins/p-scroll/pscroll.js"></script>
    <script src="../../assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- SIDEBAR JS -->
    <script src="../../assets/plugins/sidebar/sidebar.js"></script>

    <!-- CUSTOM JS-->
    <script src="../../assets/js/custom.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <!--- TABS JS -->
    <script src="../../assets/plugins/tabs/jquery.multipurpose_tabcontent.js"></script>
    <script src="../../assets/plugins/tabs/tab-content.js"></script>

</body>

</html>