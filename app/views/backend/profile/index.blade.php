@extends('backend.layouts.master')

@section('content')
	@include('backend.partials.header', array('title' => 'Profielen'))

	<table class="table">
		<thead>
			<tr>
				<th>Voornaam</th>
				<th></th>
				<th>Achternaam</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@foreach($items as $item)
			<tr>
				<td>{{ $item->first_name }}</td>
				<td>{{ $item->last_name_prefix }}</td>
				<td>{{ $item->last_name }}</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
		@endforeach
	</table>
@stop
