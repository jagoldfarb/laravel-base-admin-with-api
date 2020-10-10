@extends('layouts.body')
@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Vista de {{ ucfirst($title) }}</h6>
			</div>
			<div class="card-body">
				<table id="{{ $resource }}" width="100%" class="table table-striped table-bordered">
					<tbody>
					@foreach($fields as $key => $field)
						<tr>
							<th>{{ ucfirst($key) }}</th>
							<th>{{ $field }}</th>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="row">
					<div class="pull-xs-left col-md-6">
						<a href="#" onclick="window.history.go(-1); return false;" class="btn btn-outline btn-primary">
							<i class="fa fa-fw fa-arrow-left"></i>&nbsp;Volver
						</a>
					</div>
					<div class="col-md-6">
						<a href="{{ url($resource . '/' . $item->id . '/edit') }}" class="btn btn-outline btn-primary"><span class="fa fa-edit fa-fw"></span>
							&nbsp;Editar
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
@endsection