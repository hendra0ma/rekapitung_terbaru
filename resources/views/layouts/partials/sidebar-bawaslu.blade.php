<?php

use App\Models\Config;
use App\Models\District;
use App\Models\Regency;
use App\Models\Tps;
use App\Models\SolutionFraud;
use Illuminate\Support\Facades\DB;


$solutions = SolutionFraud::get();

$config = Config::all()->first();
$regency = District::where('regency_id', $config['regencies_id'])->get();
$kota = Regency::where('id', $config['regencies_id'])->first();
$dpt = District::where('regency_id', $config['regencies_id'])->sum('dpt');
$tps = 2963;
?>
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
                                <b>{{$kota['name']}}</b>
                            </center>
                        </a>
                    </span>
                </li>
                <li>
                    <h3>Main</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="{{route('superadmin.index_tsm')}}"><i class="side-menu__icon mdi mdi-chart-arc"></i><span class="side-menu__label">Indek TSM Pemilu</span></a>
                </li>
                <li class="slide is-expanded">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon mdi mdi-check"></i><span class="side-menu__label">Rekomendasi Tindakan</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach($solutions as $solut)
                        <li><a href="{{route('superadmin.solution',encrypt($solut->id))}}" class="slide-item">{{$solut->solution}}</a></li>
                        @endforeach
                    </ul>
                </li>
                
                <li>
                    <a class="side-menu__item" href="{{route('superadmin.FraudDataReport')}}"><i class="side-menu__icon mdi mdi-barcode"></i><span class="side-menu__label">Fraud Barcode Report (FBR)</span></a>
                </li>
                <li>
                    <a class="side-menu__item" href="{{route('superadmin.fraudDataPrint')}}"><i class="side-menu__icon mdi mdi-printer"></i><span class="side-menu__label">Fraud Data Print (FDP)</span></a>
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