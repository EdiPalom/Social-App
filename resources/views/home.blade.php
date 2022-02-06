@extends('layouts.app')

@section('title')
Home
@endsection

@section('header')
<nav class="main-nav" aria-label="Main">
  <ul class="main-nav__list">

    <li class="main-nav__item">
      <img class="main-nav__user-profile" alt="" src="{{ Auth::user()->profile }}"/>
      <a href="#" class="main-nav__link">{{ Auth::user()->username }}</a>
    </li>

    <li>
      <form method="POST" id="" action="{{ route('logout') }}">
        @csrf
        <input class="form__input--logout" name="" type="submit" value=""/>
        <!-- <button class="form__input--logout" type="submit"></button> -->
      </form>
    </li>
  </ul>
</nav>
@endsection

@section('content')

<section class="posts">
  @foreach($posts as $post)
  <h1>{{ $post->title }}</h1>
  <p>{{ $post->body }}</p>
  @endforeach  
</section>
<!-- @if (session('status')) -->
<!-- <div class="alert alert-success"> -->
<!--   {{ session('status') }} -->
<!-- </div> -->
<!-- @endif -->




@endsection
