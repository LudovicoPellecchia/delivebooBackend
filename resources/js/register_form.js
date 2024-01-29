//VALIDAZIONI CLIENT FORM
//primo step
let formName = document.getElementById('name')
let formSurname = document.getElementById('surname')
let formMail = document.getElementById('email')
let formPass = document.getElementById('password')
let formConfPass = document.getElementById('password-confirm')
//secondo step
let formRestName = document.getElementById('restaurant_name')
let formRestAddress = document.getElementById('address')
let formRestPiva = document.getElementById('p_iva')
let formRestTel = document.getElementById('telephone')

let validated = false

const formValidated = {
    firstStep: [false, false, false, false, false],
    secondStep: [false, false, false, false]
};


function setError(element, message, step, validationIndex) {
    //recupero il contenitore dell'input
    const inputControl = element.closest('.input-wrapper');
    //recupero il contenitore del messaggio di errore
    const errorDisplay = inputControl.querySelector('.client-error-msg');
    //Mostra il messaggio di errore
    errorDisplay.textContent = message;
    inputControl.classList.add('client-error-msg')

    //Tengo traccia del campo invalido
    formValidated[step][validationIndex] = false
}

function setSuccess(element, step, validationIndex) {
    //recupero il contenitore dell'input
    const inputControl = element.closest('.input-wrapper');
    //recupero il contenitore del messaggio di errore
    const errorDisplay = inputControl.querySelector('.client-error-msg');

    errorDisplay.textContent = ''
    inputControl.classList.remove('client-error-msg')

    formValidated[step][validationIndex] = true
}


//VALIDAZIONE PRIMO STEP
function validateFirstStep() {
    let formNameValue = formName.value.trim()
    let formSurnameValue = formSurname.value.trim()
    let formMailValue = formMail.value.trim()
    let formPassValue = formPass.value.trim()
    let formConfPassValue = formConfPass.value.trim()

    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (formNameValue == "" || !/^[a-zA-Z]+$/.test(formNameValue)) {
        // Mostra un messaggio di errore
        setError(formName, 'Il nome non può essere vuoto e deve contenere solo lettere', 'firstStep', 0)
    } else {
        setSuccess(formName, 'firstStep', 0)
        // stampo il valore nel form di conferma
        const confirmName = document.getElementById('confirmation-name');
        confirmName.textContent = formNameValue
    }

    if (formSurnameValue == "" || !/^[a-zA-Z]+$/.test(formSurnameValue)) {
        setError(formSurname, 'Il cognome non può essere vuoto e deve contenere solo lettere', 'firstStep', 1)
    } else {
        setSuccess(formSurname, 'firstStep', 1)
        const confirmSurname = document.getElementById('confirmation-surname');
        confirmSurname.textContent = formSurnameValue
    }

    if (formMailValue == "" || !emailRegex.test(formMailValue)) {
        setError(formMail, "L'email non può essere vuota e deve avere un formato valido", 'firstStep', 2)
    } else {
        setSuccess(formMail, 'firstStep', 2)
        const confirmEmail = document.getElementById('confirmation-email');
        confirmEmail.textContent = formMailValue
    }

    if (formPassValue == "" || formPassValue.length < 6) {
        setError(formPass, 'La password non può essere vuota e deve avere almeno 6 caratteri', 'firstStep', 3)
    } else {
        setSuccess(formPass, 'firstStep', 3)
/*         const confirmPass = document.getElementById('confirmation-password');
        confirmPass.textContent = formPassValue */
    }

    if (formConfPassValue != formPassValue) {
        setError(formConfPass, 'La conferma deve essere uguale alla password', 'firstStep', 4)
    } else {
        setSuccess(formConfPass, 'firstStep', 4)
/*         const confirmPass = document.getElementById('confirmation-conf-password');
 */    }

    validated = formValidated['firstStep'].every(value => value === true);

}
//VALIDAZIONE SECONDO STEP
function validateSecondStep() {
    const formRestNameValue = formRestName.value.trim()
    const formRestAddressValue = formRestAddress.value.trim()
    const formRestPivaValue = formRestPiva.value.trim()
    const formRestTelValue = formRestTel.value.trim()

    let pivaRegex = /^\d{11}$/; // Esempio: Partita IVA con 11 cifre

    if (formRestNameValue == "" || !/^[a-zA-Z0-9\s]+$/.test(formRestNameValue)) {
        //Mostra un messaggio di errore
        setError(formRestName, "Il nome del ristorante non può essere vuoto e deve contenere solo lettere", 'secondStep', 0)

    } else {
        setSuccess(formRestName, 'secondStep', 0);
        const confirmRestName = document.getElementById('confirmation-rest-name');
        confirmRestName.textContent = formRestNameValue
    }

    if (formRestAddressValue == "") {
        setError(formRestAddress, "L'indirizzo del ristorante non può essere vuoto", 'secondStep', 1)
    } else {
        setSuccess(formRestAddress, 'secondStep', 1);
        const confirmRestAddress = document.getElementById('confirmation-rest-address');
        confirmRestAddress.textContent = formRestAddressValue
    }

    if (formRestPivaValue == "" || !pivaRegex.test(formRestPivaValue)) {
        setError(formRestPiva, "La partita IVA deve contenere 11 cifre", 'secondStep', 2)
    } else {
        setSuccess(formRestPiva, 'secondStep', 2);
        const confirmRestPiva = document.getElementById('confirmation-rest-piva');
        confirmRestPiva.textContent = formRestPivaValue

    }

    if (formRestTelValue == "" || !/^\d{10}$/.test(formRestTelValue)) {
        setError(formRestTel, "Il numero di telefono deve contenere 10 cifre", 'secondStep', 3)
    } else {
        setSuccess(formRestTel, 'secondStep', 3);
        const confirmRestTel = document.getElementById('confirmation-rest-tel');
        confirmRestTel.textContent = formRestTelValue
    }

    validated = formValidated['secondStep'].every(value => value === true);
}



