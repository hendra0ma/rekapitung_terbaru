    <?php

    use App\Models\Config;
    use App\Models\District;
    use App\Models\Regency;
use App\Models\Tps;
    $config = Config::all()->first();
    $kota = Regency::where('id', $config['regencies_id'])->first();
$tps = Tps::where('district_id',(string)$district->id)->count();
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
                                    <b>{{$kota['name']}} <br>
                                        KECAMATAN {{$district['name']}}</b>
                                </center>
                            </a>
                        </span>
                    </li>
                    <li>
                        <h3>Main</h3>
                    </li>
                    <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="side-menu__icon fe fe-database"></i>
                        <span class="side-menu__label">DPT - TPS {{$title2}}</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu open">
                        <li><a href="#" class="slide-item">DPT {{$district->dpt}}</a></li>
                        <li><a href="#" class="slide-item">TPS {{$tps}}</a></li>
                    </ul>
                </li>
                   <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="side-menu__icon fe fe-database"></i>
                        <span class="side-menu__label">Kelurahan</span>
                        <i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu open">
                          <?php
                            $cek = App\Models\Security::where('district_id', $village->id)->where('security', 2)->where('user_id', Auth::user()->id)->count();
                            ?>
                        @foreach($villages as $village)
                        <li><a href="{{$cek > 0 ? route('security.login',Crypt::encrypt($village->id)):route('security.register',Crypt::encrypt($village->id))}}" class="slide-item"> {{$village->name}}</a></li>
                        @endforeach

                    </ul>
                </li>
                    @if (Request::segment(2) == 'index')
                    <li class="slide is-expanded">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#">
                            <i class="side-menu__icon fe fe-database"></i>
                            <span class="side-menu__label">Kelurahan</span>
                            <i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            @foreach ($villages as $village)
                            <li><a href="{{ $village->id }}" class="slide-item">
                                    {{ $village->name }}</a>
                            </li>
                            @endforeach

                        </ul>
                    </li>
                    <li>
                        <h3>Main</h3>
                    </li>
                    @elseif(Request::segment(2) == 'village' || Request::segment(2) == 'tpsteraudit')
                      <li>
                        <a class="side-menu__item" href="#" onclick="openPage('home', this)"><i class="side-menu__icon mdi mdi-home"></i>TPS Terverifikasi </a>
                    </li>
                     <li>
                        <a class="side-menu__item" href="#"  onclick="openPage('teraudit', this)"><i class="side-menu__icon mdi mdi-home"></i>TPS Teraudit</a>
                    </li>
                  
                    <li>
                        <a class="side-menu__item" href="#"  onclick="openPage('dibatalkan', this)"><i class="side-menu__icon mdi mdi-home"></i>TPS Dibatalkan</a>
                    </li>
                   
                    @elseif(Request::segment(2) == 'koreksidata')
                    @endif
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
            <!--/APP-SIDEBAR-->