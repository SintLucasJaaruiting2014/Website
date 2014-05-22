@extends('auth.layouts.master')

@section('content')
	@include('auth.partials.header', array('title' => 'Wachtwoord reset'))

	<div class="row">
		<div class="col-sm-6">
			{{ Form::open(array('action' => 'auth.controller@passwordReset', 'method' => 'post')) }}
				<input type="hidden" name="token" value="{{ $token }}">
				<div class="form-group">
					<label for="student_id" class="control-label">Stamnummer</label>
					<input type="text" id="student_id" name="student_id" class="form-control">
				</div>
				<div class="form-group">
					<label for="password" class="control-label">Wachtwoord</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label for="password_confirmation" class="control-label">Wachtwoord herhalen</label>
					<input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Wachtwoord resetten</button>
				<a href="{{ action('auth.controller@showLogin') }}" class="btn btn-default">Inloggen</a>
			{{ Form::close() }}
		</div>
		<div class="col-sm-6">
			<h2>Vul het formulier in</h2>
			<p>Vul je stamnummer in en vul daarna 2x je nieuwe wachtwoord in.</p>
		</div>
	</div>
@stop
