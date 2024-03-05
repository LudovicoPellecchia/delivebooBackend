<script>

export default {
    props: {
        progress: Number
    },
    components: {

    },
    data() {
        return {}
    },
    methods: {

    },
}
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="progress-bar-container text-center mt-4 mb-4">
                <div class="progress-steps">
                    <span class="circle active">1</span>
                    <span class="circle" :class="{ 'active': progress === 0.5 || progress === 1 }">2</span>
                    <span class="circle" :class="{ 'active': progress === 1 }">3</span>
                    <div class="progress-bar">
                        <span :style="{width: `${progress * 100}%`}" class="indicator"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="step-name step-active">Il tuo profilo</div>
                    <div class="step-name" :class="{ 'step-active': progress === 0.5 || progress === 1 }">Il tuo ristorante</div>
                    <div class="step-name" :class="{ 'step-active': progress === 1 }">Conferma i tuoi dati</div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.progress-bar-container {
    width: 100%;

    .progress-steps {
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        position: relative;

        .circle {
            height: 50px;
            width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 4px solid rgb(240, 237, 238);
            border-radius: 50%;
            font-size: 1.4rem;
            background-color: rgb(240, 237, 238);
            transition: all 300ms ease;
            transition-delay: 0s;

        }

        .active {
            transition-delay: 200ms;
            border-color: var(--clr-primary);
        }


        .progress-bar {
            position: absolute;
            height: 4px;
            width: 100%;
            background-color: rgb(230, 225, 226);
            z-index: -1;

            .indicator {
                transition: width 1s;
                position: absolute;
                height: 100%;
                width: 0%;
                background-color: var(--clr-primary);
                transition: all 300ms ease;

            }
        }
    }
}

.step-name{
    color: rgb(230, 225, 226);
}

.step-active{
    transition: all 300ms;
    color: var(--clr-primary) !important;
}
</style>
