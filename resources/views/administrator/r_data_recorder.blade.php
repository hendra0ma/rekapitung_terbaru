@include('layouts.partials.head')
@include('layouts.partials.header-r-data')

<div class="container-fluid" style="margin-top: 100px; padding-right: 4.75rem; padding-left: 4.75rem;">
    <!-- PAGE-HEADER -->
    <div class="row mt-3">
        <div class="col-lg-4">
            <h1 class="page-title fs-1 mt-2">Dashboard Rekapitung
                <!-- Kota -->
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">R Data Recorder
                    <!-- Kota -->
                </li>
            </ol>
            <h4 class="fs-4 mt-2 fw-bold">R Data Recorder</h4>
        </div>
        <div class="col-lg-8 mt-2">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="">Visitor Masuk</h5>
                                    <h1 class="mb-2 number-font">{{$visitor}}</h1>
                                </div>
                                <div class="col col-auto">
                                    <div
                                        class="counter-icon bg-primary-gradient box-shadow-primary brround ms-auto">
                                        <i class="mdi mdi-eye text-white mb-5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="">User Baru</h6>
                                        <h1 class="mb-2 number-font">{{$user_baru}}</h1>
                                </div>
                                <div class="col col-auto">
                                    <div
                                        class="counter-icon bg-danger-gradient box-shadow-danger brround ms-auto">
                                        <i class="mdi mdi-account-multiple-plus text-white mb-5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="">Data Saksi Masuk</h5>
                                    <h1 class="mb-2 number-font">{{$saksi_masuk}}</h1>
                                </div>
                                <div class="col col-auto">
                                    <div
                                        class="counter-icon bg-secondary-gradient box-shadow-secondary brround ms-auto">
                                        <i class="mdi mdi-login-variant text-white mb-5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h3 class="fw-bold">Saksi Record</h3>
            <hr style="border: 1px solid;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$saksi_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Saksi Terdaftar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$saksi_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Saksi Registrasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$saksi_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Saksi Ilegal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$saksi_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Saksi Terblokir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="fw-bold">Verifikator Record</h3>
            <hr style="border: 1px solid;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$verifikator_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Verifikator Terdaftar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$verifikator_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Verifikator Registrasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$verifikator_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Verifikator Ilegal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$verifikator_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Verifikator Terblokir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="fw-bold">Auditor Record</h3>
            <hr style="border: 1px solid;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$auditor_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Auditor Terdaftar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$auditor_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Auditor Registrasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$auditor_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Auditor Ilegal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$auditor_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Auditor Terblokir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="fw-bold">Validator Record</h3>
            <hr style="border: 1px solid;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$validator_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Validator Terdaftar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$validator_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Validator Registrasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$validator_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Validator Ilegal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$validator_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Validator Terblokir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="fw-bold">Checking Record</h3>
            <hr style="border: 1px solid;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$checking_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Checking Terdaftar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$checking_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Checking Registrasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$checking_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Checking Ilegal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$checking_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Checking Terblokir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="fw-bold">Hunter Record</h3>
            <hr style="border: 1px solid;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$hunter_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Hunter Terdaftar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$hunter_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Hunter Registrasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$hunter_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Hunter Ilegal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$hunter_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Hunter Terblokir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="fw-bold">Hukum Record</h3>
            <hr style="border: 1px solid;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$hukum_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Hukum Terdaftar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$hukum_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Hukum Registrasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$hukum_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Hukum Ilegal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$hukum_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Hukum Terblokir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="fw-bold">Huver Record</h3>
            <hr style="border: 1px solid;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$huver_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Huver Terdaftar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$huver_teregistrasi}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Huver Registrasi</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$huver_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Huver Ilegal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="padding:10px">
                            <div class="row">
                                <div class="col">
                                    <h1 class="my-auto display-4" style="margin-bottom: 0;">
                                        <center>
                                            <i class="mdi mdi-account-multiple"></i>
                                        </center>
                                    </h1>
                                </div>
                                <div class="col text-center">
                                    <div class="row">
                                        <div class="col fs-5 fw-bold">{{$huver_terblokir}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-muted" style="font-size: 13px;">Huver Terblokir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-md">

            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="fw-bold fs-3">{{$saksi_masuk}} Data Saksi Masuk</div>
                                    <h5 class="fw-bold">Terkirim</h5>
                                    <div class="text-muted">30 Hari Terakhir</div>
                                </div>
                                <div class="col-md text-center">
                                    <i class="mdi mdi-airplane-takeoff text-danger fs-3"></i> <span
                                        class="fs-4 ms-3 fw-bold">5</span>
                                    <h5 class="fw-bold">Data Terverifikasi</h5>
                                    <div class="text-muted">30 Hari Terakhir</div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126904.13143718368!2d106.65818397650207!3d-6.296010253849205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fab10419c095%3A0x8706481c2c4aafe4!2sKota%20Tgr.%20Sel.%2C%20Kota%20Tangerang%20Selatan%2C%20Banten!5e0!3m2!1sid!2sid!4v1629790245328!5m2!1sid!2sid"
                                        width="100%" height="400px" style="border:0;" allowfullscreen=""
                                        loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <table class="table-bordered table table-hover">
                                    <tr>
                                        <td>
                                            <div class="fs-3 fw-bold">Data Relawan ({{$data_relawan}}) </div>
									        <div class="text-muted">Data Masuk 30 Hari Terakhir</div>
									   </td>
                                        <td>
                                            <div class="fs-3 fw-bold">Data Overlimit ({{$data_overlimit}}) </div>
									        <div class="text-muted">Data Masuk 30 Hari Terakhir</div>
									   </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="fs-3 fw-bold">Bukti Foto Kecurangan ({{$bukti_foto_kecurangan}}) </div>
									        <div class="text-muted">Data Masuk 30 Hari Terakhir</div>
									   </td>
                                        <td>
                                            <div class="fs-3 fw-bold">Bukti Video Kecurangan ({{$bukti_video_kecurangan}})</div>
									        <div class="text-muted">Data Masuk 30 Hari Terakhir</div>
									   </td>
                                    </tr>
                                </table>
							</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Saksi Baru</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="basic-datatable-1">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-white">Foto</th>
                                    <th class="text-white">Nama</th>
                                    <th class="text-white">Email</th>
                                    <th class="text-white">Kecamatan</th>
                                    <th class="text-white">Kelurahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($saksi_baru as $sabar)
                                <tr>
                                    <td class="text-center">
                                        @if ($sabar->profile_photo_path == NULL)
                                        <img class="avatar avatar-xl brround cover-image" src="https://ui-avatars.com/api/?name={{ $sabar->name }}&color=7F9CF5&background=EBF4FF" alt="img">
                                        @else
                                        <img class="avatar avatar-xl brround cover-image" src="{{url("/storage/profile-photos/".$sabar->profile_photo_path) }}">
                                        @endif
                                    </td>
                                    <td class="align-middle">{{$sabar->name}}</td>
                                    <td class="align-middle">{{$sabar->email}}</td>
                                    
                                    <?php 
                                    $district = \App\Models\District::where('id',$sabar->districts)->first(); 
                                    $village = \App\Models\Village::where('id',$sabar->villages)->first(); 
                                    ?>
                                    <td class="align-middle">{{$district->name}}</td>
                                    <td class="align-middle">{{$village->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Admin Baru</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom"
                            id="basic-datatable-2">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-white">Foto</th>
                                    <th class="text-white">Nama</th>
                                    <th class="text-white">Email</th>
                                    <th class="text-white">No. HP</th>
                                    <th class="text-white">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin_baru as $adbar)
                                <tr>
                                    <td class="text-center">
                                        @if ($adbar->profile_photo_path == NULL)
                                        <img class="avatar avatar-xl brround cover-image" src="https://ui-avatars.com/api/?name={{ $adbar->name }}&color=7F9CF5&background=EBF4FF" alt="img">
                                        @else
                                        <img class="avatar avatar-xl brround cover-image" src="{{url("/storage/profile-photos/".$adbar->profile_photo_path) }}">
                                        @endif
                                    </td>
                                    <td class="align-middle">{{$adbar->name}}</td>
                                    <td class="align-middle">{{$adbar->email}}</td>
                                    <td class="align-middle">{{$adbar->no_hp}}</td>
                                    <td class="align-middle">
                                        @if($adbar['role_id'] == 1)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Administrator</span>
                                        @elseif($adbar['role_id'] == 2)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Verifikator</span>
                                        @elseif($adbar['role_id'] == 3)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Auditor</span>
                                        @elseif($adbar['role_id'] == 5)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Checking</span>
                                        @elseif($adbar['role_id'] == 6)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Hunter</span>
                                        @elseif($adbar['role_id'] == 7)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Hukum</span>
                                        @elseif($adbar['role_id'] == 8)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Saksi</span>
                                        @elseif($adbar['role_id'] == 9)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Rekapitulator</span>
                                        @elseif($adbar['role_id'] == 10)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Validator Hukum</span>
                                        @elseif($adbar['role_id'] == 11)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Balwaslu</span>
                                        @elseif($adbar['role_id'] == 12)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Payrole</span>
                                        @elseif($adbar['role_id'] == 14)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Relawan</span>
                                        @elseif($adbar['role_id'] == 20)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Huver</span>
                                        @elseif($adbar['role_id'] == 0)
                                        <span class="badge bg-success  me-1 mb-1 mt-1">Terblokir</span>
                                        @else
                                        {{$tim['role_id']}}
                                        @endif    
                                    </td>
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


@include('layouts.partials.footer')
<?php

use App\Models\User;
?>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- JQUERY JS -->
<script src="../../assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="../../assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SPARKLINE JS-->
<script src="../../assets/js/jquery.sparkline.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="../../assets/js/circle-progress.min.js"></script>

<!-- CHARTJS CHART JS-->
<script src="../../assets/plugins/chart/Chart.bundle.js"></script>
<script src="../../assets/plugins/chart/utils.js"></script>

<!-- PIETY CHART JS-->
<script src="../../assets/plugins/peitychart/jquery.peity.min.js"></script>
<script src="../../assets/plugins/peitychart/peitychart.init.js"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="../../assets/plugins/select2/select2.full.min.js"></script>

<!-- DATA TABLE JS-->
<script src="../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="../../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="../../assets/plugins/datatable/js/jszip.min.js"></script>
<script src="../../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="../../assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="../../assets/js/table-data.js"></script>

<!-- ECHART JS-->
<script src="../../assets/plugins/echarts/echarts.js"></script>

<!-- SIDE-MENU JS-->
<script src="../../assets/plugins/sidemenu/sidemenu.js"></script>

<!-- SIDEBAR JS -->
<script src="../../assets/plugins/sidebar/sidebar.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="../../assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="../../assets/plugins/p-scroll/pscroll.js"></script>
<script src="../../assets/plugins/p-scroll/pscroll-1.js"></script>

<!-- APEXCHART JS -->
<script src="../../assets/js/apexcharts.js"></script>

<!-- INDEX JS -->
<script src="../../assets/js/index1.js"></script>

<!-- CUSTOM JS -->
<script src="../../assets/js/custom.js"></script>

<!-- C3 CHART JS -->
<script src="../../assets/plugins/charts-c3/d3.v5.min.js"></script>
<script src="../../assets/plugins/charts-c3/c3-chart.js"></script>
<!-- INTERNAL Notifications js -->
<script src="../../assets/plugins/notify/js/rainbow.js"></script>
<script src="../../assets/plugins/notify/js/sample.js"></script>
<script src="../../assets/plugins/notify/js/jquery.growl.js"></script>
<script src="../../assets/plugins/notify/js/notifIt.js"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#basic-datatable-1').DataTable({
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
        }
    });
    
    $('#basic-datatable-2').DataTable({
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
        }
    });

</script>
@include('layouts.templateCommander.script-command')
</body>

</html>