<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>@yield('title') | NguyenThucOfficial</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="csrf-token" content="{{ csrf_token() }}" />
	    <base href="{{ asset('') }}">
	    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="source/css/animate.css">
	    <link rel="stylesheet" href="source/css/owl.carousel.min.css">
	    <link rel="stylesheet" href="source/css/owl.theme.default.min.css">
	    <link rel="stylesheet" href="source/css/magnific-popup.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
	    <link rel="stylesheet" href="source/css/flaticon.css">
	    <link rel="stylesheet" href="source/css/style.css">
	</head>
	<body>
		@include('frontend.partials.header')
    
    	@yield('content')

    	@include('frontend.partials.footer')
	</body>
</html>