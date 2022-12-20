<?php

use App\Models\Config;
use App\Models\District;
use App\Models\Regency;
use App\Models\Tps;
use Illuminate\Support\Facades\DB;

$config = Config::all()->first();
$regency = District::where('regency_id', $config['regencies_id'])->get();
$kota = Regency::where('id', $config['regencies_id'])->first();
$dpt = District::where('regency_id', $config['regencies_id'])->sum('dpt');
$tps = 2963;
?>
<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{url('/')}}/assets/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">
        <!--APP-SIDEBAR-->
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div class="side-header">
                <a class="header-brand1" href="{{url('')}}/administrator/index">
                    <img src="{{url('/')}}/assets/images/brand/logo.png" class="header-brand-img desktop-logo"
                        alt="logo">
                    <img src="{{url('/')}}/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                        alt="logo">
                    <img src="{{url('/')}}/assets/images/brand/logo-2.png" class="header-brand-img light-logo"
                        alt="logo">
                    <img src="{{url('/')}}/assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                        alt="logo">
                </a><!-- LOGO -->
            </div>
            <ul class="side-menu">
                <li class="my-2">
                    &nbsp;
                </li>
                <li class="mt-5">
                    <center>
                        <img src="{{asset('storage').'/'.$config['regencies_logo']}}" style="width:120px;height:auto">
                    </center>
                </li>
                <li class="mt-3">
                    <span>
                        <a href="#" class="text-dark">
                            <center>
                                <b>{{$kota['name']}}</b>
                            </center>
                        </a>
                    </span>
                </li>
                <li>
                    <h3>Main Count</h3>
                </li>
                <!-- <li>
                    <a class="side-menu__item" href="{{url('')}}/administrator/absensi"><i class="side-menu__icon mdi mdi-printer"></i><span class="side-menu__label">Absensi Saksi</span></a>
                </li> -->
                <li>
                    <a class="side-menu__item" href="real_count"><i
                            class="side-menu__icon mdi mdi-check-circle"></i><span class="side-menu__label">Real
                            Count</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="quick_count"><i class="side-menu__icon mdi mdi-quicktime"></i><span
                            class="side-menu__label">Quick Count</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="{{url('')}}/administrator/maps_count"><i
                            class="side-menu__icon mdi mdi-google-maps"></i><span class="side-menu__label">Map
                            Count</span></a>
                </li>

                <li>
                    <h3>Administrator</h3>
                </li>

                <!-- <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Admin Saksi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="/v2l_security/{{encrypt(16)}}?title=Input C1 Plano" class="slide-item">Input C1 Plano</a></li>
                        <li><a href="/v2l_security/{{encrypt(15)}}?title=Input Kecurangan" class="slide-item">Input Kecurangan</a></li>
                    </ul>
                </li> -->
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Otentifikasi</span><i
                            class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{url('')}}/administrator/absensi" class="slide-item">Absensi Saksi</a></li>
                        <li><a href="/v2l_security/{{encrypt(7)}}?title=Verifikasi Saksi"
                                class="slide-item">Otentifikasi Saksi</a></li>
                        <li><a href="/v2l_security/{{encrypt(8)}}?title=Verifikasi Admin"
                                class="slide-item">Otentifikasi Admin</a></li>
                        <li><a href="/v2l_security/{{encrypt(9)}}?title=Verifikasi Koreksi"
                                class="slide-item">Otentifikasi Koreksi</a></li>
                    </ul>
                </li>
                <!-- <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-account-check"></i><span class="side-menu__label">Admin Verifikator</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach ($regency as $rg)
                        <li><a href="/key_kecamatan/{{encrypt($rg['id'])}}/{{encrypt(1)}}?title=Verifikator" class="slide-item">KEC. {{$rg['name']}}</a></li>
                        @endforeach
                    </ul>
                </li> -->

                <!-- <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-compare"></i><span class="side-menu__label">Admin Komparasi KPU</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach ($regency as $rg)
                        <li><a href="/key_kecamatan/{{encrypt($rg['id'])}}/{{encrypt(5)}}?title=Komparasi" class="slide-item">KEC. {{$rg['name']}}</a></li>
                        @endforeach
                    </ul>
                </li> -->
                <!-- <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(14)}}?title=Admin Relawan"><i class="side-menu__icon mdi mdi-account-multiple"></i><span class="side-menu__label">Admin Relawan</span></a>
                </li> -->
                <!-- <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(13)}}?title=Admin Over Limit"><i class="side-menu__icon mdi mdi-speedometer"></i><span class="side-menu__label">Admin Over Limit</span></a>
                </li> -->
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(10)}}?title=Pembayaran Saksi"><i
                            class="side-menu__icon fa fa-money"></i><span class="side-menu__label">Pembayaran
                            Saksi</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="#" type="button" data-bs-toggle="modal" data-bs-target="#chat"><i
                            class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Support
                            System</span></a>
                </li>

                <li>
                    <h3>Verifikator Perhitungan</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon mdi mdi-account-check"></i><span class="side-menu__label">Verifikasi
                            Suara Saksi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach ($regency as $rg)
                        <li><a href="/key_kecamatan/{{encrypt($rg['id'])}}/{{encrypt(1)}}?title=Verifikasi Suara Saksi"
                                class="slide-item">KEC. {{$rg['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(14)}}?title=Verifikasi Suara Relawan"><i
                            class="side-menu__icon mdi mdi-account-multiple"></i><span class="side-menu__label">Verifikasi Suara Relawan</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(13)}}?title=Verifikasi Suara Overtime"><i
                            class="side-menu__icon mdi mdi-speedometer"></i><span class="side-menu__label">Verifikasi Suara Overtime</span></a>
                </li>

                <li>
                    <h3>Audit Perhitungan</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon mdi mdi-account-check"></i><span class="side-menu__label">Audit Suara Masuk</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach ($regency as $rg)
                        <li><a href="/key_kecamatan/{{encrypt($rg['id'])}}/{{encrypt(3)}}?title=Audit Suara Masuk"
                                class="slide-item">KEC. {{$rg['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item" href="{{url('')}}/administrator/r-data-record"><i
                            class="side-menu__icon mdi mdi-scale-balance"></i><span class="side-menu__label">Log
                            Histori</span></a>
                </li>
                <li>
                    <h3>Kecurangan Perhitungan</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(11)}}?title=Validasi Kecurangan"><i
                            class="side-menu__icon mdi mdi-scale-balance"></i><span class="side-menu__label">Validasi
                            Kecurangan</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(26)}}?title=Indikasi Kecurangan"><i
                            class="side-menu__icon mdi mdi-google-analytics"></i><span class="side-menu__label">Indikasi Kecurangan</span></a>
                </li>

            
                <li>
                    <h3>Fitur Utama Rekapitung</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(20)}}?title=Pencetakan Data Kecurangan"><i
                            class="side-menu__icon mdi mdi-printer"></i><span class="side-menu__label">Pencetakan Data Kecurangan</span></a>
                </li>
                <li>
                    <a class="side-menu__item"
                        href="/v2l_security/{{encrypt(21)}}?title=Barcode Data Kecurangan"><i
                            class="side-menu__icon mdi mdi-barcode"></i><span class="side-menu__label">Barcode Data Kecurangan</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(22)}}?title=Indikator Data TSM"><i
                            class="side-menu__icon mdi mdi-chart-arc"></i><span class="side-menu__label">Indikator Data TSM</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(23)}}?title=Komparasi Data Perhitungan"><i
                            class="side-menu__icon mdi mdi mdi-compare"></i><span class="side-menu__label">Komparasi Data Perhitungan</span></a>
                </li>

                <li>
                    <h3>Laporan Kecurangan Pemilu</h3>
                </li>
                
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(18)}}?title=Tim Hukum Paslon"><i
                            class="side-menu__icon mdi mdi-scale-balance"></i><span class="side-menu__label">Tim Hukum
                            Paslon</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(19)}}?title=Bawaslu"><i
                            class="side-menu__icon mdi mdi-file-chart"></i><span class="side-menu__label">Bawaslu</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(24)}}?title=Mahkamah Konstitusi (MK)"><i
                            class="side-menu__icon fa fa-gavel"></i><span class="side-menu__label">Mahkamah Konstitusi (MK)</span></a>
                </li>



                <li>
                    <h3>Pengaturan Commander</h3>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal"
                        data-jenis="setting" data-izin="multi_admin" data-title="Multi Admin"
                        data-deskripsi="Multi Administrator Adalah fitur dimana Administrator dapat login di beberapa device pada saat bersamaan">
                        <i class="side-menu__icon mdi mdi-account-multiple-outline"></i><span
                            class="side-menu__label">Mode Multi Admin</span></a>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal"
                        data-jenis="setting" data-izin="otonom" data-title="Mode Otonom"
                        data-deskripsi="Otonom mode adalah sistem rekapitung yang berjalan tanpa admin dan hanya menampilkan perolehan suara yang dikirim oleh saksi.">
                        <i class="side-menu__icon fa fa-magic"></i><span class="side-menu__label">Mode Otonom</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item modal-action" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon mdi mdi-satellite-variant  "></i><span class="side-menu__label">Mode
                            Patroli</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="#modalCommander" data-bs-toggle="modal" data-jenis="redirect"
                                data-izin="{{url('')}}/administrator/patroli_mode" data-title="Patroli Mode"
                                data-deskripsi="ini patroli" class="slide-item modal-action">Patroli Mode</a></li>
                        <li><a href="#modalCommander" data-bs-toggle="modal" data-jenis="redirect"
                                data-izin="{{url('')}}/administrator/patroli_mode/tracking/maps"
                                data-title="Lacak Admin" data-deskripsi="ini Lacak Admin"
                                class="slide-item modal-action" class="slide-item">Lacak Admin</a></li>
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal"
                        data-jenis="setting" data-izin="lockdown" data-title="Mode Lockdown"
                        data-deskripsi="Lockdown Adalah Penutupan sementara seluruh admin. Status lockdown terjadi biasanya karena ada serangan hacker dan atau proses perhitungan yang telah dinyatakan selesai.">
                        <i class="side-menu__icon mdi mdi-lock"></i>
                        <span class="side-menu__label">Mode Lockdown</span></a>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal"
                        data-jenis="setting" data-izin="show_terverifikasi" data-title="Mode Verifikasi Publik"
                        data-deskripsi="Mode Verifikasi Publik Adalah Publikasi Data Terverifikasi untuk dilihat pada publik. Hasil suara terverifikasi bisa lebih rendah, lebih tinggi ataupun sama dengan suara masuk.">
                        <i class="side-menu__icon mdi mdi-account-check"></i><span class="side-menu__label">Mode
                            Verifikasi</span></a>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal"
                        data-jenis="setting" data-izin="show_public" data-title="Mode C1 Publik"
                        data-deskripsi="Mode C1 Publik adalah mode untuk menampilkan lampiran C1 kepada publik atau masyarakat melalui Rekapitung.id">
                        <i class="side-menu__icon mdi mdi-image"></i><span class="side-menu__label">Mode Publikasi C1</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(29)}}?title=Mode Data Recorder">
                        <i class="side-menu__icon mdi mdi-record"></i><span class="side-menu__label">Mode Data
                            Recorder</span></a>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal"
                        data-jenis="setting" data-izin="master_data_tps" data-title="Mode Data TPS"
                        data-deskripsi="Mode Data TPS adalah mode untuk menampilkan Data rekapitung berdasarkan klasifikasinya, seperti : Rekam C1, TPS terverifikasi, TPS teraudit dan sebagainya">
                        <i class="side-menu__icon mdi mdi-file"></i><span class="side-menu__label">Mode Data C1</span></a>
                </li>
          

                <li>
                    <h3>Informasi DPT/TPS</h3>
                </li>

                <li>
                    <a class="side-menu__item" href="#">
                        <i class="side-menu__icon mdi mdi-arrow-right-drop-circle"></i><span class="side-menu__label">Total DPT {{$dpt}}</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="#">
                        <i class="side-menu__icon mdi mdi-arrow-right-drop-circle-outline"></i><span class="side-menu__label">Total TPS {{$tps}}</span></a>
                </li>

    <!-- 
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="index"><i class="side-menu__icon  mdi mdi-format-list-bulleted"></i><span class="side-menu__label">DPT/TPS
                            2020</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu open">
                        <li><a class="slide-item" style="font-size: 17px;">Total DPT {{$dpt}}</a></li>
                        <li><a class="slide-item" style="font-size: 17px;">Total TPS {{$tps}}</a></li>
                    </ul>
                </li>
                 -->
                <li>
                    <h3>Bantuan</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon fa fa-question"></i><span class="side-menu__label">Bantuan</span><i
                            class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="/administrator/tentang" class="slide-item">Tentang Rekapitung</a></li>
                        <li><a href="/administrator/pusat_bantuan" class="slide-item">Pusat Bantuan</a></li>
                        <li><a href="/administrator/laporan" class="slide-item">Laporkan Masalah</a></li>
                        <li><a href="/administrator/tutorial" class="slide-item">Tutorial</a></li>
                    </ul>
                </li>

                <hr>
                <li>
                    <!-- <a class="side-menu__item" href="#"><i class="side-menu__icon mdi mdi-logout"></i><span class="side-menu__label">Logout</span></a> -->
                    <form action="{{ route('logout') }}" method="post">
                        @csrf


                        <a class="side-menu__item" onclick="$($(this).parent()).submit()" style="cursor: pointer">
                            <i class="side-menu__icon mdi mdi-logout"></i> Sign out
                        </a>
                    </form>
                </li>

            </ul>
        </aside>
        <div class="modal fade" style="background-image: url({{url('')}}/storage/satelit.jpg); background-repeat: no-repeat;
                background-size: cover;" id="modalCommander" tabindex="-1" aria-labelledby="modalCommanderLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <div class="row w-100 justify-content-end  align-items-center">
                            <div class="col-md">
                                <!--<h5 class="modal-title text-white my-auto" id="modalCommanderLabel"></h5>-->
                                <span><img src="{{url('')}}/public/storage/alien.png" style="width:100px" alt=""> <b
                                        class="text-white fs-3" style="margin-left: -20px;">COMMANDER CODE</b></span>
                            </div>
                            <div class="col-md-5">
                                <b class="text-white fs-5 d-flex justify-content-end align-items-center my-auto align-self-center"
                                    id="modalCommanderLabel"></b>
                            </div>
                        </div>

                    </div>
                    <form action="{{url('')}}/administrator/main-permission" id="form-izin" method="post">
                        @csrf
                        <input type="hidden" value="" name="izin">
                        <input type="hidden" value="" name="jenis">
                        <input type="hidden" name="order" value="{{Auth::user()->id}}">
                        <div class="modal-body">
                            <p id="text-container" class="text-white">

                            </p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="number" class="form-control" name="kode" placeholder="kode">
                                </div>
                            </div>
                            <input type="hidden" name="order" value="{{Auth::user()->id}}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Commander Permission</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <div class="row w-100 justify-content-end  align-items-center">
                            <div class="col-md">
                                <!--<h5 class="modal-title text-white my-auto" id="modalCommanderLabel"></h5>-->
                                <span><img src="{{url('')}}/public/storage/alien.png" style="width:100px" alt=""> <b
                                        class="text-white fs-3" style="margin-left: -20px;">COMMANDER CODE</b></span>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-white">
                        <h3>

                            @if ($message = Session::get('error'))
                            {{$message}}
                            @endif
                        </h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <style>
            p#text-container {
                font-size: 16px;
            }

        </style>

        <script>
            @if($message = Session::get('error'))
            $(document).ready(function () {
                let alertModal = new bootstrap.Modal(document.getElementById('alertModal'), {
                    keyboard: false
                });
                alertModal.show();
            });
            @endif


            const buttonModal = $('.modal-action');
            buttonModal.on('click', function () {
                const title = $(this).data('title');
                const inputIzin = $($('form#form-izin').find('input[name=izin]'));
                const izin = $(this).data('izin');
                const jenis = $(this).data('jenis');
                const inputjenis = $($('form#form-izin').find('input[name=jenis]'));
                const deskripsi = $(this).data('deskripsi');
                const containerTitle = $('#modalCommanderLabel');
                const containerDeskripsi = $('#text-container');
                inputIzin.val(izin)
                containerDeskripsi.html(deskripsi)
                containerTitle.html(title)
                inputjenis.val(jenis);
            });

        </script>



        <!--/APP-SIDEBAR-->
