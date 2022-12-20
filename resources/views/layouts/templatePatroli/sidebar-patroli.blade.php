    <?php
    use App\Models\Config;
    use App\Models\District;
    
    $config = Config::all()->first();
    $regency = District::where('regency_id',$config['regencies_id'])->get();
    ?>
    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="<?= url('/') ?>/assets/images/loader.svg" class="loader-img" alt="Loader">
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
                        <img src="<?= url('/') ?>/assets/images/brand/logo.png" class="header-brand-img desktop-logo"
                            alt="logo">
                        <img src="<?= url('/') ?>/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                            alt="logo">
                        <img src="<?= url('/') ?>/assets/images/brand/logo-2.png" class="header-brand-img light-logo"
                            alt="logo">
                        <img src="<?= url('/') ?>/assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                            alt="logo">
                    </a><!-- LOGO -->
                </div>
                <ul class="side-menu">
                    <li class="my-2">
                        &nbsp;
                    </li>
                    <li class="mt-5">
                        <center>
                            <img src="{{asset('storage').'/'.$config['regencies_logo']}}"
                                style="width:120px;height:auto">
                        </center>
                    </li>
                    <li>
                        <span>
                            <a href="http://tangsel.rekapitung.com/input/login" class="text-dark">
                                <center>
                                    <b>
                                        KOTA TANGERANG SELATAN </b>
                                </center>
                            </a>
                        </span>
                    </li>

                    <li>
                        <h3>Commander</h3>
                    </li>
                    <li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"><i
                                class="side-menu__icon fe fe-globe"></i><span class="side-menu__label">Patroli
                                Mode</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="/administrator/patroli_mode/" class="slide-item">Patroli Mode</a></li>
                            <li><a href="/administrator/patroli_mode/tracking/maps" class="slide-item">Lacak Admin</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                    

                </ul>
            </aside>
            <!--/APP-SIDEBAR-->
