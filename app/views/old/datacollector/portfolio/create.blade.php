@extends('datacollector.layouts.master')

@section('title')
	Nieuw portfolio item
@stop

@section('content')
	@include('datacollector.partials.header', array('title' => 'Portfolio item toevoegen'))

	<div ng-controller="PortfolioItemCtrl">
		{{ Form::model($item, array('action' => $action, 'files' => true)) }}
			<div class="form-group">
				{{ Form::label('portfolio[type]', 'Item type', array('class' => 'control-label')) }}
				{{ Form::select('portfolio[type]', $types->lists('name', 'id'), 1, array('class' => 'form-control', 'ng-model' => 'portfolioType')) }}
			</div>
			<div class="form-group" ng-show="showMediaType(typeVisibile(portfolioType, 'video'), typeVisibile(portfolioType, 'image'))">
				<label>Media type</label>
				<div class="row">
					<div class="col-sm-6">
						<div class="radio">
							<label><input type="radio" value="image" name="media[type]" checked> Image</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="radio">
							<label><input type="radio" value="video" name="media[type]"> Video</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6" ng-show="typeVisibile(portfolioType, 'image')">
					@include('datacollector.partials.formgroup', array('type' => 'file', 'name' => 'media[image]', 'label' => 'Afbeelding'))
					<p class="help-block">De afbeelding moet minimaal {{ HTML::angular('getWidth(portfolioType)') }}x{{ HTML::angular('getHeight(portfolioType)') }} pixels zijn.</p>
				</div>
				<div class="col-sm-6" ng-show="typeVisibile(portfolioType, 'video')">
					@include('datacollector.partials.formgroup', array('type' => 'text', 'name' => 'media[video]', 'label' => 'Video (Youtube of Vimeo)'))
				</div>
			</div>
			<hr>
			<button type="submit" class="btn btn-primary">Item toevoegen</button>
		{{ Form::close() }}
	</div>

@stop

@section('scripts')
	<script>
	window.portfolioConfig = {{ json_encode($portfolioConfig) }};
	</script>
@stop
