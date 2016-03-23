@extends('base')

@section('header')
	<div class="row">
		<div class="col-md-12">
			<h2 class="thin-margin">Page Not Found</h2>
		</div>
	</div>
@stop

@section('content')

<div class="container">
	<p>&nbsp;</p>
	<h3>
		Sorry, the page you're looking for could not be found. <br> 
		Here are some links that may help:
	</h3>
	<div class="row docs-index">
		<div class="col-sm-6">
			<div class="shaded padded">
				<h3>Admin Documentation</h3>
				@include('docs/admin-sidebar')
			</div>
		</div>
		<div class="col-sm-6">
			<div class="shaded padded">
				<h3>User Documentation</h3>
				<div class="text-muted">
					Coming Soon
				</div>
			</div>
		</div>
	</div>
</div>

@stop