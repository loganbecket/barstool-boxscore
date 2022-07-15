<template>
    <v-container class="pt-0">
        <v-tabs-items v-model="tab">
            <v-tab-item
                v-for="(item, i) in tabItems"
                :key="i"
            >
                <v-container v-if="tab == 0" flat class="pa-0">
                    <game-scores :game="game" />
                    <team-stats :game="game" />
                </v-container>

                <v-container v-else flat class="pa-0">
                    <player-stats :game="game" side="home" />
                    <player-stats :game="game" side="away" />
                </v-container>

            </v-tab-item>
        </v-tabs-items>
    </v-container>
</template>

<script>
    import GameScores from "./GameScores.vue"
    import PlayerStats from "./PlayerStats.vue"
    import TeamStats from "./TeamStats.vue"

    export default {
        components: {
            'game-scores': GameScores,
            'player-stats': PlayerStats,
            'team-stats': TeamStats,
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