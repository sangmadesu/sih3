<template>
        <div class="column">
            <div class="box">
                <p class="subtitle">
                    <span class="icon"><i class="fa fa-map-marker"></i></span>
                    {{station.station_name}}
                </p>
                <location :i="index" :lat="station.latitude" :lng="station.longitude"></location>
                <br>
                <logs v-for="log in logs" :log="log"></logs>
            </div>
        </div>
</template>

<script>
    import Location from './stations/Location.vue';
    import Logs from './stations/Logs.vue';

    export default {
        props: ['station', 'index'],

        data: () => ({
            logs: [],
        }),

        components: {
            Location,
            Logs,
        },

        methods: {
            getLogs() {
                axios.get(`/api/stations/${this.station.hardware_id}`)
                    .then((response) => {
                        this.logs = response.data.data;
                    });
            }
        },

        mounted() {
            this.getLogs();
        }
    };
</script>

<style scoped>
    .subtitle {
        text-transform: uppercase;
        text-align: left;
    }
</style>