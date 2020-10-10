<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Custom fonts for this template -->
	<link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
	<!-- Bootstrap core JavaScript -->
	<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- Core plugin JavaScript -->
	<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<!-- Custom scripts for all pages -->
	<script src="{{ asset('admin/js/sb-admin-2.js') }}"></script>
	<script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
	<!-- Chart scripts -->
	<!--script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
	<script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
	<script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script-->
	<!-- Google places api -->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAWaGdx07Vu7oOrR2JdqxSjxgR27Jye4IM"></script>
	<!-- Custom styles -->
	<link href="{{ asset('admin/css/libs/bootstrap-multiselect.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/css/libs/star-rating.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('admin/css/libs/commons.css') }}" rel="stylesheet" type="text/css">
	@yield('styles')
	<!-- Custom scripts -->
	<script src="{{ asset('admin/js/libs/disable-button-on-submit.js') }}"></script>
	<script src="{{ asset('admin/js/libs/autocomplete-address.js') }}"></script>
	<script src="{{ asset('admin/js/libs/multiselect.js') }}"></script>
	<script src="{{ asset('admin/js/libs/validate-file.js') }}"></script>
	<script src="{{ asset('admin/js/libs/mask/jquery.mask.js') }}"></script>
	<script src="{{ asset('admin/js/libs/mask/customs.js') }}"></script>
	<script src="{{ asset('admin/js/libs/commons.js') }}"></script>
	@yield('scripts')
</head>
<body id="page-top" @guest class="bg-gradient-primary" @endguest>
	@yield('body')
</body>
</html>