<!DOCTYPE html>
<html>
<head>
	<title>{{ isset($page) ? $page . ' |' : '' }} {{ config('app.name') }}</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="https://technopro-solutions.co.ke">

	@yield('meta')


	<link rel="stylesheet" href="{{ my_asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ my_asset('css/jquery.dataTables.min.css') }}">
	<link rel="stylesheet" href="{{ my_asset('css/dataTables.bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ my_asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ my_asset('css/sweetalert2.min.css') }}">
	<link rel="stylesheet" href="{{ my_asset('css/jquery-ui.min.css') }}">
	<link rel="stylesheet" href="{{ my_asset('css/bootstrap-datepicker.min.css') }}">
	<link rel="stylesheet" href="{{ my_asset('css/custom.css') }}">

	<link rel="shortcut icon" href="{{ my_asset('img/ciarb-icon.png') }}" type="image/x-icon"/>


	<script src="{{ my_asset('js/jquery-2.1.4.min.js') }}"></script>

</head>
<body>

	@include('includes.nav')

	<div class="container">
		