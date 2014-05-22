@extends('datacollector.layouts.master')

@section('title')
	Filters kiezen
@stop

@section('content')
	@include('datacollector.partials.header', array('title' => 'Filters'))

	{{ Form::open() }}
	<div class="row">
	@foreach($filters as $filter)
		<div class="col-sm-4 col-md-3">
			<div class="form-group">
				<label class="form-label">{{ $filter->label }}</label>
				@foreach($filter->options as $option)
					@if($filter->multiple_choice)
					<div class="checkbox">
						<label>
							<input type="checkbox" name="filteroption[{{ $filter->id }}][]" value="{{ $option->id }}" {{ in_array($option->id, $properties) ? 'checked' : '' }}> {{ $option->value }}
						</label>
					</div>
					@else
					<div class="radio">
						<label>
							<input type="radio" name="filteroption[{{ $filter->id }}]" value="{{ $option->id }}" {{ in_array($option->id, $properties) ? 'checked' : '' }}> {{ $option->value }}
						</label>
					</div>
					@endif
				@endforeach
			</div>
		</div>
	@endforeach
	</div>

	<button type="submit" class="btn btn-primary">Opslaan</button>
	{{ Form::close() }}
@stop
