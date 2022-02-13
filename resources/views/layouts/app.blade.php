<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @yield('head')
    
	<title>
      @yield('title')
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Roboto&display=swap" rel="stylesheet"> 
    
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/mobile-l.css') }}" type="text/css" media="(min-width: 390px)" />
    
    <link rel="stylesheet" href="{{ asset('css/tablet.css') }}" type="text/css" media="(min-width: 523px)" />

    <link rel="stylesheet" href="{{ asset('css/laptop.css') }}" type="text/css" media="(min-width: 930px)" />
    
  </head>
  
  <body>
    <header class="header">
      @yield('header')
    </header>
    
    @yield('content')

    <footer class="main-footer">
      <div class="border"></div>
      @yield('footer')
      <section class="main-footer__section">
        <ul class="main-footer__list">
          <li class="main-footer__item"><a href="https://github.com/Edipalom">Github</a></li>
          <li class="main-footer__item"><a href="#">Linkedin</a></li>
        </ul>
      </section>

      <section class="main-footer__section">
        <p>2022 &copy;Edisson Palomares</p>
      </section>
    </footer>

    <script type="text/javascript">
      @yield('script')
    </script>
  </body>
</html>
