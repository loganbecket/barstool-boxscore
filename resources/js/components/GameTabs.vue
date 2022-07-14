<template>
    <v-container>
        
        <v-tabs-items v-model="tab">
            <v-tab-item
                v-for="(item, i) in tabItems"
                :key="i"
            >
                <v-card
                    v-if="tab == 0"
                    flat
                >
                    <game-scores />
                </v-card>

                <v-card
                    v-else
                    flat
                >
                    <game-stats />
                </v-card>

            </v-tab-item>
        </v-tabs-items>

    </v-container>
</template>

<script>
    import GameScores from "./GameScores.vue"
    import GameStats from "./GameStats.vue"

    export default {
        components: {
            'game-scores': GameScores,
            'game-stats': GameStats
        },

        data() {
            return {
                tab: 0,
                tabItems: ['Score', 'Stats'],
            }
        },

        mounted() {
            Event.$on('setBoxscoreTab', tab => {
                this.tab = tab;
            });
        }
    }
</script>