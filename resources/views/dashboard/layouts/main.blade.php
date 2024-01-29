<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Admin</title>
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/bootstrap-5.3.0-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/dashboard.css">
</head>
<body style="background-color: #e1e1e1;">

	@include('partials/user_navbar')

<header class="container-fluid pt-5">
	<div class="mx-0 mt-2">

		@include('dashboard/layouts/sidebar')
		
		<div class="row">
			<div class="col-3">

			</div>
			<div class="col-8">
		
				@yield('dashboardContent')
		
			</div>
		</div>
	</div>
</header>

<script src="/assets/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>
</body>
</html>