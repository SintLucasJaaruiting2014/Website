@extends('datacollector.layouts.master')

@section('title')
	Profiel aanpassen
@stop

@section('content')
	@include('datacollector.partials.header', array('title' => 'Profiel'))

	{{ Form::model($profile->toArray()) }}
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				@include('datacollector.partials.formgroup', array('type' => 'text', 'name' => 'email', 'label' => 'Persoonlijk email adres'))
			</div>
		</div>
		<div class="col-sm-6">
			@include('datacollector.partials.formgroup', array('type' => 'text', 'name' => 'location', 'label' => 'Woonplaats'))
		</div>
	</div>
	@include('datacollector.partials.formgroup', array('type' => 'text', 'name' => 'website', 'label' => 'Website'))
	@include('datacollector.partials.formgroup', array('type' => 'textarea', 'name' => 'quote', 'label' => 'Welke quote inspireerd/beschrijft jou het meest? (max 75 karakters)', 'rows' => 2, 'maxlength' => 75))
	<hr>
	<div class="form-group">
		<label class="control-label">Social Media</label>
		<div class="row">
			<div class="col-sm-3">
				<p>
					<strong>Type</strong>
				</p>
			</div>
			<div class="col-sm-9">
				<p>
					<strong>Gebruikersnaam</strong>
				</p>
			</div>
		</div>
		<div class="social-media" ng-controller="SocialMediaCtrl as ctrl">
			@for ($i = 0; $i < $socialMediaMax; $i++)
				<div class="row">
					<div class="col-sm-2">
						{{ Form::select("social_media[$i][type]", $socialMediaTypes->getSelectList(), array_get($socialMediaAccounts, $i.'.type_id'), array('class' => 'form-control', 'ng-model' => 'accounts['.$i.'].type_id')) }}
					</div>
					<div class="col-sm-4">
						{{ Form::text("social_media[$i][username]", array_get($socialMediaAccounts, $i.'.username'), array('class' => 'form-control', 'ng-model' => 'accounts['.$i.'].username')) }}
					</div>
					<div class="col-sm-6" ng-show="showPreview(accounts[{{ $i }}].type_id, accounts[{{ $i }}].username)">
						<a class="form-control-static" ng-href="{{ HTML::angular('previewUrl(accounts[' . $i .'].type_id, accounts[' . $i . '].username)') }}" target="_blank">{{ HTML::angular('previewUrl(accounts[' . $i .'].type_id, accounts[' . $i . '].username)') }}</a>
					</div>
				</div>
			@endfor
		</div>
	</div>
	<hr>

	<button type="submit" class="btn btn-primary">Opslaan</button>
	{{ Form::close() }}
@stop

@section('scripts')
	<script>
	window.types = {{ json_encode($socialMediaTypes->toArray()) }};
	window.socialMediaMax = {{ $socialMediaMax }};
	window.accounts = {{ json_encode($socialMediaAccounts) }};
	</script>
@stop
