@extends('layouts.body')
@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- 404 Error Text -->
		<div class="text-center">
			<div class="error mx-auto" data-text="404">404</div>
			<p class="lead text-gray-800 mb-5">Página no encontrada</p>
			<a href="#" onclick="window.history.go(-1); return false;" >&larr; Volver</a>
		</div>
	</div>
	<!-- /.container-fluid -->
@endsection