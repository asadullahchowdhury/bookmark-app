<template>
    <div class="preloader">
        <div class="loading">
            <svg class="orange">
                <g fill="none">
                    <rect x="2" y="2" width="50" height="50"/>
                </g>
            </svg>
            <svg class="grey">
                <g fill="none">
                    <rect x="5" y="5" width="44" height="44" stroke="#ccc" stroke-width="2"/>
                </g>
            </svg>
        </div>
    </div>
</template>

<script>
export default {
    setup() {
        return {}
    }
}
</script>

<style lang="scss" scoped>
.preloader {
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100vh;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    &.hide{
        transform: scale(0);
        transform-origin: center;
        opacity: 0;
        visibility: hidden;
        transition: 1s ease;
    }

    .loading {
        width: 54px;
        height: 54px;
        position: relative;
        transform: rotate(15deg);
        transition: all .3s ease;
        scale: 2;

        .orange {
            position: absolute;
            stroke-width: 4;
            stroke: #ff9933;
            stroke-dasharray: 20, 180;
            animation: dash 1s linear infinite;
        }


    }
}

@keyframes dash {
    0% {
        stroke-dashoffset: 0;
    }
    100% {
        stroke-dashoffset: -200;
    }
}

</style>
