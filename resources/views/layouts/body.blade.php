@extends('layouts.head')
@section('body')
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Admin</div>
			</a>
			<li class="nav-item">
				<a class="nav-link" href="{{ url('users') }}">
					<i class="fa fa-user fa-fw"></i>
					<span>Usuarios</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ url('otros') }}">
					<i class="fa fa-list fa-fw"></i>
					<span>Otros</span>
				</a>
			</li>
		</ul>
		<!-- End of Sidebar -->
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="{{ url('/users/' . Auth::user()->id) }}" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->first_name }}</span>
								@if(Auth::user()->image)
									<img src="{{ asset(Auth::user()->image) }}" class="img-profile rounded-circle"alt="Avatar"/>
								@else
									<i class="fa fa-user fa-fw"></i>
								@endif
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="{{ url('users/' . Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> Mi Cuenta</a>
								<a class="dropdown-item" href="{{ url('users/' . Auth::user()->id . '/edit') }}"><i class="fa fa-cogs fa-fw"></i> Editar Datos</a>
								<a class="dropdown-item" href="{{ url('passwords') }}"><i class="fa fa-lock fa-fw"></i> Cambiar contraseña</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="fa fa-sign-out-alt fa-fw"></i> 
									Cerrar Sesión
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</div>
						</li>
					</ul>
				</nav>
				<!-- End of Topbar -->
				@yield('content')
			</div>
			<!-- End of Main Content -->
			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; <a href="https://jaypion.com/" target="_blank">Jaypion</a> 2020</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->
		</div>
		<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->
@endsection