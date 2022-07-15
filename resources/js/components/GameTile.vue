<template>
    <v-card 
        class="my-2 tw-cursor-pointer"
        @click="openContest()"
    >
        <v-dialog
            v-model="dialog"
            width="500"
        >
            <v-card>
                <v-card-title>
                    <v-icon color="warning">mdi-alert</v-icon>
                    <span class="pl-2">Hold up!</span>
                </v-card-title>
                <div class="tw-px-6 tw-text-xl">
                    A feed for this game isn't available.
                </div>
                <v-card-actions>
                    <v-spacer />
                    <v-btn
                        text
                        color="primary"
                        @click="dialog = false"
                    >
                        Close
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-container>
            <v-row>
                <v-col cols="3">
                    <v-img 
                        :src="'/images/' + game.away_logo"
                        max-height="75px"
                        contain
                    />
                </v-col>

                <v-col cols="6" align-self="center">
                    <div>
                        <div class="tw-text-center tw-text-2xl tw-font-bold primary--text">
                            {{ awayTeam }} @ {{ homeTeam }}
                        </div>
                        <div class="tw-text-center">
                            {{ gameTime }} - {{ game.venue }}
                        </div>
                    </div>
                </v-col>

                <v-col cols="3">
                    <v-img 
                        :src="'/images/' + game.home_logo"
                        max-height="75px"
                        contain
                    />
                </v-col>
            </v-row>
        </v-container>
    </v-card>
</template>

<script>
export default {
    props: ['game'],

    data() {
        return {
            dialog: false
        }
    },

    computed: {

        homeTeam() {
            let home = this.game.home_team;
            return home.first_name + " " + home.last_name;
        },

        awayTeam() {
            let away = this.game.away_team; 
            return away.first_name + " " + away.last_name;
        },

        gameTime() {
            let d = new Date(this.game.start_date_time);
            return d.toLocaleTimeString([], {
                year: 'numeric', 
                month: 'numeric', 
                day: 'numeric', 
                hour: 'numeric', 
                minute: '2-digit'
            });
        }
    },

    methods: {
        openContest() {
            if (this.game.feed) {
                // This would normally use the feed to identify the matchup, but this component
                // is just for show and so I've hard-coded the endpoint based on the league
                window.location.replace('/boxscore/' + this.game.id);
            } else {
                this.dialog = true;
            }
        }
    }
}
</script>