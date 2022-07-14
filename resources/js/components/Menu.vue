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
                    @click="loadView('')"
                />
            </div>

            <div
                v-for="(league, i) in leagues"
                :key="i"
            >
                <v-btn 
                    text
                    large
                    color="secondary"
                    class="mx-2"
                    @click="loadView(league)"
                >
                    {{ league }}
                </v-btn>
            </div>
        </v-app-bar>
</template>

<script>
export default {
    data() {
        return {
            leagues: ['NBA', 'MLB']
        }
    },

    methods: {
        loadView(league) {
            window.location.replace('/' + league.toLowerCase());
        },
    },

}
</script>

<style scoped>
    .v-btn ::v-deep(.v-btn__content) {
        font-size: 1.25rem;
        font-weight: bold;
    }
</style>