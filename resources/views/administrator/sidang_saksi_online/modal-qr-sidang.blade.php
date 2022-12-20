<div class="modal-header">
                <h5 class="modal-title">Sidang Online MK</h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body" >
                 <!-- TABS STYLES -->
    <link href="../../assets/plugins/tabs/tabs.css" rel="stylesheet" />

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

        <div class="row">
            <div class="col-md">
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
        </div>
        <hr>

        <div class="row">
            <div class="col-md">
                <h1>Laporan Kecurangan</h1>
                <ul class="list-style-1">  
                        @foreach ($list as $item)
                        <li>{{$item['text']}}</li>
                        @endforeach
                    </ul>
                    
                    
                    <div id="carouselFotoKecurangan" class="carousel slide mt-2 mb-2" data-bs-ride="carousel">
                  <div class="carousel-inner">
                      <?php $i = 1; ?>
                  @foreach ($bukti_foto as $item)
                    <div class="carousel-item {{($i == 1)?'active':""}}">
                  <?php $i++; ?>
                           <img class="d-block w-100" alt="" src="{{asset('storage')}}/{{ $item->url }}" data-bs-holder-rendered="true">
                    </div>
                @endforeach
                  
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselFotoKecurangan" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselFotoKecurangan" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>  
                    
                    
            

                @foreach ($bukti_vidio as $item)
                <div class="mt-2 mb-2" id="video" role="tabpanel" aria-labelledby="pills-home-tab">
                    <video style="width: 100%; height: auto;" controls>
                        <source src="{{asset('storage/'.$item->url)}}" type=video/ogg>
                        <source src="{{asset('storage/'.$item->url)}}" type=video/mp4>
                    </video>
                </div>
                @endforeach
             
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md">
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
                
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<!--- TABS JS -->
    <script src="../../assets/plugins/tabs/jquery.multipurpose_tabcontent.js"></script>
    <script src="../../assets/plugins/tabs/tab-content.js"></script>
            </div>
            <div class="modal-footer">
                <a href="{{url('/')}}/administrator/sidang_online/action/{{encrypt($data_tps->id)}}/{{encrypt("Ditolak")}}" class="btn btn-danger btn-lg">
                    Tolak
                </a>
                <!--<a id="Cek" data-bs-toggle="modal" onclick="sidang_online(this)" class="btn btn-primary btn-lg" data-bs-dismiss="modal" data-bs-target="#fotoKecuranganterverifikasi"-->
                <!--            data-id="{{$data_tps->id}}" href="#">-->
                <!--          Sidang Online-->
                <!--</a>-->
                <a href="{{url('/')}}/administrator/get_sidang_online/{{encrypt($data_tps->id)}}" class="btn btn-success btn-lg">
                     Sidang Online
                </a>
                <!--<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"  data-bs-dismiss="modal" data-bs-target="#fotoKecuranganterverifikasi">-->
                <!--    Sidang Online-->
                <!--</button>-->
            </div>
           