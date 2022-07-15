<template>
    <v-container>
        <v-row>
            <v-col class="pb-0">
                <div v-if="lastRefresh">Data last refreshed at {{ lastRefresh }}</div>
                <div v-else>Preparing data...</div>

                <div style="height:10px;">
                    <v-progress-linear 
                        v-if="loading"
                        indeterminate 
                        color="success" 
                        background-color="white"
                    />
                </div>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    props: ['loading'],

    data() {
        return {
            lastRefresh: null,
        }
    },

    watch: {
        loading: function () {
            if (this.loading) {
                this.lastRefresh = this.formattedDate(); 
            }
        }
    },

    methods: {
        formattedDate() {
            let d = new Date();
            return d.toLocaleTimeString([], {
                year: 'numeric', 
                month: 'numeric', 
                day: 'numeric', 
                hour: 'numeric', 
                minute: '2-digit',
                second: '2-digit'
            });
        }
    }
}
</script>
