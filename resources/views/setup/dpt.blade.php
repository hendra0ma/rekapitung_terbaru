@extends('layouts.setup')

@section('content')
<div class="container">
    <div class="row mt-5 text-white mb-5">
        <div class="col-lg-12">
            <form action="action_setup_dpt" method="post">
                @csrf
                <div class="row justify-content-center">
                    <h1>Pilih Provinsi & Kota Sesuai Tugas Anda</h1>
                    <div class="container">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti ducimus impedit quidem,
                        cupiditate, error odio aliquid eius aliquam et a odit quia adipisci sunt obcaecati! Mollitia amet
                        voluptatibus unde qui?
    
                        <div class="row justify-content-center mt-5">
                            @foreach ($district as $dc)
                            <div class="col-lg-3 mt-4">
                                <div class="card">
                                    <div class="card-header  bg-pri text-white text-center">
                                        {{ $dc['name']}} </div>
                                    <div class="card-body">
                                        <div class="row text-dark">
                                            <small>Jumlah DPT Kecamatan {{ $dc['name']}} </small>
                                            <div class="input-group mt-3">
    
                                                @if ($dc['dpt'] == NULL)
                                                <input class="form-control"  type="text" required name="{{$dc['id']}}" value="" placeholder="Total DPT" aria-label="Recipient's " aria-describedby="my-addon">

                                                @else
                                                <input class="form-control"  type="text" required name="{{$dc['id']}}" readonly value="{{$dc['dpt']}}" placeholder="Total DPT" aria-label="Recipient's " aria-describedby="my-addon">

                                               
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            @endforeach
    
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end my-5">
                    <button type="submit" class="btn btn-outline-light">Lanjutkan</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection
