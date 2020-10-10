@extends('layouts.body')
@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Cambiar contraseña</h6>
			</div>
			@if(Session::has('error'))
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					{{  Session::get('error')  }}
				</div>
			@endif
			<div class="card-body">
				<form role="form" class="form-horizontal" method="POST" action="{{ url('passwords') }}">
					{{ csrf_field() }}

					@include('components.input', [
						'name' => 'current_password',
						'label' => 'Contraseña actual:',
						'type' => 'password',
						'required' => true
					])

					@include('components.input', [
						'name' => 'password',
						'label' => 'Contraseña nueva:',
						'type' => 'password',
						'required' => true
					])

					@include('components.input', [
						'name' => 'password_confirmation',
						'label' => 'Confirmar nueva contraseña:',
						'type' => 'password',
						'required' => true
					])

					<div class="row form-group">
						<div class="pull-xs-left col-md-6">
							<a href="#" onclick="window.history.go(-1); return false;" class="btn btn-outline btn-primary">
								<i class="fa fa-fw fa-arrow-left"></i>&nbsp;Volver
							</a>
						</div>
						<div class="col-md-6">
							<button type="submit" class="btn btn-primary"><span class="fa fa-save fa-fw"></span> Guardar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
@endsection