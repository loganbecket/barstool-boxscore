<template>
    <v-card class="tw-my-4" flat>
        <v-container class="elevation-3">
            <v-row class="tw-border-b">
                <v-col>
                    <div class="tw-text-xl tw-font-bold">{{ teamName }}</div>
                    <v-data-table
                        v-if="game"
                        :headers="headers"
                        :items="stats"
                        :options="{ 'itemsPerPage': 5 }"
                    >
                    </v-data-table>
                </v-col>
            </v-row>
        </v-container>
    </v-card>
</template>

<script>
export default {
    props: ['game', 'side'],

    computed: {
        headers(){
            let fields = [];
            if (this.game) {
                let raw = this.game[this.side + '_player_stats'][0];
                let keys = Object.keys(JSON.parse(raw.stat_object));
                keys.forEach(field => {
                    fields.push({
                        text: this.scrubName(field),
                        value: field
                    });
                });
            }
            return fields;
        },

        stats() {
            let data = [];
            if (this.game) {
                let raw = this.game[this.side + '_player_stats'];

                raw.forEach(player => {
                    // TODO: rearrange elements to put player name at front
                    let stats = JSON.parse(player.stat_object)
                    data.push(stats);
                })
            }
            return data;
        },

        teamName() {
            let team = ""
            if (this.game) {
                let first = this.game[this.side + "_team"].first_name;
                let last = this.game[this.side + "_team"].last_name;
                team = first + " " + last;
            }
            return team;
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
    },


}
</script>