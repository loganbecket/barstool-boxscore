<template>
    <v-container class="pt-0">
        <v-tabs-items v-model="tab">
            <v-tab-item
                v-for="(item, i) in tabItems"
                :key="i"
            >
                <v-card v-if="tab == 0" flat>
                    <game-scores :game="game" />
                </v-card>

                <v-card v-else flat>
                    <game-stats :game="game" />
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

        props: ['game'],

        data() {
            return {
                tab: 0,
                tabItems: ['Teams', 'Players'],
            }
        },

        mounted() {
            Event.$on('setBoxscoreTab', tab => {
                this.tab = tab;
            });
        }
    }
</script>