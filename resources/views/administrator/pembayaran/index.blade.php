@extends('layouts.main-pembayaran')

@section('content')

<div class="row mt-3">
    <div class="col-lg-4">
        <h1 class="page-title fs-1 mt-2">Dashboard Rekapitung
            <!-- Kota -->
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payroll
                <!-- Kota -->
            </li>
        </ol>
        <h4 class="fs-4 mt-2 fw-bold">Administrator Payroll (2)</h4>
    </div>
</div>

    <h4 class="fs-4 mt-5 fw-bold">Laporan Pembayaran Saksi</div> </h4>
<div class="container-fluid" style="padding-right: 1.75rem !important; padding-left: 1.75rem !important">
    <hr style="border: 1px solid">

<div class="row mt-5">
    <div class="col-lg-12 col-md-12">

        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-white text-center align-middle">Nama</td>
                            <th class="text-white text-center align-middle">Angka</td>
                            <th class="text-white text-center align-middle">Nama Bank</td>
                            <th class="text-white text-center align-middle">Status</td>
                            <th class="text-white text-center align-middle">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekening as $item)
                        <tr>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['number']}}</td>
                            <td>{{$item['bank_name']}}</td>
                            <td>{{$item['status']}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cekPembayaran">
                                    Cek
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="cekPembayaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection