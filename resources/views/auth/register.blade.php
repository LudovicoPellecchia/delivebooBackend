@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="form-progress-bar text-center mt-4 mb-4">

        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form id="registrationForm" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="user-form-content form-step" data-step="1">
                                <div class="mb-4 row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                    <div class="col-md-6 input-wrapper">
                                        <div class="client-error-msg name-error"></div>

                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="surname"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                                    <div class="col-md-6 input-wrapper">
                                        <div class="client-error-msg surname-error">
                                        </div>

                                        <input id="surname" type="text"
                                            class="form-control @error('surname') is-invalid @enderror" name="surname"
                                            value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                                    <div class="col-md-6 input-wrapper">
                                        <div class="client-error-msg email-error"></div>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6 input-wrapper">

                                        <div class="client-error-msg password-error"></div>
                                        <div class="icon-wrap">
                                            <input id="password" type="password"
                                                class="form-control inputPass @error('password') is-invalid @enderror" name="password"
                                                autocomplete="new-password">
                                            <i class="fa-regular fa-eye-slash toggler-pass"></i>
                                        </div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                    <div class="col-md-6 input-wrapper">

                                        <div class="client-error-msg confirm-pass-error"></div>
                                        <div class="icon-wrap">
                                            <input id="password-confirm" type="password" class="form-control inputPass"
                                                name="password_confirmation" autocomplete="new-password">
                                            <i class="fa-regular fa-eye-slash toggler-pass"></i>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="restaurant-form-content form-step" data-step="2" style="display: none;">
                                <div class="mb-4 row">
                                    <label for="restaurant_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                                    <div class="col-md-6 input-wrapper">
                                        <div class="client-error-msg restaurant-name-error"></div>
                                        <input id="restaurant_name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="restaurant_name"
                                            value="{{ old('restaurant_name') }}" autocomplete="restaurant_name" autofocus>

                                        @error('restaurant_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                    <div class="col-md-6 input-wrapper">
                                        <div class="client-error-msg restaurant-address-error"></div>

                                        <input id="address" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required autocomplete="address" autofocus>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="p_iva"
                                        class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') }}</label>

                                    <div class="col-md-6 input-wrapper">
                                        <div class="client-error-msg restaurant-piva-error"></div>

                                        <input id="p_iva" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="p_iva"
                                            value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus>

                                        @error('p_iva')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="telephone"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                    <div class="col-md-6 input-wrapper">
                                        <div class="client-error-msg restaurant-telephone-error"></div>

                                        <input id="telephone" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="telephone"
                                            value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>




                            </div>

                            <div class="confirmation-content form-step" data-step="3" style="display: none;">
                                <div class="d-flex">
                                    <div class="user-form-content">
                                        <div class="mb-4 row">
                                            <label for="name"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nome:') }}</label>

                                            <div class="col-md-6">


                                                <div id="confirmation-name"></div>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="surname"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                                            <div class="col-md-6">

                                                <div id="confirmation-data"></div>

                                                @error('surname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                                            <div class="col-md-6">
                                                <div id="confirmation-data"></div>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--                                         <div class="mb-4 row">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <div id="confirmation-data"></div>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                            <div class="col-md-6">
                                                <div id="confirmation-data"></div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    </div>
                                    <div class="restaurant-form-content">
                                        <div class="mb-4 row">
                                            <label for="restaurant_name"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                                            <div class="col-md-6">
                                                <div id="confirmation-data"></div>

                                                @error('restaurant_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="address"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                            <div class="col-md-6">
                                                <div id="confirmation-data"></div>

                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="p_iva"
                                                class="col-md-4 col-form-label text-md-right">{{ __('P.IVA') }}</label>

                                            <div class="col-md-6">
                                                <div id="confirmation-data"></div>

                                                @error('p_iva')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4 row">
                                            <label for="telephone"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                            <div class="col-md-6">
                                                <div id="confirmation-data"></div>

                                                @error('telephone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="mb-4 row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" id="register-btn">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary next-step">
                                        {{ __('Avanti') }}
                                    </button>
                                </div>
                            </div>
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary prev-step">
                                        {{ __('Indietro') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
