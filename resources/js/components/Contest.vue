<template>
     <v-app>

        <app-menu />

        <v-main>
            <v-container fluid>
                <v-row>
                    <v-col
                        class="pa-0"
                    >
                        <v-card
                            tile
                            style="border: none;"
                        >
                            <top-box />
                        </v-card>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col>
                        <contest-tabs />
                    </v-col>
                </v-row>
            </v-container>
        </v-main>

        <app-footer />

    </v-app>
</template>

<script>

import TopBox from './TopBox.vue';
import ContestTabs from './ContestTabs.vue';

export default {
    components: {
        'top-box': TopBox,
        'contest-tabs': ContestTabs,
    },

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
