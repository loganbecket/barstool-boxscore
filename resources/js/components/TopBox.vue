<template>
    <v-container>
        <v-row class="pt-4">
            <v-col 
                class="my-auto"
            >
                <div class="d-flex justify-content-around">
                    <v-img
                        :src="'/images/' + logo_home"
                        max-height="150px"
                        max-width="150px"
                        contain
                    />

                    <h1 class="primary--text my-auto">
                        92
                    </h1>
                </div>
                
            </v-col>
            
            
            <v-col class="d-flex justify-content-around pb-0">
                <div
                    class="flex-column my-auto mb-0"
                >
                    <h5 class="text-center">{{ gameStatus.toUpperCase() }}</h5>
                    <p class="text-center">
                        {{ team_away }} @ {{ team_home }}
                    </p>
                    <p class="text-center">
                        {{ eventDate }}
                    </p>
                
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
                <div class="d-flex justify-content-around">
                    <h1 class="primary--text my-auto">
                        96
                    </h1>
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
    data() {
        return {
            tab: 0,
            tabItems: ['Live Score', 'Stats'],
            team_home: "Miami Heat",
            team_away: "Oklahoma City Thunder",
            logo_home: "thunder.png",
            logo_away: "heat.png",
            dateTime: "2012-06-21T18:00:00-07:00",
            gameStatus: "Final"
        }
    },

    computed: {
        eventDate() {
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
            Event.$emit('setMatchTab', tab);
        }
    },

    mounted() {
        // query data
    }
}
</script>
