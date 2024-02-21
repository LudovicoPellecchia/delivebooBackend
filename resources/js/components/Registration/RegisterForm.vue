<script>

export default {
    props: {
    },
    components: {

    },
    data() {
        return {
            formData: {
                firstStep: {
                    name: {
                        value: '',
                        label: 'Name',
                        validated: false,
                        errorMessage: 'Il nome non può essere vuoto e deve contenere solo lettere',
                        validations: {
                            minLength: 3,
                            required: true,
                            regex: /^[a-zA-Z]+$/
                        }
                    },
                    surname: {
                        value: '',
                        label: 'Surname',
                        validated: false,
                        errorMessage: 'Il cognome non può essere vuoto e deve contenere solo lettere',
                        validations: {
                            minLength: 3,
                            required: true,
                            regex: /^[a-zA-Z]+$/
                        }
                    },
                    email: {
                        value: '',
                        label: 'E-Mail',
                        validated: false,
                        errorMessage: 'L\'email non può essere vuota e deve avere un formato valido',
                        validations: {
                            required: true,
                            regex: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
                        }
                    },
                    password: {
                        value: '',
                        label: 'Password',
                        validated: false,
                        errorMessage: 'La password non può essere vuota e deve avere almeno 6 caratteri',
                        validations: {
                            required: true,
                            minLength: 6
                        }
                    },
                    confirmPassword: {
                        value: '',
                        label: 'Confirm Password',
                        validated: false,
                        errorMessage: 'La conferma deve essere uguale alla password',
                        validations: {
                            required: true,
                        }
                    }
                },
                secondStep: {
                    restaurantName: {
                        value: '',
                        label: 'Name',
                        validated: false,
                        errorMessage: 'Il nome del ristorante non può essere vuoto e deve contenere solo lettere e numeri',
                        validations: {
                            required: true,
                            regex: /^[a-zA-Z0-9\s]+$/
                        }
                    },
                    restaurantPhoto: {
                        value: '',
                        label: 'Photo',
                        validated: false,
                        errorMessage: 'La foto deve essere in formato JPEG, PNG o GIF',
                        validations: {
                            required: true,
                            fileType: ['jpeg', 'png', 'gif']
                        }
                    },
                    restaurantAddress: {
                        value: '',
                        label: 'Address',
                        validated: false,
                        errorMessage: 'L\'indirizzo del ristorante non può essere vuoto',
                        validations: {
                            required: true
                        }
                    },
                    restaurantCategories: {
                        value: [],
                        label: 'Categories',
                        validated: false,
                        errorMessage: 'Seleziona almeno una categoria per il ristorante',
                        validations: {
                            required: true,
                            minLength: 1
                        }
                    }
                }
            },

            IsFirstStepValidated: false,
            IsSecondStepValidated: false,
            currentField: [],
            currentStep: 0



        }
    },
    methods: {
        validateField(fieldName) {

            //recupero il campo 
            const field = this.formData.firstStep[fieldName];
            //aggiorno una variabile di stato con il campo validato per mostrarne il msg di errore personalizzato
            this.currentField = field
            //valore input utente
            const value = field.value;

            const regex = field.validations.regex;
            const isPatternValid = regex ? regex.test(value) : true;

            const minLength = field.validations.minLength;
            const isLengthValid = minLength ? value.length >= minLength : true;


            if (!isPatternValid || !isLengthValid) {
                field.validated = false;
            } else {
                field.validated = true;
            }


        },

        validateFirstStep() {
            // Inizializza IsFirstStepValidated a true
            this.IsFirstStepValidated = true;
            
            // Cicla su tutti i campi della prima fase
            for (let fieldName in this.formData.firstStep) {
                const field = this.formData.firstStep[fieldName];

                // Se un campo non è validato, imposta IsFirstStepValidated a false e interrompi il ciclo
                if (!field.validated) {
                    this.IsFirstStepValidated = false;
                    this.currentField.push(field)
                    return; // Esci dalla funzione in quanto almeno un campo non è valido
                }
            }
        },


        nextStep() {
            this.validateFirstStep()
            if (this.IsFirstStepValidated) {
                this.currentStep++
            }
        },

        prevStep() {
            this.currentStep--
            this.IsFirstStepValidated = false
        },

        submitForm() {

        },
    },
}
</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row no-gutters">
                    <div class="col-7">
                        <form action="#" class="form-sct" @submit.prevent="submitForm" enctype="multipart/form-data">

                            <div v-if="currentStep === 0" class="first-Step">
                                <h3>Your Profile</h3>

                                <div v-for="(field, fieldName) in formData.firstStep" :key="fieldName" class="input-wrapper">
                                    <div>
                                        <label :for="fieldName">{{ field.label }}</label>
                                        <input @blur="validateField(fieldName)" v-model="field.value" :id="fieldName"
                                            :type="fieldName === 'password' || fieldName === 'confirmPassword' ? 'password' : 'text'"
                                            class="form-control" :name="fieldName" :autocomplete="fieldName">
                                        <div v-if="field === currentField[0] && !field.validated" class="client-error-msg">{{
                                            field.errorMessage }}</div>
                                    </div>
                                </div>
                            </div>

                            <div v-if="IsFirstStepValidated" class="second-step">
                                <h3>Your Restaurant</h3>
                                <div v-for="(field, fieldName) in formData.secondStep" :key="fieldName" class="input-wrapper">
                                    <label :for="fieldName">{{ fieldName }}</label>
                                    <div>
                                        <div class="client-error-msg"></div>
                                        <input v-model="field.value" :id="fieldName" :type="fieldName === 'restaurantPhoto' || fieldName === 'restaurantCategories' ?
                                            (fieldName === 'restaurantPhoto' ? 'file' : 'checkbox') : 'text'"
                                            class="form-control" :name="fieldName" :autocomplete="fieldName">
                                    </div>
                                </div>
                            </div>

                            <div class="btns-wrapper">

                                <div v-if="currentStep >= 1" @click="prevStep()" class="prev-arrow">
                                    <div class="prev-step">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </div>
                                </div>

                                <div v-if="currentStep < 2" @click="nextStep()" class="next-arrow">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-5">
                        <div class="form-images">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<style lang="scss" scoped>
.col-7 {
    padding-right: 0;
}

.col-5 {
    border-bottom-right-radius: 30px;
    border-top-right-radius: 30px;
    background-color: white;
    padding: 0;
}

.form-sct {
    padding: 40px;
    border-bottom-left-radius: 30px;
    border-top-left-radius: 30px;
    background-color: white;


    h3 {
        padding-bottom: 30px;
    }

    .input-wrapper {
        padding: 0 15px;
        padding-bottom: 15px;

        label {
            padding-left: 5px;

        }
    }
}

.form-images {
    border-radius: 30px;
    background-position: center;
    background-image: url('/assets/DrawKit-cooking-kitchen-food-vector-illustrations-03.svg');
    background-size: 300%;
    height: 100%;
}


.btns-wrapper {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;

    i {
        cursor: pointer;
        font-size: 2rem;

        &:hover {
            border-bottom: 2px solid black;
        }
    }

    .next-arrow {
        margin-left: auto;
    }
}
</style>
