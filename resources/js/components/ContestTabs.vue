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
                    <contest-scores />
                </v-card>

                <v-card
                    v-else
                    flat
                >
                    <contest-stats />
                </v-card>

            </v-tab-item>
        </v-tabs-items>

    </v-container>
</template>

<script>
    import ContestScores from "./ContestScores.vue"
    import ContestStats from "./ContestStats.vue"

    export default {
        components: {
            'contest-scores': ContestScores,
            'contest-stats': ContestStats
        },

        data() {
            return {
                tab: 0,
                tabItems: ['Live Score', 'Stats'],
            }
        },

        computed: {
            content() {
                return "The selected tab is " + this.tabItems[this.tab]
            }
        },

        mounted() {
            Event.$on('setMatchTab', tab => {
                this.tab = tab;
            });
        }
    }
</script>