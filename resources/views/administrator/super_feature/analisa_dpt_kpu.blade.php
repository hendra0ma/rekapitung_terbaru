@extends('layouts.mainlayout')

@section('content')


<div class="row mt-3">
    <div class="col-lg-4">
        <h1 class="page-title fs-1 mt-2">Dashboard Rekapitung
            <!-- Kota -->
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Analisa DPT
                <!-- Kota -->
            </li>

        </ol>

    </div>
    <h3 class="page-title mt-2">Hasil Analisa DPT KPU Tingkat Kabupaten / Kota</h2>
</div>

<hr style="border: 1px solid; margin-top: 50px">
  <div class="container" style="margin-top: 30px">
    <div class="card">
        <div class="card-body">
           <center>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/KPU_Logo.svg/925px-KPU_Logo.svg.png" class="hadow-4 mb-3"
            style="width: 100px;" alt="Avatar" />
           </center>
           <b><center>Hasil Analisa DPT KPU</center>
            <center>Pilkada Tanggerang Selatan 2020</center></b>
          <table class="table table-bordered table-hover mt-2">
              <thead class="bg-primary text-white">
                  <tr>
                  <tr>
                      <td class="text-white text-center align-middle">Kecamatan</td>
                      <td class="text-white text-center align-middle">Total DPT KPU</td>
                      <td class="text-white text-center align-middle">Total Pengguna Hak Pilih</td>
                      <td class="text-white text-center align-middle">Selisih</td>
                      <td class="text-white text-center align-middle">GAP</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($kecamatan as $item)
                  <?php $pengguna_hak = App\Models\SaksiData::where('district_id',$item['id'])->sum('voice'); ?>
                  <?php $persen = ($item['dpt'] - $pengguna_hak) / $item['dpt'] * 100; ?>
                  <tr>
                      <td>{{$item['name']}}</td>
                      <td>{{$item['dpt']}}</td>
                      <td>{{$pengguna_hak}}</td>
                      <td>{{$item['dpt'] - $pengguna_hak}}</td>
                      <td>@if ($pengguna_hak == 0)
                          0%
                          @else
                          {{ floor($persen) }}%
                          @endif</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          <a href="{{url('/')}}/administrator/analisa_dpt_kpu/print" class="btn btn-xl btn-primary">Print</a>
        </div>
    </div>
  </div>
@endsection
