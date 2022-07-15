<template>
        <v-card class="tw-mt-8" flat>
        <v-container class="elevation-3">
            <v-row class="tw-border-b">
                <v-col>
                    <v-data-table
                        :headers="headers"
                        :items="stats"
                        :options="{ 'itemsPerPage': -1 }"
                        hide-default-footer
                    >
                        <template v-slot:header.stat>
                            <v-img
                                :src="'/images/' + league + '.png'"
                                contain
                                position="left"
                                max-height="40"
                                max-width="100"
                            />
                        </template>
                    </v-data-table>
                </v-col>
            </v-row>
        </v-container>
    </v-card>
</template>

<script>
export default {
    props: ['game'],

    computed: {
        headers(){
            let home = 'Home';
            let away = 'Away';

            if (this.game) {
                home = this.game.home_team.first_name;
                away = this.game.away_team.first_name;
            }

            return [
                { text: '', value: 'stat', sortable: false },
                { text: away, value: 'away', sortable: false },
                { text: home, value: 'home', sortable: false },
            ];
        },

        stats() {
            if (this.game) {
                let data = [];
                this.game.home_team_stats.forEach((e, i) => {
                    const invalidFields = [
                        'home_errors',
                        'away_errors',
                        'home_hit',
                        'away_hit',
                    ];
                    
                    if (! invalidFields.includes(e.stat)) {
                        data.push({
                            stat: this.scrubName(e.stat),
                            away: this.game.away_team_stats[i].value,
                            home: e.value
                        });
                    }
                });
                return data;
            }

            return [{stat: null, home: null, away: null}];
        },

        league() {
            if (this.game) {
                return this.game.league;
            }
            return 'placeholder';
        }
    },

    methods: {
        scrubName(name) {
            let words = name.split('_');

            for (let i = 0; i < words.length; i++) {
                words[i] = words[i][0].toUpperCase() + words[i].substr(1);
            }
            return words.join(' ');
        }
    }

}
</script>