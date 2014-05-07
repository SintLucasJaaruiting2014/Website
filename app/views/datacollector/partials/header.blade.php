<div class="page-header">
	<h1>{{ $title }}</h1>
	@if(isset($lead))
	<p class="lead">{{ $lead }}</p>
	@endif
</div>
@if(Session::has('error'))
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('error') }}
	</div>
@endif
@if (Session::has('status'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{ Session::get('status') }}
</div>
@endif
