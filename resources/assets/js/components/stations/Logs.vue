<template>
	<table class="table is-bordered">
		<thead>
			<tr>
				<th>measurement time</th>
				<th>measurement sample</th>
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
</template>

<script>
	
	export default {

		props: ['log'],

	}

</script>