@extends('administrator.commander_remote.main')

@section('content')

<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row"id="container-notification">
                    @foreach($notif as $not)
                    <div class="col-lg-12 mt-2 mb-2">
                        <div class="alert alert-warning" role="alert">
                            @if($not->jenis == "redirect")
                            Administrator urutan {{$not->order}} ingin redirect ke halaman <span
                                class="text-info">{{$not->redirect}}</span>
                                <button  class="btn btn-dark"  onclick="acceptAdminRedirect(this)"data-order="{{$not->order}}"data-jenis="{{$not->jenis}}"data-izin="{{$not->izin}}">
                                    Terima
                                </button>
                            @else
                            Administrator urutan {{$not->order}} ingin mengubah setting <span
                                class="text-info">{{$not->setting}}</span>
                            <button  class="btn btn-dark"  onclick="acceptAdminRedirect(this)"data-order="{{$not->order}}"data-jenis="{{$not->jenis}}"data-izin="{{$not->izin}}">
                                Terima
                            </button>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="superFeature" tabindex="-1" aria-labelledby="superFeatureLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Super Feature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <button class="btn btn-light btn-primary-gradient btn-block ml-1 mr-1 mt-1 mb-1"
                            onclick="redirect('{{url('')}}/administrator/fraud-data-print')">
                                Fraud Data Print (FDP)
                            
                        </button>
                    </div>
                    <div class="col-md-12">

                        <button class="btn btn-light btn-primary-gradient btn-block ml-1 mr-1 mt-1 mb-1"
                            onclick="redirect('{{url('')}}/administrator/fraud-data-report')">
                                Fraud Barcode Report (FBR)
                            
                        </button>
                    </div>
                    <div class="col-md-12">

                        <button class="btn btn-light btn-primary-gradient btn-block ml-1 mr-1 mt-1 mb-1"
                            onclick="redirect('{{url('')}}/administrator/index-tsm')">
                                Indek TSM
                        </button>
                    </div>
                    <div class="col-md-12">

                        <button class="btn btn-light btn-primary-gradient btn-block ml-1 mr-1 mt-1 mb-1"
                            onclick="redirect('{{url('')}}/administrator/rekapitulator/kota')">
                                Komparasi KPU Tingkat Kota
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="perhitungan" tabindex="-1" aria-labelledby="perhitunganLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Mode Perhitungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                        <button class="btn btn-light btn-primary-gradient btn-block ml-1 mr-1 mt-1 mb-1"
                            onclick="redirect('{{url('')}}/administrator/real_count')">
                                Real Count
                            
                        </button>
                    </div>
                    <div class="col-md-12">

                        <button class="btn btn-light btn-primary-gradient btn-block ml-1 mr-1 mt-1 mb-1"
                            onclick="redirect('{{url('')}}/administrator/quick_count')">
                                Quick Count
                            
                        </button>
                    </div>
                    <div class="col-md-12">

                        <button class="btn btn-light btn-primary-gradient btn-block ml-1 mr-1 mt-1 mb-1"
                            onclick="redirect('{{url('')}}/map_count')">
                                Map Count
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 3%;">
    <h1 style=" margin-bottom: -20px">
        <div class="row">
            <div class="col"><img src="{{url('')}}/public/storage/alien.png" style="width:100px" alt=""> <b style="margin-left: -30px;">COMMANDER</b></div>  
            <div class="col-8 d-none d-sm-block">
                 <div class="card" style="margin-bottom: 0px;">
                    <div class="card-body" style="padding: 5px; padding-bottom: 0px">
                        <div class="row mx-auto text-center">
                            <div class="col-3 my-auto">
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
                                                <i class="fe fe-user"  style="font-size:22px !important"></i>
                                            </div>
                                            <div class="card-footer text-center" style="color: black; padding: 0px">
                                                @if ($jam > 8 && $jam < 21)
                                                <div class="badge bg-success" style="font-size:10px !important">Saksi : Aktif</div>
                                                @else
                                                <div class="badge bg-danger" style="font-size:10px !important">Saksi : Nonaktif</div>
                                                @endif
                                            </div>
                                        </div>
                                        <h5  style="font-size:13px" class="text-center mt-3">09.00 - 21.00</h5>
                                    </div>
                                    <div class="col mt-2">
                                        <div class="card" style="margin-bottom: 0px;">
                                            <div class="card-body text-center" style="padding: 0px;">
                                                <i class="fe fe-user" style="font-size:22px !important"></i>
                                            </div>
                                            <div class="card-footer text-center" style="color: black; padding: 0px">
                                                
                                                @if ($jam > 14 && $jam < 21)
                                                <div class="badge bg-success" style="font-size:10px !important">Relawan : aktif</div>
                                                @else
                                                
                                                <div class="badge bg-danger" style="font-size:10px !important">Relawan : Nonaktif</div>
                                                @endif
                                            </div>
                                        </div>
                                        <h5  style="font-size:13px" class="text-center mt-3">14.00 - 21.00</h5>
                                    </div>
                                    <div class="col mt-2">
                                        <div class="card" style="margin-bottom: 0px;">
                                            <div class="card-body text-center" style="padding: 0px;">
                                                <i class="fe fe-user" style="font-size:22px !important"></i>
                                            </div>
                                            <div class="card-footer text-center" style="color: black; padding: 0px">
                                                    @if ($jam >= 21)
                                                    <div class="badge bg-success" style="font-size:10px !important">Hacker : Aktif</div>
                                                    @else
                                                    <div class="badge bg-danger" style="font-size:10px !important">Hacker : Nonaktif</div>
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
   
    </h1>

    <hr style="border: 1px solid;">
    
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <center class="w-100">
                <h4>Real Count</h4>
                <div id="chart-pie" class="chartsh h-100 w-100"></div>
            </center>
        </div>
        
        <div class="col-lg-6 col-md-6">
            <center>
                <h4>Terverifikasi</h4>
                <div id="chart-donut" class="chartsh h-100 w-100"></div>
            </center>
        </div>
    </div>
