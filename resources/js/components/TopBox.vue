<template>
    <v-container>
        <v-row class="pt-4">
            <v-col 
                class="my-auto"
            >
                <div class="tw-flex tw-justify-around">
                    <v-img
                        :src="'/images/' + logo_away"
                        max-height="150px"
                        max-width="150px"
                        contain
                    />

                    <div class="primary--text my-auto tw-text-4xl tw-font-bold">
                        {{ away_score }}
                    </div>
                </div>
                
            </v-col>
            
            
            <v-col class="tw-flex tw-justify-around pb-0">
                <div
                    class="flex-column my-auto mb-0"
                >
                    <div class="text-center tw-text-2xl tw-py-2">{{ gameStatus }}</div>
                    <div class="text-center">
                        {{ away_team }} @ {{ home_team }}
                    </div>
                    <div class="text-center">
                        {{ gameDate }}
                    </div>
                
                    <v-tabs
                        v-model="tab"
                        background-color="transparent"
                        color="secondary"
                        centered
                        @change="setTab(tab)"
                    >
                        <v-tab
                            v-for="(item, i) in tabItems"
                            :key="i"
                        >
                            {{ item }}
                        </v-tab>
                    </v-tabs>
                </div>

            </v-col>

            <v-col 
                class="my-auto"
            >
                <div class="tw-flex tw-justify-around">
                    <div class="primary--text my-auto tw-text-4xl tw-font-bold">
                        {{ home_score }}
                    </div>
                    <v-img
                        :src="'/images/' + logo_home"
                        max-height="150px"
                        max-width="150px"
                        contain
                    />
                </div>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>

export default {
    props: ['game'],
    
    data() {
        return {
            tab: 0,
            tabItems: ['Teams', 'Players'],
        }
    },

    computed: {
        
        dateTime() {
            if (this.game) {
                return this.game.start_date_time;
            }
            return null
        },

        home_team() {
            if (this.game) {
                return this.game.home_team.first_name + ' ' + this.game.home_team.last_name;
            }
            return null;
        },

        away_team() {
            if (this.game) {
                return this.game.away_team.first_name + ' ' + this.game.away_team.last_name;
            }
            return null;
        },

        logo_home() {
            if (this.game) {
                return this.game.home_team.last_name.toLowerCase() + '.png';
            }
            return "placeholder.png";
        },

        logo_away() {
            if (this.game) {
                return this.game.away_team.last_name.toLowerCase() + '.png';
            }
            return "placeholder.png";
        },

        home_score() {
            if (this.game) {
                let score = this.game.score;
                return score.map(item => item.home_score).reduce((prev, next) => prev + next);
            }
            return 0;
        },

        away_score() {
            if (this.game) {
                let score = this.game.score;
                return score.map(item => item.away_score).reduce((prev, next) => prev + next);
            }
            return 0;
        },

        gameDate() {
            let d = new Date(this.dateTime);
            return d.toLocaleTimeString([], {
                year: 'numeric', 
                month: 'numeric', 
                day: 'numeric', 
                hour: 'numeric', 
                minute: '2-digit'
            });
        },

        gameStatus() {
            if (this.game) {
                if (this.game.status == 'completed') {
                    return 'FINAL';
                }

                let now = new Date();
                let start = new Date(this.game.start_date_time);
                if (this.game.status != 'completed' && now > start) {
                    return 'LIVE'
                }
            }
            return "";
        } 
    },

    methods: {
        setTab(tab) {
            Event.$emit('setBoxscoreTab', tab);
        }
    },

}
</script>
