<template>
    <v-app-bar 
            app
            color="#eee"
            class="px-16"
        >
            <div class="tw-flex tw-shrink pr-8">
                <v-img
                    src="/images/barstool_logo.png"
                    contain
                    height="48px"
                    position="left"
                    class="tw-cursor-pointer"
                    @click="returnHome()"
                />
            </div>

            <div
                v-for="(sport, i) in sports"
                :key="i"
            >
                <v-btn 
                    text
                    large
                    color="secondary"
                    class="mx-2"
                    @click="loadSport(sport)"
                >
                    {{ sport }}
                </v-btn>
            </div>
        </v-app-bar>
</template>

<script>
export default {
    data() {
        return {
            sports: ['NBA', 'MLB']
        }
    },

    methods: {
        loadSport(sport) {
            window.location.replace("/contest/" + sport.toLowerCase());
        },

        returnHome() {
            window.location.replace("/");
        }
    },

}
</script>

<style scoped>
    .v-btn ::v-deep(.v-btn__content) {
        font-size: 1.25rem;
        font-weight: bold;
    }
</style>