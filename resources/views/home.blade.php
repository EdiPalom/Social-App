@extends('layouts.app')

@section('title')
Home
@endsection

@section('header')
<nav class="main-nav" aria-label="Main">
  <ul class="main-nav__list">
    <li class="main-nav__item">
      <a href="#" class="main-nav__link">Home</a>
    </li>
    <li class="main-nav__item">
      <a href="#" class="main-nav__link">Work</a>
    </li>
    <li class="main-nav__item">
      <a href="#" class="main-nav__link">About us</a>
    </li>

    <li>
      <form method="POST" id="" action="{{ route('logout') }}">
        @csrf
        <input name="" type="submit" value="Log Out"/>
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
