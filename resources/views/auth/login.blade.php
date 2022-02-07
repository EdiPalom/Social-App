@extends('layouts.app')

@section('title')
Login
@endsection

@section('header')
<!-- <img class="header__logo" src="{{ asset('img/logo.svg') }}" alt="logo.png" /> -->

<h1 class="header__title"><span id="social">Social</span> Network App</h1>

@endsection

@section('content')

<main class="main main--login">
  <section class="characters">
    <img alt="boy1.jpg" src="{{ asset('img/boy1_sm.jpg') }}"/>
    <img alt="boy2.png" src="{{ asset('img/boy2_sm.png') }}"/>
    <img alt="girl.png" src="{{ asset('img/girl_sm.jpg') }}"/>
  </section>

  <section>

    @foreach($errors->all() as $error)
    <div class="alert alert--error" onclick="display_none(this);">
      {{ $error }}
    </div>
    @endforeach
    
    <form method="POST" class="form" action="{{ route('login') }}">
      @csrf

      <div class="form__group">
        <label class="form__label" for="email">Email</label>
        <input class="form__input" name="email" type="email" value="" placeholder="mail@example.com"/>      
      </div>
      

      <div class="form__group">
        <label class="form__label" class="form__label" for="password">Password</label>
        <input class="form__input" name="password" type="password" value="" placeholder="password"/>      
      </div>


      <div class="form__group">
        <input name="remember" type="checkbox" value=""/>
        <label class="form__label" for="remember">Remember me</label>
      </div>

      <div class="form__group">
        <input class="form__button" name="" type="submit" value="Send"/>
      </div>

    </form>  
  </section>

  <script>
    function display_none(obj)
    {
    obj.style.display = "none";
    }
  </script>  
</main>


@endsection
