@extends('layouts/auth')

@section('content')
    <div class="login-img">
        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="../../assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->
        <!-- PAGE -->
        <div class="page">
            <div class="">
                <div class="col col-login mx-auto">
                    <div class="text-center">
                        <h3 class="display-6" style="font-weight: bold;">
                            Buat Password Baru
                        </h3>
                    </div>
                </div>
                <!-- CONTAINER OPEN -->
                <div class="container-login100">
                    <div class="wrap-login100 p-0">
                        <div class="card-body">
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show text-dark mt-2 mb-2"
                                    role="alert">
                                    {{ Session::get('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close">X</button>
                                </div>
                            @endif
                            <form action="{{ route('security.store', $village_id) }}" method="post"
                                class="login100-form validate-form">
                                @csrf
                                <x-jet-validation-errors class="mb-4" />
                                <div class="wrap-input100 validate-input" data-bs-validate="Password is required">
                                    <input required class="input100" type="password" name="password"
                                        placeholder="Password">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-bs-validate="Password is required">
                                    <input type="password" name="password_confirmation" id="" required
                                        class="input100" placeholder="Password Confirmation">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div class="container-login100-form-btn">
                                    <button type="submit" class="login100-form-btn btn-primary">
                                        submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
