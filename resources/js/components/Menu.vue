<template>
    <v-app-bar 
            app
            color="#eee"
            class="px-16"
        >
            <v-img
                src="/images/barstool_logo.png"
                contain
                height="48px"
                width="200px"
                position="left"
                class="shrink"
            />

            <div
                v-for="(sport, i) in sports"
                :key="i"
            >
                <v-btn 
                    text
                    large
                    color="secondary"
                    class="mx-2"
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

    mounted() {
        axios.post('boxscore').then(response => {
            console.log(response.data);
        });
    }
}
</script>

<style scoped>
    >>> .v-btn__content {
        font-size: 1.25rem;
        font-weight: bold;
    }
</style>