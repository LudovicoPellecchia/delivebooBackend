@extends('layouts.app')
@section('content')
@section('title', 'Registrazione')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="progress-bar-container text-center mt-4 mb-4">
                <div class="progress-steps">
                    <span class="circle active">1</span>
                    <span class="circle">2</span>
                    <span class="circle">3</span>
                    <div class="progress-bar">
                        <span class="indicator"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="step-name">Il tuo profilo</div>
                    <div class="step-name">Il tuo ristorante</div>
                    <div class="step-name">Conferma i tuoi dati</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header" id="step-header">{{ __('Il tuo profi') }}</div>
                --}}
                <div class="card-body">
                    <form id="registrationForm" method="POST" action="{{ route('register') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="user-form-content form-step" data-step="1">
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

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
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome')
                                    }}</label>

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
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo
                                    E-Mail') }}</label>

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
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                    }}</label>

                                <div class="col-md-6 input-wrapper">

                                    <div class="client-error-msg password-error"></div>
                                    <div class="icon-wrap">
                                        <input id="password" type="password"
                                            class="form-control inputPass @error('password') is-invalid @enderror"
                                            name="password" autocomplete="new-password">
                                        <i
                                            class="fa-regular fa-eye-slash toggler-pass @error('password') d-none @enderror"></i>
                                    </div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{
                                    __('Conferma Password') }}</label>

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
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome')
                                    }}</label>

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
                                <label for="restaurant_photo" class="col-md-4 col-form-label text-md-right">{{
                                    __('Foto') }}</label>

                                <div class="col-md-6 input-wrapper">
                                    <div class="client-error-msg restaurant-name-error"></div>
                                    <input id="restaurant_photo" type="file"
                                        class="form-control @error('photo') is-invalid @enderror"
                                        name="restaurant_photo" autocomplete="restaurant_photo" autofocus>

                                    <div id="photo-preview"></div>

                                    @error('restaurant_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo')
                                    }}</label>

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
                                <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('P.IVA')
                                    }}</label>

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
                                <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono')
                                    }}</label>

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


                                <div class="mb-4 row">
                                    <label for="typologies" class="col-md-4 col-form-label text-md-right">{{
                                        __('Tipologia')
                                        }}</label>

                                    <div class="col-md-6 input-wrapper">
                                        <div class="client-error-msg restaurant-telephone-error"></div>

                                        @foreach ($typologies as $typology)

                                        <input type="checkbox" id="{{ $typology->id }}"
                                            class="typologies form-check-input @error('typologies') is-invalid @enderror"
                                            name="typologies[]" value="{{ $typology->id }}" autofocus>
                                            <label class="form-check-label" for="{{ $typology->id }}">{{ $typology->name
                                            }}</label>
                                        @endforeach

                                        @error('typologies')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>




                        </div>

                        <div class="confirmation-content form-step" data-step="3" style="display: none;">

                            <div class="row row-cols-2 w-100">
                                <div class="col">
                                    <div class="user-form-content">
                                        <h3 class="text-center">Il tuo profilo</h3>
                                        <div class="mb-4">
                                            <label for="name" class=" text-md-right">{{ __('Nome:') }}</label>
                                            <div>
                                                <div id="confirmation-name"></div>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="surname" class=" text-md-right">{{ __('Cognome:') }}</label>

                                            <div>

                                                <div id="confirmation-surname"></div>

                                                @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="email" class=" text-md-right">{{ __('Indirizzo E-Mail:')
                                                }}</label>

                                            <div>
                                                <div id="confirmation-email"></div>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="restaurant-form-content">
                                        <h3 class="text-center">Il tuo ristorante</h3>

                                        <div class="mb-4">
                                            <label for="restaurant_name" class=" text-md-right">{{ __('Nome
                                                Ristorante:')
                                                }}</label>

                                            <div>
                                                <div id="confirmation-rest-name"></div>

                                                @error('restaurant_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div for="restaurant_photo" class=" text-md-right">{{ __('Foto:')
                                                }}</div>

                                            <div>
                                                <div id="confirmation-rest-photo">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="address" class=" text-md-right">{{ __('Indirizzo:') }}</label>

                                            <div>
                                                <div id="confirmation-rest-address"></div>

                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="p_iva" class=" text-md-right">{{ __('P.IVA:') }}</label>

                                            <div>
                                                <div id="confirmation-rest-piva"></div>

                                                @error('p_iva')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="telephone" class=" text-md-right">{{ __('Telefono:') }}</label>

                                            <div>
                                                <div id="confirmation-rest-tel"></div>

                                                @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>



                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="register-btn" disabled>
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

@vite(['resources/js/register_form.js'])

@endsection