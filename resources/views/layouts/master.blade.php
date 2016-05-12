<!doctype html>
<html>
<head>
    <title>Lichen</title>

    <meta charset='utf-8'>
    <link href="/css/styles.css" type='text/css' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Asap:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')
</head>
<body>

    <header>
      <span class="logo">Lichen</span>
      @yield('nav')
    </header>

    <div class="topbar">
      <form method="post">
      <a href="/upload"><input type="button" class="button" value="Upload"></input></a>
      </form>
      <!--<form method="post">
        <input class="searchbar" type="search"></input>
      </form> -->
      <a href="/logout"><input type="button" class="button" id="logout" value="Log Out"></input></a>
    </div>

    @yield('content')

    <section class="files">
    @yield('files')
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/scripts/master.js"></script>


    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
