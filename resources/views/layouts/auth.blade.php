<!doctype html>
<html>
<head>
    <title>Welcome to Lichen</title>

    <meta charset='utf-8'>
    <link href="/css/styles2.css" type='text/css' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Asap:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')
</head>
<body>

  @if ( Session::has('message') )
    <div class="message">
        {{ Session::get('message') }}
    </div>
  @endif


<section class="window">
    @yield('content')
</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
