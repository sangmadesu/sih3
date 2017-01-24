<template>
	<div class="container">
		<station 
			v-for="(station, i) in stations" 
			:station="station"
			:index="i"
		></station>
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