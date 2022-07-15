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
                        <refresh-bar :loading="loading" />
                        <game-tabs :game="game" />
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
import RefreshBar from './RefreshBar.vue';

export default {
    components: {
        'top-box': TopBox,
        'game-tabs': GameTabs,
        'refresh-bar': RefreshBar,
    },

    props: ['id'],

    data() {
        return {
            loading: false,
            game: null,
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
            this.loading = true;
            axios.post('/game/' + this.id).then(response => {
                this.game = response.data;
                this.loading = false;
            });
        }
    },

    mounted() {
        this.evaluateData();
        setInterval(this.evaluateData, 1000);
    }
}
</script>
