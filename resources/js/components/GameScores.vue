<template>
    <div>
        
        <div v-if="lastRefresh">Data last refreshed at {{ lastRefresh }}</div>
        <div v-else>Preparing data...</div>
        
        <v-card class="tw-mt-2" :loading="loading">
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            team_home: "Thunder",
            team_away: "Heat",
            periods: [
                { number: 1, score_home: 18, score_away: 22 },
                { number: 2, score_home: 29, score_away: 31 },
                { number: 3, score_home: 25, score_away: 19 },
                { number: 4, score_home: 20, score_away: 24 },
            ],
            periodType: "Quarter",
            lastRefresh: null
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
    },

    methods: {
        formattedDate() {
            let d = new Date();
            return d.toLocaleTimeString([], {
                year: 'numeric', 
                month: 'numeric', 
                day: 'numeric', 
                hour: 'numeric', 
                minute: '2-digit',
                second: '2-digit'
            });
        }
    },

    mounted() {
        Event.$on('setLoadingStatus', value => {
            this.loading = value;
            if (! value) {
                this.lastRefresh = this.formattedDate();
            }
        });
    }
}
</script>