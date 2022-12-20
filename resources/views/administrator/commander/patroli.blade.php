@extends('layouts.main-patroli-mode ')
@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Patroli Mode</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Patroli Mode</li>
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <p class="card-text">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap border-bottom w-100" id="basic-datatable">
                    <thead>
                        <tr>
                            <th class="border-bottom-0">NIK</th>
                            <th class="border-bottom-0">Nama</th>
                            <th class="border-bottom-0">Email</th>
                            <th class="border-bottom-0">No. Hp</th>
                            <th class="border-bottom-0">Role</th>
                            <th class="border-bottom-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team as $tim)
                        <tr>
                            <td>{{$tim['nik']}}</td>
                            <td>{{$tim['name']}}  @if(Cache::has('is_online' . $tim['id']))
                                <span class="badge bg-success  me-1 mb-1 mt-1">Online</span>
                                @else
                                <span class="badge bg-danger  me-1 mb-1 mt-1">Offline</span>
                                @endif
                                @if ($tim['id'] == Auth::user()->id)
                                    (You)
                                @endif
                            </td>
                            <td>{{$tim['email']}}</td>
                            <td>{{$tim['no_hp']}}</td>
                            <td>
                                @if($tim['role_id'] == 1)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Administrator</span>
                                @elseif($tim['role_id'] == 2)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Verifikator</span>
                                @elseif($tim['role_id'] == 3)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Auditor</span>
                                @elseif($tim['role_id'] == 5)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Checking</span>
                                @elseif($tim['role_id'] == 6)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Hunter</span>
                                @elseif($tim['role_id'] == 7)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Hukum</span>
                                @elseif($tim['role_id'] == 8)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Saksi</span>
                                @elseif($tim['role_id'] == 9)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Rekapitulator</span>
                                @elseif($tim['role_id'] == 10)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Validator Hukum</span>
                                @elseif($tim['role_id'] == 11)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Balwaslu</span>
                                @elseif($tim['role_id'] == 12)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Payrole</span>
                                @elseif($tim['role_id'] == 14)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Relawan</span>
                                @elseif($tim['role_id'] == 20)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Huver</span>
                                @elseif($tim['role_id'] == 0)
                                <span class="badge bg-success  me-1 mb-1 mt-1">Terblokir</span>
                                @else
                                {{$tim['role_id']}}
                                @endif
                            </td>
                            <td>
                                <a href="cekmodalhistory" class="btn btn-primary cekmodalhistory" style="font-size: 0.8em;" id="Cek" data-id="{{$tim['id']}}"
                                data-bs-toggle="modal" id="" data-bs-target="#cekmodalhistory">Cek</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Kecamatan</h5>
    </div>
    <div class="card-body">
        <p class="card-text">
            @foreach ($district as $item)
            <a href="kecamatanModal" class="btn btn-lg btn-outline-success rounded-0 mt-2 kecamatanModal" data-bs-toggle="modal" data-bs-target="#kecamatanModal" data-id="{{$item['id']}}"
            data-bs-toggle="modal" id="" data-bs-target="#kecamatanModal">Kecamatan {{$item['name']}}</a>
            @endforeach
        </p>
    </div>
</div>

<div class="modal fade" id="cekmodalhistory" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Tracking Activity</div>
            </div>
            <div class="container">
                <div id="container-history"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kecamatanModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="container-kecamatan-tracking">
        </div>
    </div>
</div>

@endsection
