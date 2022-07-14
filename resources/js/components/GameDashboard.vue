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
                            <top-box :game="game" />
                        </v-card>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col>
                        <game-tabs />
                    </v-col>
                </v-row>
            </v-container>
        </v-main>

        <app-footer />
            
    </v-app>
</template>

<script>

import TopBox from './TopBox.vue';
import GameTabs from './GameTabs.vue';

export default {
    components: {
        'top-box': TopBox,
        'game-tabs': GameTabs,
    },

    props: ['id'],

    data() {
        return {
            game: {},
            initialized: false,
            waitInSeconds: 15,
            timer: 0,
        }
    },

    methods: {
        evaluateData() {
            if (! this.initialized || this.timer == 0) {
                this.initialized = true;
                this.timer = this.waitInSeconds;
                this.refreshData();
            } else {
                this.timer--;
            }
        },

        refreshData() {
            Event.$emit('setLoadingStatus', true);
            axios.post('/game/' + this.id).then(response => {

                console.log(response.data);

                // TODO: remove artificial delay - done for effect until actual API request is made
                setTimeout(() => {
                    Event.$emit('setLoadingStatus', false);
                }, 1000);
            });
        }
    },

    mounted() {
        this.evaluateData();
        setInterval(this.evaluateData, 1000);
    }
}
</script>
