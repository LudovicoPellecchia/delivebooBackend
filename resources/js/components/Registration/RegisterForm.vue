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
                    name: '',
                    surname: '',
                    email: '',
                    password: '',
                    confirmPassword: ''
                },
                secondStep: {
                    restaurantName: '',
                    restaurantPhoto: '',
                    restaurantAddress: '',
                    restaurantCategories: []
                }
            },
            IsFirstStepValidated: false,
            IsSecondStepValidated: false




        }
    },
    methods: {
        submitForm() {

        }
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
                            <div class="first-Step">
                                <h3>Your Profile</h3>


                                <div class="input-field">
                                    <label for="name">Name</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>

                                        <input v-model="formData.firstStep.name" id="name" type="text" class="form-control "
                                            name="name" autocomplete="name" autofocus>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <label for="surname">Surname</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>
                                        <input v-model="formData.firstStep.surname" id="surname" type="text"
                                            class="form-control " name="surname" autocomplete="surname" autofocus>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <label for="email">E-Mail</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>
                                        <input v-model="formData.firstStep.email" id="email" type="text"
                                            class="form-control " name="email" autocomplete="email" autofocus>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <label for="password">Password</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>
                                        <input v-model="formData.firstStep.password" id="password" type="password"
                                            class="form-control " name="password" autocomplete="password" autofocus>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <label for="password-confirm">Confirm Password</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>
                                        <input v-model="formData.firstStep.confirmPassword" id="password-confirm"
                                            type="password" class="form-control" name="password-confirm"
                                            autocomplete="password-confirm" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div v-if="IsFirstStepValidated" class="second-step">
                                <h3>Your Restaurant</h3>


                                <div class="input-field">
                                    <label for="restaurant_name">Name</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>
                                        <input id="restaurant_name" type="text" class="form-control " name="restaurant_name"
                                            autocomplete="restaurant_name" autofocus>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <label for="restaurant_photo">Photo</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>
                                        <input id="restaurant_photo" type="file" class="form-control "
                                            name="restaurant_photo" autocomplete="restaurant_photo" autofocus>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <label for="restaurant_address">Address</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>
                                        <input id="restaurant_address" type="text" class="form-control "
                                            name="restaurant_address" autocomplete="restaurant_address" autofocus>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <label for="restaurant_tel">Telephone</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>
                                        <input id="restaurant_tel" type="text" class="form-control " name="restaurant_tel"
                                            autocomplete="restaurant_tel" autofocus>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <label for="typologies">Categories</label>
                                    <div>
                                        <div class="client-error-msg name-error"></div>
                                        <input id="typologies" type="text" class="form-control " name="typologies"
                                            autocomplete="typologies" autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="btns-wrapper">

                                <div class="prev-arrow">
                                    <div class="prev-step">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </div>
                                </div>

                                <div class="next-arrow">

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

    .input-field {
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

    i{
        cursor: pointer;
        font-size: 2rem;

        &:hover{
            border-bottom: 2px solid black;    
        }
    }
}
</style>
