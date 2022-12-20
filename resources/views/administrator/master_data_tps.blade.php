@extends('layouts.main-mastertps')

@section('content')

<div class="row mt-3">
    <div class="col-lg-4">
        <h1 class="page-title fs-1 mt-2">Dashboard Rekapitung
            <!-- Kota -->
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Rekapitung
                <!-- Kota -->
            </li>
        </ol>
        <h4 class="fs-4 mt-2 fw-bold">Rekam Data TPS</h4>
    </div>
</div>
<br>
    <div class="row mt-3">
        
        <div class="col-md-6">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title">Saksi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md my-auto">Total TPS</div>
                                <?php $tps = App\Models\Tps::count(); ?>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$tps}}</a></div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md my-auto">Foto C1 Plano</div>
                                  <?php $saksi = App\Models\Saksi::count(); ?>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$saksi}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark  text-white">
                            <h4 class="card-title">Relawan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md my-auto">Foto C1 Plano</div>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">0</a></div>
                            </div>
                            <hr>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title">Overlimit</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md my-auto">TPS Terverifikasi</div>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">0</a></div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md my-auto">TPS Ditolak</div>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">0</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title">Pembayaran Saksi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md my-auto">Saksi Terbayar</div>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">0</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title">Sidang Makamah Konsitusi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                               <?php $saksiiii = App\Models\Saksi::where('makamah_konsitusi','selesai')->count(); ?>
                                <div class="col-md my-auto">Peserta Sidang Online</div>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$saksiiii}}</a></div>
                            </div>
                           
                          
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
         <div class="col-md-6">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title">Verifikator </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md my-auto">TPS Terverifikasi</div>
                                     <?php $saksi_v = App\Models\Saksi::where('verification',1)->count(); ?>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$saksi_v}}</a></div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md my-auto">TPS Terkoreksi</div>
                                  <?php $koreksi = App\Models\Saksi::where('koreksi',1)->count(); ?>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$koreksi}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title">Auditor Forensik</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md my-auto">TPS Teraudit</div>
                                  <?php $audit = App\Models\Saksi::where('audit',1)->count(); ?>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$audit}}</a></div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md my-auto">TPS Dibatalkan</div>
                                <?php $audit_batal = App\Models\Saksi::where('batalkan',1)->count(); ?>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$audit_batal}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title">Validator Hukum</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md my-auto">Kecurangan Masuk</div>
                                  <?php $kecurangan_masuk = App\Models\Saksi::where('status_kecurangan','belum terverifikasi')->count(); ?>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$kecurangan_masuk}}</a></div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md my-auto">Kecurangan Terverifikasi</div>
                                  <?php $kecurangan_terverifikasi = App\Models\Saksi::where('status_kecurangan','terverifikasi')->count(); ?>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$kecurangan_terverifikasi}}</a></div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md my-auto">Kecurangan Ditolak</div>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">0</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title">Super Feature</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                  <?php $qrrrr = App\Models\Qrcode::count(); ?>
                                <div class="col-md my-auto">Fraud Data Print (FDP)</div>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$qrrrr}}</a></div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-md my-auto">Fraud Data Report (FDR)</div>
                                <div class="col-md-3"><a class="btn btn-gray" href="#"
                                        role="button">{{$qrrrr}}</a></div>
                            </div>
                            <hr>
                          
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
</div>

@endsection
