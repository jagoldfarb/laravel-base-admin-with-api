@extends('layouts.body')
@section('styles')
	<!-- Datatable styles -->
	<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/css/libs/list.css') }}" rel="stylesheet">
@endsection
@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="card shadow mb-4">
			<div class="loader">
				<img src="{{ asset('admin/img/loader.gif') }}" width="50px" alt="loader"/>
			</div>
			<div class="content-loading" data-time="-1">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary vertical-center">
						<div class="col-sm-6">
							<span class="left">Listado de {{ $title }}</span>
						</div>
						<div class="col-sm-6">
							<a href="{{ url($resource . '/create') }}" class="btn btn-primary btn-create">Nuevo</a>
						</div>
					</h6>
				</div>
				@if(Session::has('success'))
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('success') }} 
					</div>
				@endif
				@if(Session::has('deleted'))
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('deleted') }}.
					</div>
				@endif
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered" id="datatable" width="100%" cellspacing="0">
							<thead>
								<tr>
									@foreach($columns as $column)
										<th>{{ ucfirst($column) }}</th>
									@endforeach
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($rows as $row)
									<tr>
									@foreach($row as $data)
										<td>{!! $data !!}</td>
									@endforeach
									</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									@foreach($columns as $column)
										<th>{{ ucfirst($column) }}</th>
									@endforeach
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
@endsection
@section('scripts')
	<!-- Datatable scripts -->
	<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('admin/js/libs/datatable.js') }}"></script>
@endsection