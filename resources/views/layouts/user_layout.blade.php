<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title; }} | PERPUSKU</title>
    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> --}}
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style_user.css">
</head>
<body>
    @include('partials/user_navbar')

    @yield('userContent')

    <script src="assets/bootstrap-5.3.0-dist/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.6.3.js"></script>
</body>
</html>
