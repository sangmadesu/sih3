<template>
    <!-- columns -->
    <div class="columns">
        <!-- column -->
        <div class="column is-8" v-show="showChart">
            <div class="box is-blue">
                <div class="panel-title">
                    <span class="icon is-blue">
                        <i class="fa fa-line-chart"></i>
                    </span>
                    &nbsp;
                    {{station.station_name}}
                    &nbsp;
                    <button 
                        class="delete" 
                        @click="showChart = false"
                    ></button>
                </div>
                <div class="content">
                    <grafik
                         v-for="log in logs" 
                        :index="index"
                        :log="log" 
                     >       
                     </grafik>
                </div>       
            </div>
        </div>
        <!-- end column -->
       <!-- column -->
        <div class="column is-5">
            <!-- box -->
            <div class="box is-blue">
                <!-- panel title -->
                <div class="panel-title">
                    <span class="icon is-blue">
                        <i class="fa fa-wifi"></i>
                    </span>
                    &nbsp;
                    {{station.station_name}}
                </div>
                <!-- end panel title -->
                <!-- level -->
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <button 
                                class="button is-outlined" 
                                @click="isActive = true"
                            >
                                <span class="icon">
                                    <i class="fa fa-table"></i>
                                </span>
                            </button>
                        </div>
                        <div class="level-item">
                            <button 
                                class="button is-outlined"
                                @click="showChart = true"
                            >
                                <span class="icon">
                                    <i class="fa fa-line-chart"></i>
                                </span>
                            </button>
                        </div>
                        <div class="level-item">
                            <button 
                                class="button is-outlined" 
                                @click="showMap = true"
                            >
                                <span class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                            </button>
                        </div>
                        <div class="level-item">
                            <button class="button is-outlined">
                                <span class="icon">
                                    <i class="fa fa-download"></i>
                                </span>
                            </button>
                        </div>   
                    </div>
                </nav>
                <!-- end level --> 
            </div>
            <!-- end box -->

            <!-- box -->
            <div class="box is-blue" v-show="showMap">
                <!-- level -->
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <span class="icon is-blue">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            {{station.latitude}} {{station.longitude}}
                            &nbsp;
                            <button 
                                class="delete" 
                                @click="showMap = false"
                            ></button>
                        </div>
                    </div>
                </nav>
                <!-- end level -->
                
                <!-- location -->
                <location 
                    :i="index" 
                    :lat="station.latitude" 
                    :lng="station.longitude"
                ></location>
                <!-- end location -->

            </div>
            <!-- end box -->

            <!-- modal --> 
            <div class="modal" :class="{ 'is-active': isActive }">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">{{station.station_name}}</p>
                        <button class="delete" @click="isActive = false"></button>
                    </header>
                    <section class="modal-card-body">
                        <!-- logs -->
                        <logs v-for="log in logs" :log="log"></logs>
                        <!-- end logs -->
                    </section>
                </div>
            </div>
            <!-- end modal -->
        </div>
        <!-- end column -->
    </div>
    <!-- end columns -->
</template>

<script>

    import Location from './stations/Location.vue';
    import Logs from './stations/Logs.vue';
    import Grafik from './stations/Grafik.vue';

    export default {

        props: ['station', 'index'],

        data: () => ({
            logs: [],
            isActive: false,
            showMap: true,
            showChart: true
        }),

        components: {
            Location,
            Logs,
            Grafik
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