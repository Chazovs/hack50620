<template>
    <div class="progress-block">
        <p>Ваш прогресс: 75%</p>
        <div class="progress">
            <div class="progress-bar bg-info w-75" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Progress",
        data() {
            return {
                progress: 20,
            }
        }
    }
</script>

<style scoped>
    .progress {
        width: 60%;
    }
    .progress-bar {
        background-color: linear-gradient(358.82deg, #81D5EE 54.51%, #00FF3B 99.04%), #32D74B;
    }
    .progress-block {
        color: white;
        height: 70px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        background-color: #273EC3;;
        padding: 10px;
    }
</style>
