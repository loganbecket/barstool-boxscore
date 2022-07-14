<template>
    <v-container>
        <v-row class="pt-4">
            <v-col 
                class="my-auto"
            >
                <div class="tw-flex tw-justify-around">
                    <v-img
                        :src="'/images/' + logo_home"
                        max-height="150px"
                        max-width="150px"
                        contain
                    />

                    <div class="primary--text my-auto tw-text-4xl tw-font-bold">
                        92
                    </div>
                </div>
                
            </v-col>
            
            
            <v-col class="tw-flex tw-justify-around pb-0">
                <div
                    class="flex-column my-auto mb-0"
                >
                    <div class="text-center tw-text-2xl tw-py-2">{{ gameStatus.toUpperCase() }}</div>
                    <div class="text-center">
                        {{ team_away }} @ {{ team_home }}
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
                        96
                    </div>
                    <v-img
                        :src="'/images/' + logo_away"
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
            tabItems: ['Score', 'Stats'],
            team_home: "Miami Heat",
            team_away: "Oklahoma City Thunder",
            logo_home: "thunder.png",
            logo_away: "heat.png",
            dateTime: "2012-06-21T18:00:00-07:00",
            gameStatus: "Final"
        }
    },

    computed: {
        gameDate() {
            let d = new Date(this.dateTime);
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
        setTab(tab) {
            Event.$emit('setBoxscoreTab', tab);
        }
    },

}
</script>
