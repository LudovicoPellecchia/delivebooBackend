<script>

export default {
    props: {
        items: Array,
        toggleMenu: Function,
        openMenu: Boolean
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
    <Transition name="cart">

        <div v-if="openMenu" class="cart-wrapper">

            <div class="cart-content">
                <div class="cart-heading">
                    Your Order
                </div>
                <div class="empty-cart-msg" v-if="items == ''">
                    <div>Your chart is empty. When you'll add food, you'll see them here!</div>
                </div>
                <ul role="list" v-else class="list-items">
                    <li v-for="item in items">{{ item }}</li>
                </ul>

            </div>

        </div>
    </Transition>
</template>

<style lang="scss" scoped>
.cart-enter-active {
    transform-origin: top right;
    animation: scaling ease-in 0.2s;

}

.cart-leave-active {
    transform-origin: top right;
    animation: scaling ease-in 0.2s reverse;
}

@keyframes scaling {
    0% {
        transform: scale(0);
    }

    100% {
        transform: scale(1);
    }
}



.cart-wrapper {
    z-index: 4;
    max-height: 40vh;
    width: 30vh;
    position: absolute;
    top: 100%;
    right:calc(100% - 15px);
}

.cart-content {
    
    border-radius: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    text-align: center;
    padding: 20px 22px;
    display: flex;
    flex-direction: column;
    background-color: var(--clr-bg-body);
    margin-top: 15px;
    height: 100%;
    width: 100%;
    border: 2px solid white;
}

.cart-heading {
    padding-bottom: 10px;
    border-bottom: 2px solid var(--clr-primary);
    font-weight: bold;
    font-size: larger;
}

.empty-cart-msg {
    font-size: 1rem;
    margin-top: auto;
}
</style>
