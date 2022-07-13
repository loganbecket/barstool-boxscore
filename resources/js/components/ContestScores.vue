<template>
    <v-card class="p-2">
        <v-container class="elevation-3">
            <v-row class="border-bottom">
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
                    {{ team_home }}
                </v-col>
                
                <v-col
                    v-for="(period, i) in periods"
                    :key="i"
                >
                    {{ period.score_home }}
                </v-col>

                <v-col class="font-weight-bold">{{ total_home }}</v-col>
            </v-row>

            <v-row>
                <v-col class="font-weight-bold">
                    {{ team_away }}
                </v-col>

                <v-col
                    v-for="(period, i) in periods"
                    :key="i"
                >
                    {{ period.score_away }}
                </v-col>

                <v-col class="font-weight-bold">{{ total_away }}</v-col>
            </v-row>
        </v-container>
    </v-card>
</template>

<script>
export default {
    data() {
        return {
            team_home: "Thunder",
            team_away: "Heat",
            periods: [
                { number: 1, score_home: 18, score_away: 22 },
                { number: 2, score_home: 29, score_away: 31 },
                { number: 3, score_home: 25, score_away: 19 },
                { number: 4, score_home: 20, score_away: 24 },
            ],
            periodType: "Inning"
        }
    },

    computed: {
        periodPrefix() {
            if (this.periodType == "Quarter") {
                return "Q";
            }
            return "";
        },

        total_home() {
            return this.periods.reduce((accumulator, object) => {
                return accumulator + object.score_home;
            }, 0);
        },

        total_away() {
            return this.periods.reduce((accumulator, object) => {
                return accumulator + object.score_away;
            }, 0);
        },
    }
}
</script>