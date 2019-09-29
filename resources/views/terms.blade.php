<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>BikeWise Rentals</title>

    <!-- Custom styles for this template -->
    <!--<script src=
            "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <link href="starter-template.css" rel="stylesheet">
    <!--<link rel="stylesheet" href=
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!--<script src=
            "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<!--<link rel="stylesheet" href="{{ asset('css/rentalForm.css') }}">-->
    <!-- Custom fonts for this template-->
    <link href="/theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Rental Form Custom Scripts -->
    <script src="js/rentalForm.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="theme/vendor/jquery/jquery.min.js"></script>
    <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="theme/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="theme/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/rentalForm') }}">
            Bikewise
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li><a href="" class="nav-link">Home</a></li>
                <li><a href="" class="nav-link">About Us</a></li>
                <li class="active"><a href="" class="nav-link">Rentals</a></li>
            </ul>
        </div>
    </div>
</nav>

<br><br><br><br><br>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="h1 col-lg-8 col-12 mb-4">Bikewise Terms and Conditions</div>
        <br>
        <div class="h3 col-lg-8 col-12 mb-4">I, for myself and any minor children for which I am parent, legal guardian or otherwise responsible,
            release the bicycle shop, agents, and employees from any liability for damage or injury to myself or any
            person or property resulting from negligence, adjustment, selection and use of this equipment. I, understanding
            the inherent risk involved in using this equipment, accept the full responsibility for any and all such
            damage or injury which may result.</div>
        <br>
        <div class="h3 col-lg-8 col-12 mb-4">I accept for use, as is, the equipment in good condition and accept the full responsibility for
            care of equipment while in my possession. I will be responsible for the prompt replacement at full retail
            value of all rental equipment not returned or damaged, other than reasonable wear and tear, which results
            from the use of this equipment.</div>
        <br>
        <div class="h3 col-lg-8 col-12 mb-4">I agree to return rental equipment by agreed date in clean condition to avoid additional charges.
            </div>
        <br>
        <div class="h3 col-lg-8 col-12 mb-4">All instructions on the use of rental equipment have been made clear to me and I understand the
            function of the equipment.</div>
        <br>
        <div class="h3 col-lg-8 col-12 mb-4">I accept the terms of this agreements and accept responsibility for the above charges.</div>
    </div>
</div>

</body>

</html>
