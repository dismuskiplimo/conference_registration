<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	@include('includes.bootstrap')
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>