@extends('datacollector.layouts.master')

@section('title')
	Overzicht
@stop

@section('content')

	<div class="jumbotron">
		<div class="pull-right">
			{{ Form::open(array('action' => 'auth.controller@logout', 'method' => 'delete')) }}
				<button type="submit" class="btn btn-danger">Uitloggen</button>
			{{ Form::close() }}
		</div>
		<h1>Jaaruiting data inname</h1>
		<p>Op deze website kun je alle data ingeven voor het jaaruiting. Ook hebben we een aantal vragen en filters die jullie mogen invullen.</p>
		<p>Wij verzoeken je om dit formulier voor 9 mei in te vullen.</p>
	</div>

	<div ng-controller="IndexCtrl">
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="{{ action('datacollector.controller@showProfile') }}" class="btn btn-primary btn-xs pull-right">Invullen</a>
						<h3 class="panel-title">Profiel</h3>
					</div>
					<ul class="list-group">
						<li class="list-group-item">
							<h4 class="list-group-item-heading">Naam</h4>
							<p class="list-group-item-text">{{ $profile->first_name }} {{ $profile->last_name_prefix }} {{ $profile->last_name }}</p>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-heading">Opleiding</h4>
							<p class="list-group-item-text">{{ $program->name }} in {{ $location->name }}</p>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-heading">Email school</h4>
							<p class="list-group-item-text">{{ $user->email }}</p>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-heading">Email persoonlijk</h4>
							<p class="list-group-item-text">{{ $profile->email or 'Je hebt nog geen persoonlijk email adres opgegeven.' }}</p>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-heading">Website</h4>
							<p class="list-group-item-text">
							@if($profile->website)
								<a href="{{ $profile->website }}" target="_blank">{{ $profile->website }}</a>
							@else
								Je hebt nog geen website opgegeven.
							@endif
							</p>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-heading">Woonplaats</h4>
							<p class="list-group-item-text">{{ $profile->location or 'Je hebt nog geen locatie opgegeven.' }}</p>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-heading">Welke quote inspireerd/beschrijft jou het meest?</h4>
							<p class="list-group-item-text">{{ $profile->quote or 'Je hebt nog geen quote opgegeven.' }}</p>
						</li>
						<li class="list-group-item">
							<h4 class="list-group-item-heading">Social Media</h4>
							<p class="list-group-item-text">
							@if(count($socialMediaAccounts) > 0)
								<ul class="list-inline">
								@foreach($socialMediaAccounts as $account)
									<li>
										@include('datacollector.social_media_icon')
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
			@if($program->type_id == 1)
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="{{ action('datacollector.controller@showQuestions') }}" class="btn btn-primary btn-xs pull-right">Invullen</a>
						<h3 class="panel-title">Vragen</h3>
					</div>
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
						<div class="panel-body">
							<p>Je hebt nog geen vragen beantwoord.</p>
						</div>
					@endif
				</div>
			</div>
			@endif
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="{{ action('datacollector.controller@showFilters') }}" class="btn btn-primary btn-xs pull-right">Invullen</a>
						<h3 class="panel-title">Filters</h3>
					</div>
					@if(count($properties) > 0)
						<ul class="list-group">
							@foreach($filters as $filter)
								<li class="list-group-item">
									<h4 class="list-group-item-heading">{{ $filter->label }}</h4>
									<p class="list-group-item-text">
									@if($options = $properties->getByFilterId($filter->id))
										{{ $options->implode('value', ', ') }}
									@else
										-
									@endif
									</p>
								</li>
							@endforeach
						</ul>
					@else
						<div class="panel-body">
							<p>Je hebt nog geen filters ingevuld.</p>
						</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="{{ action('datacollector.controller@showCreatePortfolioItem') }}" class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-plus"></span> Nieuw item</a>
						<h3 class="panel-title">Portfolio</h3>
					</div>
					<div class="panel-body">
						@if($portfolioItems->count() > 0)
							@foreach($portfolioTypes as $type)
								<div class="row">
									<div class="col-xs-12">
										<h4>{{ $type->name }}</h4>
									</div>
									@foreach ($portfolioItems as $item)

										@if($item->type_id == $type->id)
											<div class="col-sm-4 col-xs-6 portfolio-item">
												<div class="delete-item">
													{{ Form::open(array('method' => 'delete', 'action' => array('datacollector.controller@deletePortfolioItem', $item->id))) }}
														<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
													{{ Form::close() }}
												</div>
												@include('datacollector.partials.portfolio.'.$item->media->type, array('item' => $item))
											</div>
										@endif
									@endforeach
								</div>
							@endforeach
						@else
							<p>Je hebt nog geen portfolio items toegevoegd.</p>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading" id="preview">
				<h3 class="panel-title">Item preview</h3>
			</div>
			<div class="panel-body">
				<img ng-src="{{ HTML::angular('previewImage') }}" class="img-responsive img-rounded" ng-show="previewImage != null" >
				<p ng-show="previewImage == null">
					Klik op een van de portfolio items voor een preview.
				</p>
			</div>
		</div>

	</div>

@stop

@section('scripts')
	<style>
		.portfolio-item {
			position: relative;
			padding-top: 15px;
			padding-bottom: 15px;
		}

		.delete-item {
			right: 0;
			position: absolute;
		}
	</style>
@stop
