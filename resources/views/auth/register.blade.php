@extends('layouts.app')
@section('content')
    <div class="container mt-4">
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

                                    <div class="col-md-6">
                                        <div class="client-error-msg name-error">
                                        </div>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>


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
                                        <div class="client-error-msg surname-error">
                                        </div>

                                        <input id="surname" type="text"
                                            class="form-control @error('surname') is-invalid @enderror" name="surname"
                                            value="{{ old('surname') }}" required autocomplete="surname" autofocus>

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
                                        <div class="client-error-msg email-error"></div>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

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

                                    <div class="col-md-6">
                                        <div class="client-error-msg password-error"></div>

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

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
                                        <div class="client-error-msg confirm-pass-error"></div>

                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>

                            <div class="restaurant-form-content form-step" data-step="2" style="display: none;">
                                <div class="mb-4 row">
                                    <label for="restaurant_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                                    <div class="col-md-6">
                                        <input id="restaurant_name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="restaurant_name"
                                            value="{{ old('restaurant_name') }}" required autocomplete="restaurant_name"
                                            autofocus>

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

                                    <div class="col-md-6">
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

                                    <div class="col-md-6">
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
                                                {{--                                                 <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}" required
                                                    autocomplete="name" autofocus> --}}

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
                                                {{--                                                 <input type="text"
                                                    class="form-control @error('surname') is-invalid @enderror"
                                                    name="surname" value="{{ old('surname') }}" required
                                                    autocomplete="surname" autofocus> --}}
                                                <div id="confirmation-surname"></div>

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
                                                {{--                                                 <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email"> --}}
                                                <div id="confirmation-email"></div>

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

                                            <div class="col-md-6">
                                                {{--                                                 <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"> --}}
                                                <div id="confirmation-password"></div>

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
                                                {{--                                                 <input type="password" class="form-control" name="password_confirmation"
                                                    required autocomplete="new-password"> --}}
                                                <div id="confirmation-conf-password"></div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="restaurant-form-content">
                                        <div class="mb-4 row">
                                            <label for="restaurant_name"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                                            <div class="col-md-6">
                                                {{--                                                 <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="restaurant_name" value="{{ old('restaurant_name') }}" required
                                                    autocomplete="restaurant_name" autofocus> --}}
                                                <div id="confirmation-restaurant-name"></div>

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
                                                {{--                                                 <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="address" value="{{ old('address') }}" required
                                                    autocomplete="address" autofocus> --}}
                                                <div id="confirmation-address"></div>

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
                                                {{--                                                 <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="p_iva" value="{{ old('p_iva') }}" required
                                                    autocomplete="p_iva" autofocus> --}}
                                                <div id="confirmation-p-iva"></div>

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
                                                {{--                                                 <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="telephone" value="{{ old('telephone') }}" required
                                                    autocomplete="telephone" autofocus> --}}
                                                <div id="confirmation-telephone"></div>

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

    <script>
        //VALIDAZIONI CLIENT FORM
        let validated = false
        let validations = [false, false, false, false, false]

        //VALIDAZIONE PRIMO STEP
        function validateFirstStep() {
            const formName = document.getElementById('name').value
            const formSurname = document.getElementById('surname').value
            const formMail = document.getElementById('email').value
            const formPass = document.getElementById('password').value
            const formConfPass = document.getElementById('password-confirm').value


            const nameErrorWrap = form.querySelector('.name-error');
            const surnErrorWrap = form.querySelector('.surname-error')
            const emailErrorWrap = form.querySelector('.email-error');
            const passErrorWrap = form.querySelector('.password-error');
            const confPassErrorWrap = form.querySelector('.confirm-pass-error')

            let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;



            if (formName == "" || !/^[a-zA-Z]+$/.test(formName)) {
                // Mostra un messaggio di errore
                const nameErrorMsg = "Il nome non può essere vuoto e deve contenere solo lettere";
                nameErrorWrap.textContent = nameErrorMsg
                //imposta il campo come non valido
                validations[0] = false;
            } else {
                // Imposta il form come  valido
                validations[0] = true;
                nameErrorWrap.textContent = ""
            }

            if (formSurname == "" || !/^[a-zA-Z]+$/.test(formSurname)) {
                // Mostra un messaggio di errore
                const surnameErrorMsg = "Il cognome non può essere vuoto e deve contenere solo lettere";
                surnErrorWrap.textContent = surnameErrorMsg
                // Imposta il campo come non valido
                validations[1] = false;
            } else {
                // Imposta il form come valido
                validations[1] = true;
                surnErrorWrap.textContent = ""
            }

            if (formMail == "" || !emailRegex.test(formMail)) {
                // Mostra un messaggio di errore
                const emailErrorMsg = ("L'email non può essere vuota e deve avere un formato valido");
                emailErrorWrap.textContent = emailErrorMsg
                // Imposta il campo come non valido
                validations[2] = false;
            } else {
                // Imposta il form come  valido
                validations[2] = true;
                emailErrorWrap.textContent = ""
            }

            if (formPass == "" || formPass.length < 6) {
                // Mostra un messaggio di errore
                const passErrorMsg = "La password non può essere vuota e deve avere almeno 6 caratteri";
                passErrorWrap.textContent = passErrorMsg
                // Imposta il campo come non valido
                validations[3] = false;

            } else {
                // Imposta il form come  valido
                validations[3] = true;
                passErrorWrap.textContent = ""
            }

            if (formConfPass != formPass) {
                // Mostra un messaggio di errore
                const confPassErrorMsg = "La conferma deve essere uguale alla password";
                confPassErrorWrap.textContent = confPassErrorMsg
                // Imposta il campo come non valido
                validations[4] = false;
            } else {
                // Imposta il form come  valido
                validations[4] = true;
                confPassErrorWrap.textContent = ""
            }

            validated = validations.every(value => value === true);

        }
        //VALIDAZIONE SECONDO STEP
        function validateSecondStep() {
            console.log('ciao')
        }


        //LOGICA DISPLAY FORM-STEPS
        const form = document.getElementById('registrationForm');
        const steps = form.querySelectorAll('.form-step');
        const prevBtn = form.querySelector('.prev-step');
        const nextBtn = form.querySelector('.next-step');

        let currentStep = 0
        prevBtn.style.display = 'none';

        //disabilito il tasto di registrazione fino all'ultimo step
        const registerBtn = document.getElementById('register-btn')
        if (currentStep === 0) {
            registerBtn.disabled = true;
        }

        // Gestisce il click sul pulsante "Next"
        nextBtn.addEventListener('click', function() {
            // Logica di validazione
            if (currentStep === 0) {
                validateFirstStep();
                if (validated === false) {
                    return;
                }
            } else if (currentStep === 1) {
                validateSecondStep();
                if (validated === false) {
                    return;
                }
            }

            // Logica di transizione di step
            currentStep++;
            steps[currentStep - 1].style.display = 'none'; // Nascondi il passo corrente
            steps[currentStep].style.display = 'block'; // Mostra il passo successivo

            // Aggiornamenti supplementari per specifici passi
            if (currentStep === 1) {
                prevBtn.style.display = 'block';
            } else if (currentStep === steps.length - 1) {
                nextBtn.style.display = 'none';
                registerBtn.disabled = false;
            }
        });


        // Gestisce il click sul pulsante "Prev"
        prevBtn.addEventListener('click', function() {
            currentStep--

            if (currentStep === 0) {
                prevBtn.style.display = 'none'
            }

            steps[currentStep + 1].style.display = 'none'; // Nascondi il passo corrente
            steps[currentStep].style.display = 'block'; // Mostra il passo precedente

            nextBtn.style.display = 'block';
        });
    </script>
@endsection
