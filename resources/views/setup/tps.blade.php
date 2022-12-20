@extends('layouts.setup')

@section('content')
     <div class="row mt-5 text-white">
         <div class="col-lg-12">
             <div class="row justify-content-center">
                 <h1>TPS - Kelurahan</h1>
                 <h6>Pilih Jumlah TPS - Kelurahan</h6>
                      <div class="container">
                           <ul>
                           <li>Isi Form Sesuai TPS Masing Masing kelurahan (Satu Per Satu)</li>
                           <li>Klik tombol Kirim data jika tombol berubah warna menjadi hijau anda dapat melanjutkan mengirim data di kelurahan selanjutnya</li>
                           <li>Pastikan semua tombol berwarna hijau sebelum menekan tombol next</li>
                       </ul>
                      </div>
                      <div class="container">
                          <div class="row justify-content-center">

                            <div class="col-lg-10 mt-4">
                                <div class="card">
                                    <div class="card-header  bg-pri text-white text-center">
                                        KECAMATAN {{$kecamatan['name']}} </div>
                                    <div class="card-body">
                                        <form action="action_setup_tps/{{$kecamatan['id']}}" method="post">
                                            @csrf
                                            <div class="row text-dark">
                                           
                                                @foreach ($kelurahan as $kl)
                                                <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="inputAddress">{{ $kl['name'] }}</label>
                                                    @if ($kl['tps'] > 0)
                                                    <input readonly type="text" class="form-control" name="{{ $kl['id'] }}" id="inputAddress" value="{{$kl['tps']}}" placeholder="Jumlah Tps">
                                                    @else
                                                    <input type="text" class="form-control" name="{{ $kl['id'] }}" id="inputAddress"  placeholder="Jumlah Tps">
                                                    @endif
                                                  </div>
                                                </div>
                                                @endforeach
                                                <button type="submit" class="btn btn-outline-primary my-5">Lanjutkan</button>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
    
                            
                          </div>
                      </div>
                           
             </div>
             <div class="row justify-content-end my-2">
                 
             </div>
         </div>
     </div>
@endsection