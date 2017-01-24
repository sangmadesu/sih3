<template>
	<div :class="'map-container map-'+i"></div>
</template>

<script>
	export default {

		props: ['i', 'stationName', 'lat', 'lng'],

		methods: {

			initMap() {
				
				var latlang = { lat: parseFloat(this.lat), lng: parseFloat(this.lng) };

				const mapContainer = `.map-${this.i}`;

				console.log(mapContainer);

				var map = new google.maps.Map(document.querySelector(mapContainer), {
					zoom: 8,
					center: latlang
				});

				var marker = new google.maps.Marker({
					position: latlang,
					map: map
				});

				marker.addListener('click', () => {
					map.setZoom(12);
				})

			},

		},

		mounted() {
			this.initMap();
		}

	}
</script>

<style scoped>
	.map-container {
		height: 200px;
		width: 100%;
	}
</style>