//LOGICA DISPLAY FORM-STEPS
const form = document.getElementById('registrationForm');
const steps = form.querySelectorAll('.form-step');
const prevBtn = form.querySelector('.prev-step');
const nextBtn = form.querySelector('.next-step');

let currentStep = 0

//recupero il button di registrazione
const registerBtn = document.getElementById('register-btn')

prevBtn.style.display = 'none';
// Gestisce il click sul pulsante "Next"
nextBtn.addEventListener('click', function () {
    // Logica di validazione
    if (currentStep === 0) {
        validateFirstStep();
        if (!validated) {
            return;
        }
    } else if (currentStep === 1) {
        validateSecondStep();
        if (!validated) {
            return;
        }
    }

    // Logica di transizione di step
    currentStep++;
    steps[currentStep - 1].style.display = 'none'; // Nascondi il passo corrente
    steps[currentStep].style.display = 'block'; // Mostra il passo successivo

    //Aggiorno la barra di progresso
    updateProgressBar(nextBtn)


    // Aggiornamenti supplementari per specifici passi
    if (currentStep === 1) {
        prevBtn.style.display = 'block';
    }
    else if (currentStep === steps.length - 1) {
        nextBtn.style.display = 'none';
        registerBtn.disabled = false;
    }
});

// Gestisce il click sul pulsante "Prev"
prevBtn.addEventListener('click', function () {
    currentStep--
    registerBtn.disabled = true;

    if (currentStep === 0) {
        prevBtn.style.display = 'none'
        registerBtn.disabled = true;

    }

    updateProgressBar(prevBtn)

    steps[currentStep + 1].style.display = 'none'; // Nascondi il passo corrente
    steps[currentStep].style.display = 'block'; // Mostra il passo precedente

    nextBtn.style.display = 'block';
});

//gestione toggle password
const togglers = document.querySelectorAll('.toggler-pass');
togglers.forEach(toggler => {
    let mouseIsDown = false;
    const iconWrap = toggler.parentElement;
    const inputPass = iconWrap.querySelector('.inputPass');

    toggler.addEventListener('mousedown', function () {
        mouseIsDown = true;
        setTimeout(function () {
            if (mouseIsDown) {
                if (inputPass.type === "password") {
                    inputPass.type = "text";
                    toggler.style.color = '#b2b6ba';
                } else {
                    inputPass.type = "password";
                    toggler.style.color = ''; // Ripristina il colore predefinito
                }
            }
        }, 20);
    });

    window.addEventListener('mouseup', function () {
        mouseIsDown = false;
        if (inputPass.type === "text") {
            inputPass.type = "password";
            toggler.style.color = '#dee2e6';
        }
    });
});


//LOGICA PROGRESS BAR
const progressCircles = document.querySelectorAll('.circles');
const progressBar = document.querySelector('.indicator')

let currentProgressStep = 1

function updateProgressBar(e){
    currentProgressStep = e === nextBtn ? ++currentProgressStep : --currentProgressStep
}

