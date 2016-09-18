@extends('base')

@section('head')
	<link rel="stylesheet" href="/libs/highlight/styles/atom-one-light.css">
	<script type="text/javascript" src="/libs/highlight/highlight.pack.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
@stop

@section('header')
	<div class="row">
		<div class="col-md-12">
			<h2 class="thin-margin">Admin Documentation</h2>
		</div>
	</div>
@stop

@section('content')

<div class="container">

	<div class="row">
		<div class="col-sm-2 sidebar">
			@include('docs/admin-sidebar')
		</div>

		<div class="col-sm-8 col-sm-offset-1 docs-content">
			{!! $html !!}

			<div class="text-center">
				<a class="edit-link" target="_blank"
					 href="https://github.com/BookStackApp/website/blob/master/resources/docs/{{ $type }}/{{ $page }}.md">
					<span class="icon small">{!! icon('edit') !!}</span>
					Edit this Page
				</a>
			</div>

		</div>
	</div>

</div>

@stop
