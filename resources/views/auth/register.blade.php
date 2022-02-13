@extends('layouts.app')

@section('content')

<main class="main main--login">
  <section class="characters">
    <picture>
      <source media="(min-width:930px)" srcset="{{ asset('img/rocket_md.png')}}">
        
      <img alt="rocket.png" src="{{ asset('img/rocket_small.png') }}" width="100" height="100">      
    </picture>
  </section>
  
  <section class="section__form section-register">
    @foreach($errors->all() as $error)
    <div class="alert alert--error">
      {{ $error }}
    </div>
    @endforeach
    
    <form class="form" method="POST" id="" action="{{ route('register') }}">
      @csrf
      <div class="form__group">
        <label class="form__label" for="username">Username</label>
        <input class="form__input" name="username" type="text" value="{{ old('username') }}"/>
      </div>

      <div class="form__group">
        <label class="form__label" for="email">Email Address</label>
        <input class="form__input" name="email" type="email" value="{{ old('email') }}"/>
      </div>

      <div class="form__group">
        <label class="form__label" for="password">Password</label>
        <input class="form__input" name="password" type="password" value=""/>
      </div>

      <div class="form__group">
        <label class="form__label" for="password_confirmation">Password Confirm</label>
        <input class="form__input" name="password_confirmation" type="password" value=""/>
      </div>

      <div class="form__group">
        <label class="form__label" for="birth_date">Birth Date</label>
        <input class="form__input" name="birth_date" type="date" value=""/>
      </div>

      <div class="form__group">
        <input class="button form__button" name="" type="submit" value="Register"/>        
      </div>
    </form>    
  </section>
</main>

@endsection
