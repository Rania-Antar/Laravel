<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css')}}/bootstrap.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">MyAPP</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{route('accueil')}}">Accueil</a>
        <a class="p-2 text-dark" href="{{route('services')}}">Services</a>
        <a class="p-2 text-dark" href="{{route('formations')}}">Formations</a>
        <a class="p-2 text-dark" href="{{route('contact')}}">Contact</a>
    </nav>
    <a class="btn btn-outline-primary" href="#">Sign up</a>
</div>

<div class=" px-3 py-3 pt-md-5 pb-md-4 mx-auto ">
    @yield('content')
</div>

<div class="container">
    <div class="card-deck mb-3 text-center">



    </div>

</div>
</body>
</html>

