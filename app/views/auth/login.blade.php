<div class="row">
	<div class="col-sm-6">
		{{ Form::open(array('action' => 'AuthController@login', 'method' => 'post')) }}
			<div class="form-group">
				<label for="student_id" class="control-label">Stamnummer</label>
				<input type="text" id="student_id" name="student_id" class="form-control">
			</div>
			<div class="form-group">
				<label for="password" class="control-label">Wachtwoord</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			<hr>
			<button type="submit" class="btn btn-primary">Inloggen</button>
			<a href="#" class="btn btn-default">Wachtwoord vergeten</a>
		{{ Form::close() }}
	</div>
	<div class="col-sm-6">
		<h2>Nog geen wachtwoord?</h2>
		<p>Als dit de eerste keer is dat je inlogt dien je een wachtwoord reset link aan te vragen via de 'Wachtwoord vergeten' optie.</p>
	</div>
</div>