</div>



<div class="container mt-3">
<hr style="border: 1px solid">
    <div class="row">
        <div class="col-4">

            <button class="btn text-white btn-info-gradient h-100" data-bs-target="#notificationModal"
                data-bs-toggle="modal">
                Notifikasi
                <span class="badge bg-white"id="count-notif">{{count($notif)}}</span>
            </button>
            
        </div>
        <div class="col-4 text-warning">
            <center>
                Paten 6 (Teknologi Kontrol Sistem Pemilu Rekapitung)
            </center>
        </div>
        <div class="col-4">

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="hidden" name="commander" value="tidakkosong">
                <button class="btn btn-danger-gradient btn-lg h-100 float-end">
                    <i class="fa fa-power-off"></i>
                </button>
            </form>
            
        </div>
    </div>
</div>

<div class="container mt-2">

    <div class="row justify-content-center">
        <div class="col-3">
            
            <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
                onclick="redirect('{{url('')}}/administrator/index')">
                    <i class="fa fa-house"></i> 
                    Dashboard
                    
            </button>
        </div>
        
        <div class="col-3">

            <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1" data-bs-target="#perhitungan"
                data-bs-toggle="modal">
                
                    <i class="fa fa-calculator"></i>
                    Perhitungan
                
            </button>
        </div>
        
        <div class="col-3">

            <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
                onclick="redirect('{{url('')}}/administrator/patroli_mode/tracking/maps')">
                
                    <i class="fa fa-satellite-dish"></i>
                    Patroli
                
            </button>
        </div>
        <div class="col-3">

            <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
                onclick="redirect('{{url('')}}/administrator/data-gugatan')">
                
                    <i class="mdi mdi-scale-balance"></i>
                    Tim Hukum
                
            </button>
        </div>
        
        
        <div class="col-3">

            <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
                onclick="redirect('{{url('')}}/administrator/laporan-bawaslu')">
                
                    <i class="mdi mdi-file-chart"></i>
                    Bawaslu RI
                
            </button>
        </div>
        <div class="col-3">

            <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
                onclick="redirect('{{url('')}}/administrator/sidang_online')">
                
                    <i class="fa fa-gavel"></i>
                    Mahkamah Konstitusi
                
            </button>
        </div>
        <div class="col-3">

            <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
                onclick="redirect('{{url('')}}/administrator/master_data_tps')">
                
                    <i class="fa fa-file"></i>
                    Rekam Data TPS
                
            </button>
        </div>
        
        <div class="col-3">

            <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
                onclick="redirect('{{url('')}}/administrator/r-data')">
                
                    <i class="fa fa-record-vinyl "></i>
                    Data Recorder
                
            </button>
        </div>
    </div>
</div>


