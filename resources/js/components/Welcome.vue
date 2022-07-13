<template>
    <v-app>
        <app-menu />

        <v-main>        
            <v-container class="pt-12">
                <v-row>
                    <v-col>
                        <div class="tw-text-2xl">
                            Welcome to Jupiter Media Solutions' implementation of the Barstool Sports Boxscore Challenge!
                        </div>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col>
                        This application does the following:
                    </v-col>
                </v-row>

                <v-row>
                    <v-col>
                        <ul class="tw-list-disc">
                            <li>Makes API calls at a <em>maximum</em> of every 15 seconds to the provided data feeds</li>
                            <li>Parses and persists the results to a MySql database</li>
                            <li>Implements Vue components that are dynamic, scalable, and reusable</li>
                            <li>Uses a Laravel back-end, primarily for ease of interaction with the database</li>
                            <li>Is hosted on-premises and encrypted with SSL/TLS</li>
                            <li>Can be easily deployed elsewhere by following the instructions in the <a class="secondary--text" href="https://github.com/loganbecket/barstool-boxscore">repo's README</a></li>
                        </ul>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col>
                        <div class="tw-flex tw-shrink">
                            <a href="https://www.planjupiter.com">
                                <v-img
                                    src="/images/jupiter_logo.svg"
                                    max-width="200px"
                                />
                            </a>
                        </div>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>

        <app-footer />
        
    </v-app>
</template>

<script>
export default {
    
}
</script>

<style scoped>
    li {
        padding-bottom: 1rem;
    }
</style>