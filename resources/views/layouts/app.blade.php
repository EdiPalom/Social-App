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

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
  </head>
  
  <body>
    <header>
      @yield('header')
    </header>
    
	<main>
      @yield('content')
    </main>

    <footer>
      @yield('footer')
    </footer>
  </body>
</html>
