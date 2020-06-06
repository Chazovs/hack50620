<template>
    <div class="progress-block">
        <p>Ваш прогресс</p>
        <div class="progress">
            <div class="progress-bar w-75" role="progressbar" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
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
    .progress-block {
        height: 60px;
    }
</style>
