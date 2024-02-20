<script>

export default {
    components: {

    },
    data() {
        return {
            isOpen: false
        }
    },
    methods: {
        toggleMenu() {
            this.isOpen = !this.isOpen
        }
    },
}
</script>

<template>
    <div class="menu">
        <div @click="toggleMenu()">
            <span :class="{ 'openmenu': isOpen }" class="line-1"></span>
            <span :class="{ 'openmenu': isOpen }" class="line-2"></span>
            <span :class="{ 'openmenu': isOpen }" class="line-3"></span>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.menu {
    align-self: center;
    cursor: pointer;

    div {
        padding: 10px;
        width: 30px;
        height: 30px;
        position: relative;
    }

    span {
        background: var(--clr-bg-body);
        width: 100%;
        height: 4px;
        border-radius: 5px;
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: transform 0.5s, width 0.5s;
    }

    .line-1 {
        transform: translate(-50%, -10px);
    }

    .line-2 {
        transform: translate(-50%, 6px);
    }

    
}

.openmenu.line-1 {
    transform: translate(-50%, -50%) rotate(-45deg) !important;
}

.openmenu.line-2 {
    transform: translate(-50%, -50%) rotate(45deg)!important;
}

.openmenu.line-3 {
    width: 0!important;
}
</style>
