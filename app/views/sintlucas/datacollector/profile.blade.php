@extends('sintlucas.datacollector.layout')

@section('content')

	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Profiel</h3>
				</div>
				<ul class="list-group">
					<li class="list-group-item">
						<h4 class="list-group-item-heading">Naam</h4>
						<p class="list-group-item-text">{{ $profile->first_name }} {{ $profile->last_name_prefix }} {{ $profile->last_name }}</p>
					</li>
					<li class="list-group-item">
						<h4 class="list-group-item-heading">Opleiding</h4>
						<p class="list-group-item-text">{{ $program->name }} in {{ $program->location->name }}</p>
					</li>
					<li class="list-group-item">
						<h4 class="list-group-item-heading">Email school</h4>
						<p class="list-group-item-text">{{ $user->school_email }}</p>
					</li>
					<li class="list-group-item">
						<h4 class="list-group-item-heading">Email persoonlijk</h4>
						<p class="list-group-item-text">{{ $user->personal_email or 'Je hebt nog geen persoonlijk email adres opgegeven.' }}</p>
					</li>
					<li class="list-group-item">
						<h4 class="list-group-item-heading">Social Media</h4>
						<p class="list-group-item-text">
						@if(count($socialMediaAccounts) > 0)
							<ul class="list-inline">
							@foreach($socialMediaAccounts as $account)
								<li>
									@include('sintlucas.datacollector.social_media_icon')
								</li>
							@endforeach
							</ul>
						@else
							<p>Je hebt nog geen social media account toegevoegd.</p>
						@endif
						</p>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Vragen</h3>
				</div>
				<div class="panel-body">
					@if(count($answers) > 0)
						<ul class="list-group">
							@foreach($answers as $answer)
								<li class="list-group-item">
									<h4 class="list-group-item-heading">{{ $answer->question->label }}</h4>
									<p class="list-group-item-text">{{ $answer->value }}</p>
								</li>
							@endforeach
						</ul>
					@else
						<p>Je hebt nog geen vragen beantwoord.</p>
					@endif
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Filters</h3>
				</div>
				<div class="panel-body">
					@if(count($properties) > 0)
						<ul class="list-group">
							@foreach($properties as $property)
								<li class="list-group-item">
									<h4 class="list-group-item-heading">{{ $property->label }}</h4>
									<p class="list-group-item-text">{{ $property->value }}</p>
								</li>
							@endforeach
						</ul>
					@else
						<p>Je hebt nog geen filters ingevuld.</p>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Portfolio</h3>
				</div>
				<div class="panel-body">
					@if(count($portfolioItems) > 0)
						<ul class="list-group">
							@foreach($portfolioItems as $item)
								<li class="list-group-item">
									<h4 class="list-group-item-heading">{{ $item->name }}</h4>
									<p class="list-group-item-text"></p>
								</li>
							@endforeach
						</ul>
					@else
						<p>Je hebt nog geen portfolio items toegevoegd.</p>
					@endif
				</div>
			</div>
		</div>
	</div>

@stop
