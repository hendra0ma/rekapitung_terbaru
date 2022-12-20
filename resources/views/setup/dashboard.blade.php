@extends('layouts.setup')

@section('content')
     <div class="row mt-5 text-white">
         <div class="col-lg-12">
             <div class="row justify-content-center">
                 <h1>Setup Pages Rekapitung</h1>
                 <p class="mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima consequuntur officia quam quis quas dolorem beatae et tempora porro vitae. Veritatis magnam tenetur vero atque eum, temporibus iusto pariatur Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis fuga placeat saepe cupiditate, natus optio odio voluptatibus tempora recusandae debitis magnam corrupti unde commodi? Amet aliquid alias animi laudantium. Iste.</p>
                 <h3 class="mt-1">Instruksi Installasi</h3>
                   <h6 class="mt-1">Selamat Datang Di Rekapitung</h6>
                            <p>Rekapitung adalah sistem rekapitulasi dan perhitungan suara versi kandidat untuk pemilu diberbagai tingkatan, mulai dari Pilpres, Pilkada dan Pileg. Sebelum menggunakan sistem Rekapitung, Anda harus melakukan setup terlebih dahulu. Berikut langkah langkah melakukan installasi di Rekapitung : </p>
                           <div class="container">
                                <ul>
                                <li>1. Siapkan Logo Kota/kabupaten wilayah pemilihan</li>
                                <li>2. Siapkan logo Bendera partai</li>
                                <li>3. Siapkan foto semua paslon yang bertarung dan nama-namanya</li>
                                <li>4. Siapkan data DPT di semua kecamatan wilayah pemilihan</li>
                                <li>5. Siapkan data TPS di semua kelurahan wilayah pemilihan</li>
                            </ul>
                           </div>
                            <h6>Cara Installasi</h6>
                            <div class="container">
                                <ul>
                                <li><i class="fas fa-hand-point-right"></i> Upload Logo Kota/Kabupaten & Bendera Partai Pada Kolom Yang disediakan</li>
                                <li><i class="fas fa-hand-point-right"></i> Pilih Jumlah kandidat yang bertarung di wilayah pemilihan</li>
                                <li><i class="fas fa-hand-point-right"></i> Upload Semua foto paslon beserta nama dan gelarnya pada halaman berikutnya</li>
                                <li><i class="fas fa-hand-point-right"></i> Isi data DPT dan TPS sesuai form yang muncul</li>
                                <li>Setelah semua tahapan setup telah selesai, Rekapitung siap digunakan.</li>
                            </ul>
                            </div>
                           
             </div>
             <div class="row justify-content-end my-2">
                 <a href="setup_kota" class="btn btn-outline-light">Lanjutkan</a>
             </div>
         </div>
     </div>
@endsection