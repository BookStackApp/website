@extends('base')

@section('header')
	<div class="row">
		<div class="col-md-12">
			<h2 class="thin-margin">Documentation</h2>
		</div>
	</div>
@stop

@section('content')

<div class="container">
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