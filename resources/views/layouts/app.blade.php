<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
	<title>
      @yield('title')
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Roboto&display=swap" rel="stylesheet"> 
    
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
  </head>
  
  <body>
    <header class="header">
      @yield('header')
    </header>
    
    @yield('content')

    <footer>
      @yield('footer')
    </footer>
  </body>
</html>
