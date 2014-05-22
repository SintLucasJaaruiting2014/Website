@extends('datacollector.layouts.master')

@section('title')
	Vragen beantwoorden
@stop

@section('content')
	@include('datacollector.partials.header', array('title' => 'Vragen'))

	{{ Form::open(array('ng-controller' => 'QuestionsCtrl')) }}
	@for($i = 0; $i < $questionMax; $i++)
		<div class="form-group">
			{{ Form::select("question[$i][question]", $questions, array_get($answers, $i.'.question_id'), array('class' => 'form-control')) }}
			<br>
			<textarea ng-model="answers[{{ $i }}].value" class="form-control" name="question[{{ $i }}][answer]" maxlength="450" rows="6"></textarea>
			{{ HTML::angular("getCount(answers[$i].value)") }}/450
		</div>
		<hr>
	@endfor

	<button type="submit" class="btn btn-primary">Opslaan</button>
	{{ Form::close() }}
@stop

@section('scripts')
	<script>

	window.answers = {{ json_encode($answers) }};
	window.questionMax = {{ $questionMax }};

	</script>
@stop
