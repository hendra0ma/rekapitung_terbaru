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
                    <img src="{{url('/')}}/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                    <img src="{{url('/')}}/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
                    <img src="{{url('/')}}/assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                    <img src="{{url('/')}}/assets/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
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
                                <b>{{$kota['name']}} <br> {{$title}} </b>
                            </center>
                        </a>
                    </span>
                </li>
                <li>
                    <h3>Main</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="https://getw1n.kopidoni.com"><i class="side-menu__icon mdi mdi-trophy-award"></i><span class="side-menu__label">GET WIN</span></a>
                </li>
                {{-- <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="index"><i
                                class="side-menu__icon"></i><span class="side-menu__label">DPT/TPS
                                2020</span></a>
                    </li> --}}
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="index"><i class="side-menu__icon  mdi mdi-format-list-bulleted"></i><span class="side-menu__label">DPT/TPS
                            2020</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu open">
                        <li><a class="slide-item" style="font-size: 17px;">Total DPT {{$dpt}}</a></li>
                        <li><a class="slide-item" style="font-size: 17px;">Total TPS {{$tps}}</a></li>
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item" href="{{url('')}}/administrator/absensi"><i class="side-menu__icon mdi mdi-printer"></i><span class="side-menu__label">Absensi Saksi</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon fe fe-globe"></i><span class="side-menu__label">Live
                            Count</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="real_count" class="slide-item">Real Count</a></li>
                        <li><a href="quick_count" class="slide-item">Quick Count</a></li>
                        <li><a href="maps_count" class="slide-item">Map Count</a></li>
                    </ul>
                </li>

                <li>
                    <h3>Multi Administrator</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Admin Saksi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="/v2l_security/{{encrypt(16)}}?title=Input C1 Plano" class="slide-item">Input C1 Plano</a></li>
                        <li><a href="/v2l_security/{{encrypt(15)}}?title=Input Kecurangan" class="slide-item">Input Kecurangan</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Admin Otentifikasi</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="/v2l_security/{{encrypt(7)}}?title=Verifikasi Saksi" class="slide-item">Verifikasi Saksi</a></li>
                        <li><a href="/v2l_security/{{encrypt(8)}}?title=Verifikasi Admin" class="slide-item">Verifikasi Admin</a></li>
                        <li><a href="/v2l_security/{{encrypt(9)}}?title=Verifikasi Koreksi" class="slide-item">Verifikasi Koreksi</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-account-check"></i><span class="side-menu__label">Admin Verifikator</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach ($regency as $rg)
                        <li><a href="/key_kecamatan/{{encrypt($rg['id'])}}/{{encrypt(1)}}?title=Verifikator" class="slide-item">KEC. {{$rg['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(17)}}?title=Admin Luar Negri"><i class="side-menu__icon fa fa-globe"></i><span class="side-menu__label">Admin Luar Negri</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-compare"></i><span class="side-menu__label">Admin Komparasi KPU</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach ($regency as $rg)
                        <li><a href="/key_kecamatan/{{encrypt($rg['id'])}}/{{encrypt(5)}}?title=Komparasi" class="slide-item">KEC. {{$rg['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(14)}}?title=Admin Relawan"><i class="side-menu__icon mdi mdi-account-multiple"></i><span class="side-menu__label">Admin Relawan</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(13)}}?title=Admin Over Limit"><i class="side-menu__icon mdi mdi-speedometer"></i><span class="side-menu__label">Admin Over Limit</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(10)}}?title=Admin Payroll Saksi"><i class="side-menu__icon fa fa-money"></i><span class="side-menu__label">Admin Payroll Saksi</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="#" type="button" data-bs-toggle="modal" data-bs-target="#chat"><i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Admin Support</span></a>
                </li>
                
                <li>
                    <h3>Audit Perhitungan</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-account-check"></i><span class="side-menu__label">Election Audit Forensik</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach ($regency as $rg)
                        <li><a href="/key_kecamatan/{{encrypt($rg['id'])}}/{{encrypt(3)}}?title=Auditor" class="slide-item">KEC. {{$rg['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item" href="{{url('')}}/administrator/r-data-record"><i class="side-menu__icon mdi mdi-scale-balance"></i><span class="side-menu__label">Log History</span></a>
                </li>
                
                <li>
                    <h3>Kecurangan Pemilu</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(11)}}?title=Validator Hukum"><i class="side-menu__icon mdi mdi-scale-balance"></i><span class="side-menu__label">Validator Hukum</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(26)}}?title=Analisa DPT KPU"><i class="side-menu__icon mdi mdi-google-analytics"></i><span class="side-menu__label">Analisa DPT KPU</span></a>
                </li>
                
                <li>
                    <h3>Akun Gugatan Pemilu</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(18)}}?title=Tim Hukum Paslon"><i class="side-menu__icon mdi mdi-scale-balance"></i><span class="side-menu__label">Tim Hukum Paslon</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(19)}}?title=Bawaslu RI"><i class="side-menu__icon mdi mdi-file-chart"></i><span class="side-menu__label">Bawaslu RI</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(24)}}?title=SIdang Online MK"><i class="side-menu__icon fa fa-gavel"></i><span class="side-menu__label">SIdang Online MK</span></a>
                </li>
                
                <li>
                    <h3>Super Feature</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(20)}}?title=Election Fraud Data Print"><i class="side-menu__icon mdi mdi-printer"></i><span class="side-menu__label">Election Fraud Data Print</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(21)}}?title=Election Fraud Barcode Report"><i class="side-menu__icon mdi mdi-barcode"></i><span class="side-menu__label">Election Fraud Barcode Report</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(22)}}?title=Election TSM Indicator"><i class="side-menu__icon mdi mdi-chart-arc"></i><span class="side-menu__label">Election TSM Indicator</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(23)}}?title=Election Results Comparison"><i class="side-menu__icon mdi mdi mdi-compare"></i><span class="side-menu__label">Election Results Comparison</span></a>
                </li>
                
                <li>
                    <h3>Commander</h3>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal" data-jenis="setting" data-izin="multi_admin" data-title="Multi Admin" data-deskripsi="Multi Administrator Adalah fitur dimana Administrator dapat login di beberapa device pada saat bersamaan">
                        <i class="side-menu__icon mdi mdi-account-multiple-outline"></i><span class="side-menu__label">Mode Multi Admin</span></a>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal" data-jenis="setting" data-izin="otonom" data-title="Mode Otonom" data-deskripsi="Otonom mode adalah sistem rekapitung yang berjalan tanpa admin dan hanya menampilkan perolehan suara yang dikirim oleh saksi.">
                        <i class="side-menu__icon fa fa-magic"></i><span class="side-menu__label">Mode Otonom</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item modal-action" data-bs-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-satellite-variant  "></i><span class="side-menu__label">Mode Patroli</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="#modalCommander" data-bs-toggle="modal" data-jenis="redirect" data-izin="{{url('')}}/administrator/patroli_mode" data-title="Patroli Mode" data-deskripsi="ini patroli" class="slide-item modal-action">Patroli Mode</a></li>
                        <li><a href="#modalCommander" data-bs-toggle="modal" data-jenis="redirect" data-izin="{{url('')}}/administrator/patroli_mode/tracking/maps" data-title="Lacak Admin" data-deskripsi="ini Lacak Admin" class="slide-item modal-action" class="slide-item">Lacak Admin</a></li>
                    </ul>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal" data-jenis="setting" data-izin="lockdown" data-title="Rekapitung Lockdown System" data-deskripsi="Lockdown Adalah Penutupan sementara seluruh admin. Status lockdown terjadi biasanya karena ada serangan hacker dan atau proses perhitungan yang telah dinyatakan selesai.">
                        <i class="side-menu__icon mdi mdi-lock"></i>
                        <span class="side-menu__label">Rekapitung Lockdown System</span></a>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal" data-jenis="setting" data-izin="show_terverifikasi" data-title="Mode Verifikasi Publik" data-deskripsi="Mode Verifikasi Publik Adalah Publikasi Data Terverifikasi untuk dilihat pada publik. Hasil suara terverifikasi bisa lebih rendah, lebih tinggi ataupun sama dengan suara masuk.">
                        <i class="side-menu__icon mdi mdi-account-check"></i><span class="side-menu__label">Mode Verifikasi</span></a>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal" data-jenis="setting" data-izin="show_public" data-title="Mode C1 Publik" data-deskripsi="Mode C1 Publik adalah mode untuk menampilkan lampiran C1 kepada publik atau masyarakat melalui Rekapitung.id">
                        <i class="side-menu__icon mdi mdi-image"></i><span class="side-menu__label">Mode C1 Publish</span></a>
                </li>
                <li>
                    <a class="side-menu__item modal-action" href="#modalCommander" data-bs-toggle="modal" data-jenis="setting" data-izin="master_data_tps" data-title="Mode Data TPS" data-deskripsi="Mode Data TPS adalah mode untuk menampilkan Data rekapitung berdasarkan klasifikasinya, seperti : Rekam C1, TPS terverifikasi, TPS teraudit dan sebagainya">
                        <i class="side-menu__icon mdi mdi-file"></i><span class="side-menu__label">Mode Rekam Data TPS</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="/v2l_security/{{encrypt(29)}}?title=Mode Data Recorder">
                        <i class="side-menu__icon mdi mdi-record"></i><span class="side-menu__label">Mode Data Recorder</span></a>
                </li>

                <li>
                    <h3>Bantuan</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon fa fa-question"></i><span class="side-menu__label">Bantuan</span><i class="angle fa fa-angle-right"></i></a>
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
        <div class="modal fade" id="modalCommander" tabindex="-1" aria-labelledby="modalCommanderLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCommanderLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="text-container">

                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{url('')}}/administrator/main-permission" id="form-izin" method="post">
                            @csrf
                            <input type="hidden" value="" name="izin">
                            <input type="hidden" value="" name="jenis">
                            @if(Cookie::get('multi') != null)
                            <input type="hidden" name="order" value="{{Cookie::get('multi')}}">
                            @endif
                            <button type="submit" class="btn btn-dark">Minta Izin Fitur</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const buttonModal = $('.side-menu__item.modal-action');
            buttonModal.on('click', function() {
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