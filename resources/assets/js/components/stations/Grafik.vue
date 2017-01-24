<template>
	<canvas :class="'grafik-container grafik-'+index"></canvas>
</template>

<script>
	export default	{

		props: ['index','log'],

		methods: {

			initChart() {

				let grafikContainer = `.grafik-${this.index}`;

				let ctx = document.querySelector(grafikContainer);

				let times = [this.log.time_start, this.log.time_end];

				let measurements = [this.log.measurement_start, this.log.measurement_end];

				let ConfigChart = new Chart(ctx, {

					type: 'line',

					data: {
						labels: times,
						datasets: [{
							label: this.log.time_end,
							data: measurements,
							backgroundColor: '#00d1b2'
						}]
					},

					options: {
						responsive: true
					}

				})

			}

		},

		mounted() {
			this.initChart();
		}

	}
</script>

<style scoped>
	.grafik-container {
		background-color: #fff;
		color: #333;
		height: 100%;	
	}
</style>