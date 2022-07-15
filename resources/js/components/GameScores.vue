<template>
    <v-card class="tw-mt-2">
        <v-container class="elevation-3">
            <v-row class="tw-border-b">
                <v-col></v-col>
                
                <v-col
                    v-for="(period, i) in periods"
                    :key="i"
                >
                    {{ periodPrefix }}{{ period.number }}
                </v-col>

                <v-col>Total</v-col>
            </v-row>

            <v-row>
                <v-col class="font-weight-bold">
                    {{ away_team }}
                </v-col>

                <v-col
                    v-for="(period, i) in periods"
                    :key="i"
                >
                    {{ period.away_score }}
                </v-col>

                <v-col class="font-weight-bold">{{ total_away }}</v-col>
            </v-row>

            <v-row>
                <v-col class="font-weight-bold">
                    {{ home_team }}
                </v-col>
                
                <v-col
                    v-for="(period, i) in periods"
                    :key="i"
                >
                    {{ period.home_score }}
                </v-col>

                <v-col class="font-weight-bold">{{ total_home }}</v-col>
            </v-row>

        </v-container>
        <pre>{{ game }}</pre>
    </v-card>
</template>

<script>
export default {
    props: ['game'],

    computed: {

        home_team() {
            if (this.game) {
                return this.game.home_team.last_name;
            }
            return null;
        },

        away_team() {
            if (this.game) {
                return this.game.away_team.last_name;
            }
            return null;
        },

        periodPrefix() {
            if (this.game.league.toLowerCase() == "nba") {
                return "Q";
            }
            return "";
        },

        periods() {
            let score = [];

            if (this.game) {
                this.game.score.forEach(e => {
                    score.push({
                        number: e.period,
                        home_score: e.home_score,
                        away_score: e.away_score
                    })
                });
            }

            return score;
        },

        total_home() {
            return this.periods.reduce((accumulator, object) => {
                return accumulator + object.home_score;
            }, 0);
        },

        total_away() {
            return this.periods.reduce((accumulator, object) => {
                return accumulator + object.away_score;
            }, 0);
        },
    },

}
</script>