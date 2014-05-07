@extends('auth.layouts.master')

@section('content')
	@include('auth.partials.header', array('title' => 'Wachtwoord vergeten'))
	<div class="row">
		<div class="col-sm-6">
			{{ Form::open(array('action' => 'auth.controller@sendReminder', 'method' => 'post')) }}
				<div class="form-group">
					<label for="student_id" class="control-label">Stamnummer</label>
					<input type="text" id="student_id" name="student_id" class="form-control">
				</div>
				<hr>
				<button type="submit" class="btn btn-primary">Aanvragen</button>
				<a href="{{ action('auth.controller@showLogin') }}" class="btn btn-default">Inloggen</a>
			{{ Form::close() }}
		</div>
		<div class="col-sm-6">
			<h2>Vul je stamnummer in</h2>
			<p>Na het aanvragen krijg je van ons een email met daarin een link om je wachtwoord te resetten.</p>
		</div>
	</div>
@stop
