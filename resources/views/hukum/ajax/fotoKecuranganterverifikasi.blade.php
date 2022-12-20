<div class="row">
    <div class="col-lg-12">
        <center>
            <h1 class="fw-bold">ARSIP KECURANGAN SAKSI</h1>
        </center>
    </div>
    <div class="col-md-6">

        <div class="row">
            <div class="col-md">

                <div class="card" style="width: 100%; height: auto;">
                    <div class="card-header bg-dark text-white">
                        <h3 class="card-title">Bukti Kecurangan</h3>
                    </div>
                    <div class="card-body h-100">
                        <div id="carousel-controls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php $i=0; foreach ($foto_kecurangan as $foto): ?>
                                <?php if ($i==0) {$set_ = 'active'; } else {$set_ = ''; } ?> 
                                <div class="carousel-item <div class='carousel-item <?php echo $set_; ?>">
                                    <img class="d-block w-100" alt=""
                                        src="{{asset('storage')}}\{{ $foto['url'] }}"
                                        data-bs-holder-rendered="true">
                                </div>
                                <?php $i++; endforeach ?>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-controls" role="button"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-controls" role="button"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4 class="card-title">Bukti Kecurangan</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">

                            <ul id="lightgallery" class="list-unstyled row">
                                <video style="width: 100%; height: auto;" controls>
                                    <source src="{{asset('storage')}}/{{$vidio_kecurangan['url']}}"
                                        type=video/ogg> 
                                    <source
                                        src="{{asset('storage')}}/{{$vidio_kecurangan['url']}}"
                                        type=video/mp4> 
                                </video> 
                            </ul> 
                        </p> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4 class="card-title">Laporan Kejadian TPS</h4>
            </div>
            <form action="action/proses_kecurangan/{{ Crypt::encrypt($tps['id']); }}"
                method="post">
                @csrf
                <div class="card-body" style="height: 1000px; overflow: scroll;">
                    <p class="card-text">
                        <div class="row">
                            <div class="col-12">
                                <h6> {{ $kecamatan['name'] }} - TPS {{$tps['number']}} </h6>
                                
                            </div>
                        </div>
                        <br>
                        <table class="table">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <th class="text-white">Cek</th>
                                    <th class="text-white">Deskripsi Kecurangan Saksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_kecurangan as $item)
                                <tr>
                                    <td><input type="checkbox" name="bukti_text[]"
                                            checked="" value="{{ $item['text'] }}"></td>
                                    <td>{{ $item['text'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </p>
                </div>
            </form>
        </div>

    </div>
</div>
