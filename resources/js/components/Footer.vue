<template>
    <div>
        <v-footer
            app
            color="#eee"
        >   
                <v-container 
                    fluid 
                    class="px-16"
                >
                    <v-row>
                        <v-col class="my-auto">
                            <div class="vuetify_gray--text text-sm">
                                © {{ year }} Jupiter Media Solutions, LLC
                            </div>
                        </v-col>

                        <v-col>
                            <div class="text-end">
                                <div class="flex shrink">
                                    <v-btn 
                                        icon
                                        class="px-2"
                                        href="https://github.com/loganbecket/barstool-boxscore"
                                    >
                                        <v-icon>mdi-github</v-icon>
                                    </v-btn>

                                    <v-btn 
                                        icon
                                        class="px-2"
                                        href="https://www.linkedin.com/company/jupiter-media-solutions/"
                                    >
                                        <v-icon>mdi-linkedin</v-icon>
                                    </v-btn>
                                    
                                    <v-btn 
                                        icon
                                        class="px-2"
                                        href="https://www.instagram.com/plan_jupiter/"
                                    >
                                        <v-icon>mdi-instagram</v-icon>
                                    </v-btn>
                                    
                                    <v-btn 
                                        icon
                                        class="px-2"
                                        href="https://twitter.com/JupiterMediaSo1"
                                    >
                                        <v-icon>mdi-twitter</v-icon>
                                    </v-btn>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
        </v-footer>
    </div>
</template>

<script>
export default {
    computed: {
        year() {
            return new Date().getFullYear();
        },
    }
}
</script>
