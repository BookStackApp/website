@extends('base')

@section('header')
	<div class="row">
		<div class="col-md-12">
			<h2 class="thin-margin">Admin Documentation</h2>
		</div>
	</div>
@stop

@section('content')

<div class="container">
	
	<div class="col-sm-2 sidebar">
		@include('docs/admin-sidebar')
	</div>

	<div class="col-sm-8 col-sm-offset-1 docs-content">
		<a class="float right edit-link" target="_blank"
		   href="https://github.com/ssddanbrown/BookStack-Site/blob/master/resources/docs/{{ $type }}/{{ $page }}.md">
			<span class="icon small">{!! icon('edit') !!}</span>
			Edit page
		</a>
		{!! $html !!}
	</div>

</div>

@stop