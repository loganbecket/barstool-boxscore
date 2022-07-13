<template>
    <v-container>
        <div>Seconds until next refresh: {{ countdown }}</div>
    </v-container>
</template>

<script>

export default {
    data() {
        return {
            data: {},
            secondsToWait: 15,
            countdown: 15,
            timer: 0,
        }
    },

    watch: {
        countdown() {
            this.refreshData();
        }
    },

    methods: {
        step() {
            this.countdown--;
        },

        refreshData() {
            if (this.countdown == 0) {
                this.countdown = 15;
                console.log('This is when we query');
            }
        }
    },

    mounted() {
        this.step();
        this.timer = setInterval(this.step, 1000);
    }
}
</script>
