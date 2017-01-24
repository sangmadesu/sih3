<template>
	<div class="container">
		<div class="columns">
			<station 
				v-for="(station, i) in stations" 
				:station="station"
				:index="i"
			></station>
		</div>
	</div>
</template>

<script>

	import Station from './Station.vue';

	export default {

		data() {
			return {
				stations: [],
			}
		},

		methods: {

			/**
			* fetch data
			*/
			getStations() {
				axios.get('/api/stations')
					.then((response) => {
						this.stations = response.data;
					});
			}, 

		},

		created() {
			this.getStations();
		},

		components: {
			Station,
		}
	}
</script>