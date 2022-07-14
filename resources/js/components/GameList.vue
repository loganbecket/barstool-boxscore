<template>
    <v-app>
        
        <app-menu />

        <v-main> 
            <v-container class="mt-8">
                <v-row>
                    <v-col>
                        <v-card
                            tile
                            color="#eee"
                            style="border: none;"
                        >
                            <v-card-title>
                                <div class="tw-flex tw-shrink pr-4">
                                    <v-img
                                        :src="'/images/' + league + '.png'"
                                        height="50"
                                        contain
                                    />
                                </div>
                                Match-ups:    
                            </v-card-title>

                            <v-card-text>
                                <game-tile 
                                    v-for="(game, i) in games"
                                    :key="i"
                                    :game="game"
                                />
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>

        <app-footer />
            
    </v-app>
</template>

<script>
import GameTile from './GameTile.vue';

export default {
    components: {
        'game-tile': GameTile
    },
    props: ['league'],

    data() {
        return {
            games: []
        }
    },

    mounted() {
        axios.post('games', {league: this.league}).then(response => {
            this.games = response.data;
        });
    }
}
</script>
