@extends('layouts.body')
@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">{{ ucfirst($title) }}</h6>
			</div>
			<div class="card-body">
				<form role="form" class="form-horizontal" method="POST" action="{{ url($resource) }}" enctype="multipart/form-data">
					@if($item->id) {{ method_field('PATCH') }} @endif
					{{ csrf_field() }}

					@include('components.input', [
						'name' => 'first_name',
						'label' => 'Nombre',
						'edit' => $item->first_name,
						'required' => true
					])

					@include('components.input', [
						'name' => 'last_name',
						'label' => 'Apellido',
						'edit' => $item->last_name,
						'required' => true
					])

					@include('components.input', [
						'name' => 'email',
						'label' => 'E-Mail',
						'edit' => $item->email,
						'type' => 'email',
						'required' => true
					])

					@if(!$item->id)
						@include('components.input', [
							'name' => 'password',
							'label' => 'Contraseña:',
							'edit' => $item->password,
							'type' => 'password',
							'required' => true
						])

						@include('components.input', [
							'name' => 'password_confirmation',
							'label' => 'Confirmar contraseña:',
							'edit' => $item->password,
							'type' => 'password',
							'required' => true
						])
					@endif

					<div class="row form-group">
						<div class="pull-xs-left col-md-6">
							<a href="#" onclick="window.history.go(-1); return false;" class="btn btn-outline btn-primary">
								<i class="fa fa-fw fa-arrow-left"></i>&nbsp;Volver
							</a>
						</div>
						<div class="col-md-6">
							<button type="submit" class="btn btn-primary"><span class="fa fa-save fa-fw"></span> {{ $submit }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
@endsection