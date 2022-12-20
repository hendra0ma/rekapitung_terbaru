@extends('layouts.main-sidang-online')


@section('content')
<div class="row mt-3">
    <div class="col-lg-4">
        <h1 class="page-title fs-1 mt-2">Dashboard Rekapitung
            <!-- Kota -->
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sidang
                <!-- Kota -->
            </li>
        </ol>
        <h4 class="fs-4 mt-2 fw-bold">Akun Mahkamah Konstitusi</h4>
    </div>
    <div class="col-lg-4 text-center">
        <h4><img style="width: 150px" src="https://contactmk.mkri.id/design/img/logo_mk_new.png" alt="">
        <br> <h1 class="fw-bold text-center mx-auto" style="margin-bottom: 5px;">MAHKAMAH KONSTITUSI RI</h1></h4>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <h2 class="fw-bold text-center mx-auto" style="margin-bottom: 5px;">Laporan Kecurangan dan Pelanggaran Pemilu</h2>
    </div>
    <div class="col-md-12">
        <h2 class="fw-bold text-center mx-auto"> Pilkada Kota Tangerang Selatan Tahun 2020</h2>
    </div>
</div>

<div class="row mt-3">
    
    <div class="col-lg-12 mt-2">
        <div class="row">
            <div class="col-lg-3 justify-content-end">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="card-title text-white">Total Kecurangan Masuk</div>
                    </div>
                    <div class="card-body">
                        <p class="">{{ count($data_masuk) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="card-title text-white">Peserta Sidang Online</div>
                    </div>
                    <div class="card-body">
                        <p class="">{{ count($selesai) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg-danger">
                        <div class="card-title text-white">Peserta Sidang Tidak Menjawab</div>
                    </div>
                    <div class="card-body">
                        <p class="">{{ count($tidak_menjawab) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="card-title text-white">Total Kecurangan Ditolak</div>
                    </div>
                    <div class="card-body">
                        <p class="">{{ count($ditolak) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<h4 class="fs-4 mt-2 fw-bold">Sidang Online Pemilu<div>Paten 4 (Teknologi Sidang Gugatan Pemilu)</div></h4>
<!-- PAGE-HEADER END -->
<hr style="border: 1px solid;">

<div class="row" style="margin-top: 30px;">
    @foreach($list_suara as $ls)
    <?php $scan_url = "" . url('/') . "/scanning/" . Crypt::encrypt($ls['nomor_berkas']) . ""; ?>
    <div class="col-md-6 col-xl-4">
        <div class="card">
              @if ($tag == 2)
                   @if ($ls->makamah_konsitusi == "Ditolak")
    <div class="ribbone">
												 <div class="ribbon"><span>{{ $ls->makamah_konsitusi }}</span></div>
											</div>
											@elseif ($ls->makamah_konsitusi == "Panggil")
											 <div class="ribbone">
												 <div class="ribbon"><span>{{ $ls->makamah_konsitusi }}</span></div>
											</div>
												@elseif ($ls->makamah_konsitusi == "Tidak Menjawab")
											 <div class="ribbone">
												 <div class="ribbon"><span>{{ $ls->makamah_konsitusi }}</span></div>
											</div>
												@elseif ($ls->makamah_konsitusi == "Selesai")
											 <div class="ribbone">
												 <div class="ribbon"><span>{{ $ls->makamah_konsitusi }}</span></div>
											</div>
        @else

        @endif
        
							
              @endif
          				
            <div class="card-header bg-primary">
                <div class="card-title text-white">LAPORAN SAKSI</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        @if ($ls->profile_photo_path == NULL)
                        <img class="" style="width: 250px;"
                            src="https://ui-avatars.com/api/?name={{ $ls->name }}&color=7F9CF5&background=EBF4FF"
                            alt="img">
                        @else
                        <img class="" style="width: 250px;"
                            src="{{url("/storage/profile-photos/".$ls->profile_photo_path) }}">
                        @endif
                    </div>
                    <div class="col-md">
                        <a id="Cek" data-bs-toggle="modal" onclick="qrsidang(this)" data-bs-target="#modalQrCode"
                            data-id="{{$ls->tps_id}}" href="#">
                            {!! QrCode::size(200)->generate($scan_url); !!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script>
     
        let qrsidang = function(ini){
            let id_tps = $(ini).data('id');
            $.ajax({
                url : "{{url('')}}/administrator/get_qrsidang",
                data : {
                       id_tps,
                    },
                type : 'GET',
                success : function(response){
                    document.querySelector('div#qrSidang').innerHTML = response;
                }
            })
        }
    </script>
     <script>
     
        let sidang_online = function(ini){
            let id_tps = $(ini).data('id');
            $.ajax({
                url : "{{url('')}}/administrator/get_sidang_online",
                data : {
                      id_tps,
                    },
                type : 'GET',
                success : function(response){
                    document.querySelector('div#qrSidangOnline').innerHTML = response;
                }
            })
        }
    </script>
</div>
@endsection