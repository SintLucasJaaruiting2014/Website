<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	{{ Form::label($name, $label, array('class' => 'control-label')) }}
	@include('datacollector.partials.form.' . $type)
	@if($errors->has($name))
	<p class="help-block">
		<ul class="list-unstyled">
			@foreach($errors->get($name) as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</p>
	@endif
</div>