<div class="container mt-3">
    <div class="row justify-content-end">
        <div class="col-md-1">
            <div class="mid">

                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('multi_admin',this)" 
                    {{($config->multi_admin == "no") ? "":"checked"; }}>
                    <span class="slider round"></span>    
                </label>
            </div>
            <center>
                Multi
            </center>
        </div>
        
        <div class="col-md-1">
            <div class="mid">

                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('otonom',this)" 
                    {{($config->otonom == "no") ? "":"checked"; }}>
                    <span class="slider round"></span>    
                </label>
            </div>
            <center>
                Otonom
            </center>
        </div>
        
        <div class="col-md-1">
            <div class="mid">
                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('show_terverifikasi',this)" 
                    {{($config->show_terverifikasi == "hide") ? "":"checked"; }}>
                    <span class="slider round"></span>
                </label>
            </div>
            <center>
                Verifikasi
            </center>
        </div>
        
        <div class="col-md-1">
            <div class="mid">
                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('show_public',this)" 
                    {{($config->show_public == "hide") ? "":"checked"; }}>
                    <span class="slider round"></span>
                </label>
            </div>
            <center>
                Publish C1
            </center>
        </div>
        
        <div class="col-md-1">
            <div class="mid">

                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('lockdown',this)"
                    {{($config->lockdown == "no") ? "":"checked"; }}>
                    <span class="slider round"></span>    
                </label>
            </div>
            <center>
                Lockdown
            </center>
        </div>
        
        <div class="col-md-1">
            <div class="mid">

                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('darkmode',this)"
                    {{($config->darkmode == "no") ? "":"checked"; }}>
                    <span class="slider round"></span>    
                </label>
            </div>
            <center>
                Dark Mode
            </center>
        </div>
        
        <div class="col-3">

            <button class="btn btn-light btn-warning-gradient btn-block ml-1 mr-1 mt-1 mb-1" data-bs-target="#superFeature"
                data-bs-toggle="modal">
                
                    <i class="fa fa-star"></i>
                    Super Feature
                
            </button>
        </div>

        <div class="col">
            <button class="btn btn-block mt-1 btn-light btn-success-gradient" onclick="scrollCommand('up')">
                <i class="fa-solid fa-arrow-up"></i>
            </button>
        </div>
        <div class="col">
            <button class="btn btn-block mt-1 btn-light btn-secondary-gradient" onclick="scrollCommand('down')">
                <i class="fa-solid fa-arrow-down"></i>
            </button>
        
        </div>
        
        <div class="col-3">
            <div style="font-size:10px">
                Copyright © 2022 Rekapitung - Mahadaya Swara Teknologi 
            </div>
        </div>

    </div>
</div>



<!-- <div class="row justify-content-center mt-2 mb-4">

    <div class="col-4">
        <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
            onclick="redirect('{{url('')}}/administrator/index')">
            dashboard
        </button>
    </div>
    <div class="col-4">

        <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
            onclick="redirect('{{url('')}}/administrator/fraud')">
            fraud
        </button>
    </div>
    <div class="col-4">

        <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
            onclick="redirect('{{url('')}}/administrator/patroli_mode')">
            patroli
        </button>
    </div>
    <div class="col-4">

        <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
            onclick="redirect('{{url('')}}/administrator/master_data_tps')">
            rdr
        </button>
    </div>
    <div class="col-4">

        <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
            onclick="redirect('{{url('')}}/administrator/real_count')">
            realcount
        </button>
    </div>
    <div class="col-4">

        <button class="btn btn-light btn-dark-custom btn-block ml-1 mr-1 mt-1 mb-1"
            onclick="redirect('{{url('')}}/administrator/master_data_tps')">
            TPS Data
        </button>
    </div>




    <div class="col-4">
        <button class="btn btn-light btn-dark-custom btn-block mt-1 mb-1 ml-1 mr-1">
            Publish Count
            <p>
                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('show_terverifikasi',this)"
                        {{($config->show_terverifikasi == "hide") ? "":"checked"; }}>
                    <span class="slider"></span>
                </label>
            </p>
        </button>
    </div>

    <div class="col-4">
        <button class="btn btn-light btn-dark-custom btn-block mt-1 mb-1 ml-1 mr-1">
            C1 Images
            <p>
                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('show_public',this)"
                        {{($config->show_public == "no") ? "":"checked"; }}>
                    <span class="slider"></span>
                </label>
            </p>

        </button>
    </div>
    <div class="col-4">
        <button class="btn btn-light btn-dark-custom btn-block mt-1 mb-1 ml-1 mr-1">
            otonom
            <p>
                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('otonom',this)"
                        {{($config->otonom == "no") ? "":"checked"; }}>
                    <span class="slider"></span>
                </label>
            </p>
        </button>
    </div>
    <div class="col-4">
        <button class="btn btn-light btn-dark-custom btn-block mt-1 mb-1 ml-1 mr-1">
            multi admin
            <p>
                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('multi_admin',this)"
                        {{($config->multi_admin == "no") ? "":"checked"; }}>
                    <span class="slider"></span>
                </label>
            </p>
        </button>
    </div>
    <div class="col-4">
        <button class="btn btn-light btn-dark-custom btn-block mt-1 mb-1 ml-1 mr-1">
            darkmode
            <p>
                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('darkmode',this)"
                        {{($config->darkmode == "no") ? "":"checked"; }}>
                    <span class="slider"></span>
                </label>
            </p>
        </button>
    </div>
    <div class="col-4">
        <button class="btn btn-light btn-dark-custom btn-block mt-1 mb-1 ml-1 mr-1">
            lockdown
            <p>
                <label class="switch">
                    <input type="checkbox" data-target="mode" onclick="settings('lockdown',this)"
                        {{($config->lockdown == "no") ? "":"checked"; }}>
                    <span class="slider"></span>
                </label>
            </p>
        </button>
    </div>



    <div class="col-lg-8">
        <button class="btn btn-primary" onclick="scrollCommand('up')">
            up
        </button>
        <button class="btn btn-primary" onclick="scrollCommand('down')">
            down
        </button>
    </div>

</div> -->

@endsection
