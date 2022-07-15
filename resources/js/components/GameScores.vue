<template>
    <v-card class="tw-mt-2" flat>
        <v-container class="elevation-3">
            <v-row class="tw-border-b">
                <v-col  cols="2"></v-col>
                
                <v-col
                    v-for="(period, i) in periods"
                    :key="i"
                >
                    {{ periodPrefix }}{{ period.number }}
                </v-col>

                <v-col v-if="league == 'mlb'">
                    <div class="tw-flex tw-justify-around">
                        <div>R</div>
                        <div>H</div>
                        <div>E</div>
                    </div>
                </v-col>
                <v-col v-else>Total</v-col>
            </v-row>

            <v-row>
                <v-col class="font-weight-bold" cols="2">
                    {{ away_team }}
                </v-col>

                <v-col
                    v-for="(period, i) in periods"
                    :key="i"
                >
                    {{ period.away_score }}
                </v-col>

                <v-col 
                    v-if="league == 'mlb'"
                    class="font-weight-bold"
                >
                    <div class="tw-flex tw-justify-around">
                        <div>{{ total_away }}</div>
                        <div>{{ away_hits }}</div>
                        <div>{{ away_errors }}</div>
                    </div>
                </v-col>
                <v-col v-else class="font-weight-bold">{{ total_away }}</v-col>
            </v-row>

            <v-row>
                <v-col class="font-weight-bold" cols="2">
                    {{ home_team }}
                </v-col>
                
                <v-col
                    v-for="(period, i) in periods"
                    :key="i"
                >
                    {{ period.home_score }}
                </v-col>

                <v-col 
                    v-if="league == 'mlb'"
                    class="font-weight-bold"
                >
                    <div class="tw-flex tw-justify-around">
                        <div>{{ total_home }}</div>
                        <div>{{ home_hits }}</div>
                        <div>{{ home_errors }}</div>
                    </div>
                </v-col>
                <v-col v-else class="font-weight-bold">{{ total_home }}</v-col>
            </v-row>
        </v-container>
    </v-card>
</template>

<script>
export default {
    props: ['game'],

    computed: {

        league() {
            if (this.game) {
                return this.game.league.toLowerCase();
            }
            return 'nba';
        },

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
            if (this.league == "nba") {
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

        home_errors() {
            let home = this.game.home_team_stats;
            let index = Object.keys(home).find(key => home[key].stat == "home_errors");
            return home[index].value;
        },

        away_errors() {
            let away = this.game.away_team_stats;
            let index = Object.keys(away).find(key => away[key].stat == "away_errors");
            return away[index].value;
        },

        home_hits() {
            let home = this.game.home_team_stats;
            let index = Object.keys(home).find(key => home[key].stat == "hits");
            return home[index].value;
        },

        away_hits() {
            let away = this.game.away_team_stats;
            let index = Object.keys(away).find(key => away[key].stat == "hits");
            return away[index].value;
        }
    },


}
</script>