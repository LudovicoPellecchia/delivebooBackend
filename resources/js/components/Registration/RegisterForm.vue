<script>
import { store, getTypologiesFromApi } from '../../store'
import ProgressBar from './ProgressBar.vue';

export default {
    props: {
    },
    components: {
        ProgressBar
    },
    data() {
        return {
            store,
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
                            minLength: 6,
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
                        value: null,
                        file: null,
                        label: 'Photo',
                        validated: false,
                        errorMessage: 'La foto deve essere in formato JPEG, PNG o GIF',
                        validations: {
                            required: true,
                            fileType: ['jpeg', 'png', 'jpg'],
                            regex: /\.(jpeg|jpg|png)$/i
                        }
                    },
                    restaurantAddress: {
                        value: '',
                        label: 'Address',
                        validated: false,
                        errorMessage: 'L\'indirizzo del ristorante non può essere vuoto',
                        validations: {
                            required: true,
                            minLength: 3
                        }
                    },
                    restaurantTelephone: {
                        value: '',
                        label: 'Telephone',
                        validated: false,
                        errorMessage: 'Il numero di telefono non può essere vuoto',
                        validations: {
                            required: true,
                            regex: /^\d{10}$/
                        }
                    },
                    restaurantPiva: {
                        value: '',
                        label: 'P.Iva',
                        validated: false,
                        errorMessage: 'Il numero di P.iva non può essere vuoto e deve contenere 11 cifre',
                        validations: {
                            required: true,
                            regex: /^\d{11}$/
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
            currentField: null,
            currentStep: 0,

            progress: 0,
            imgPreview: null

        }
    },
    methods: {

        validateField(fieldName, step) {
            // Recupero il campo
            const field = this.formData[step][fieldName];

            // Aggiorno una variabile di stato con il campo validato per mostrarne il messaggio di errore personalizzato
            this.currentField = field;

            // Valore input utente
            const value = field.value;

            const regex = field.validations.regex;
            const isPatternValid = regex ? regex.test(value) : true;

            const minLength = field.validations.minLength;
            const isLengthValid = minLength ? value.length >= minLength : true;

            // Controllo sull'uguaglianza tra confirmPassword e password solo se il campo è 'confirmPassword'
            if (fieldName === 'confirmPassword') {
                const password = this.formData.firstStep['password'].value;
                const isConfirmValid = value === password;
                field.validated = isConfirmValid;
            }
            else {
                if (!isPatternValid || !isLengthValid) {
                    field.validated = false;
                } else {
                    field.validated = true;
                }
            }
        },

        handleImgFile(event) {
            const file = event.target.files[0];
            if (file) {
                this.formData.secondStep.restaurantPhoto.value = file.name
                this.formData.secondStep.restaurantPhoto.file = file
                this.validateField('restaurantPhoto', 'secondStep')
                if ( !this.formData.secondStep.restaurantPhoto.validated){
                    this.imgPreview = null
                    return
                }
                

                const reader = new FileReader();
                reader.onload = () => {
                    // Leggi il contenuto dell'immagine come URL
                    this.imgPreview = reader.result;
                }
                reader.readAsDataURL(file);
            }
        },



        validateStep(step) {
            // Inizializza IsFirstStepValidated a true
            if (this.currentStep === 0) {
                this.IsFirstStepValidated = true;
            }
            if (this.currentStep === 1) {
                this.IsSecondStepValidated = true
            }

            // Cicla su tutti i campi della prima fase
            for (let fieldName in this.formData[step]) {
                const field = this.formData[step][fieldName];

                // Se un campo non è validato, imposta IsFirstStepValidated a false e interrompi il ciclo
                if (!field.validated) {
                    if (this.currentStep === 0) {
                        this.IsFirstStepValidated = false;
                        this.currentField = field
                        return; // Esci dalla funzione in quanto almeno un campo non è valido

                    }
                    if (this.currentStep === 1) {
                        this.IsSecondStepValidated = false
                        this.currentField = field
                        return; // Esci dalla funzione in quanto almeno un campo non è valido

                    }
                }
            }
        },


        nextStep() {
            if (this.currentStep === 0) {
                this.validateStep('firstStep')
                if (this.IsFirstStepValidated) {
                    this.stepTransitioning
                    this.currentStep++

                    this.progress += 0.5
                }
                return
            }

            if (this.currentStep === 1) {
                this.validateStep('secondStep')
                if (this.IsSecondStepValidated) {
                    this.stepTransitioning
                    this.currentStep++
                    this.progress += 0.5
                }
            }

        },

        prevStep() {
            this.currentStep--
            this.IsFirstStepValidated = false
            this.IsSecondStepValidated = false
            this.progress -= 0.5

        },

        submitForm() {

        },
    },
    computed: {

    },
    mounted() {
        getTypologiesFromApi()
    }
}
</script>

<template>
    <ProgressBar :progress="progress"></ProgressBar>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="row no-gutters">
                    <div :class="currentStep != 2 ? 'col-7' : 'col-12'">
                        <form action="#" class="form-sct" method="post" @submit.prevent="submitForm"
                            enctype="multipart/form-data">


                            <!-- FIRST STEP -->
                            <div v-if="currentStep === 0" class="first-Step">
                                <h3>Your Profile</h3>

                                <div v-for="(field, fieldName) in formData.firstStep" :key="fieldName"
                                    class="input-wrapper">
                                    <div>
                                        <label :for="fieldName">{{ field.label }}</label>

                                        <input @blur="validateField(fieldName, 'firstStep')" v-model="field.value"
                                            :id="fieldName"
                                            :type="fieldName === 'password' || fieldName === 'confirmPassword' ? 'password' : 'text'"
                                            class="form-control" :name="fieldName" :autocomplete="fieldName">

                                        <div v-if="field === currentField && !field.validated" class="client-error-msg">
                                            {{ field.errorMessage }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- SECOND STEP -->
                            <div v-if="currentStep === 1" class="second-step">
                                <h3>Your Restaurant</h3>
                                <div v-for="(field, fieldName) in formData.secondStep" :key="fieldName"
                                    class="input-wrapper">

                                    <div>
                                        <label :for="fieldName">{{ field.label }}</label>

                                        <div v-if="fieldName === 'restaurantCategories'" class="categories-container">
                                            <div class="category-wrapper" v-for="(category, index) in store.typologies"
                                                :key="index">
                                                <input @blur="validateField(fieldName, 'secondStep')" type="checkbox"
                                                    :id="'category_' + index" :value="category.name"
                                                    v-model="field.value">
                                                <label :for="'category_' + index">{{ category.name }}</label>
                                            </div>
                                        </div>
                                        <div v-else-if="fieldName === 'restaurantPhoto'">
                                            <input @blur="validateField(fieldName, 'secondStep')" :id="fieldName"
                                                type="file" @change="handleImgFile" class="form-control"
                                                :name="fieldName" :autocomplete="fieldName">
                                        </div>
                                        <div v-else>
                                            <input @blur="validateField(fieldName, 'secondStep')" v-model="field.value"
                                                :id="fieldName"
                                                :type="fieldName === 'restaurantTelephone' || fieldName === 'restaurantPiva' ? 'number' : 'text'"
                                                class="form-control" :name="fieldName" :autocomplete="fieldName">
                                        </div>

                                        <div v-if="field === currentField && !field.validated" class="client-error-msg">
                                            {{ field.errorMessage }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- THIRD STEP Confirmation Data -->
                            <div v-if="currentStep === 2" class="row row-cols-2 third-step">
                                <div class="col">
                                    <div class="profile-data">
                                        <h3 class="text-center">Your profile</h3>
                                        <div class="confirmation-wrapper"
                                            v-for="(field, fieldName) in formData.firstStep">
                                            <div class="label"
                                                v-if="fieldName != 'password' & fieldName != 'confirmPassword'">
                                                {{ field.label }}:
                                            </div>
                                            <span v-if="fieldName != 'password' & fieldName != 'confirmPassword'"
                                                class="confirmation-data"> {{ field.value
                                                }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="restaurant-data">
                                        <h3 class="text-center">Your Restaurant</h3>
                                        <div class="confirmation-wrapper"
                                            v-for="(field, fieldName) in formData.secondStep">
                                            <div class="label"> {{ field.label }}:
                                            </div>
                                            <span v-if="fieldName === 'restaurantPhoto'"> <img :src="imgPreview"
                                                    alt=""></span>
                                            <span v-else-if="fieldName === 'restaurantCategories'">
                                                <div v-for="category in field.value">{{ category }}</div>
                                            </span>
                                            <span v-else class="confirmation-data">
                                                {{ field.value }}
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BUTTONS -->
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



                    <!-- COL IMAGES -->
                    <div class="col-5" v-if="currentStep != 2">
                        <div class="form-images">
                            <div class="first-step-img" v-if="currentStep === 0">
                                <img src="/assets/DrawKit-cooking-kitchen-food-vector-illustrations-03.svg" alt="">
                            </div>
                            <div class="second-step-imgs" v-if="currentStep === 1">
                                <div class="scd-step-img">
                                </div>
                                <div class="scd-step-img" :class="{ 'preview-shadow': imgPreview }"
                                    :style="imgPreview ? { 'background-image': `url(${imgPreview})` } : null">
                                </div>
                                <div class="scd-step-img">
                                </div>
                            </div>
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

    height: 100%;
}

.first-step-img {
    height: 100%;
    overflow: hidden;
    border-radius: 30px;


    img {
        position: relative;
        top: -20px;
        height: 110%;
        object-fit: cover;
        overflow: hidden;

    }

}

.second-step-imgs {
    display: flex;
    flex-direction: column;
    height: 100%;
    gap: 20px;

    >div {
        flex-grow: 1;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .preview-shadow {
        border-radius: 30px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    div:nth-child(1) {
        transform: scale(0.8);
        background-image: url('/assets/DrawKit-cooking-kitchen-food-vector-illustrations-10.svg');
    }

    div:nth-child(2) {
        border-radius: 30px;

    }

    div:nth-child(3) {
        /*         border-bottom-right-radius: 30px;
 */
        transform: scale(0.8);

        background-image: url('/assets/DrawKit-cooking-kitchen-food-vector-illustrations-15.svg');

    }

}

.confirmation-wrapper {
    display: flex;

    .label {
        flex-basis: 25%;
        font-weight: bold;
        padding-bottom: 20px;

        span {
            font-weight: 400;
        }
    }
}




.categories-container {
    display: flex;
    flex-wrap: wrap;

    .category-wrapper {
        flex-basis: 50%;
    }
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
