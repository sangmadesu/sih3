<template>
	<div class="logs">
		<table class="table">
			<thead>
				<tr>
					<th>
						<span class="icon">
							<i class="fa fa-clock-o"></i>
						</span>
						Waktu (Awal/Akhir)
					</th>
					<th>
						<span class="icon">
							<i class="fa fa-database"></i>
						</span>
						Data Pengukuran (Awal/Akhir)
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{log.time_start}}</td>
					<td>{{log.measurement_start}}</td>
				</tr>
				<tr>
					<td>{{log.time_end}}</td>
					<td>{{log.measurement_end}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	
	export default {

		props: ['log'],

		mounted() {
			console.log(this.log.station_name);
		}

	}

</script>