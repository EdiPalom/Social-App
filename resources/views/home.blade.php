@extends('layouts.app')

@section('title')
Home
@endsection

@section('header')
<nav class="main-nav" aria-label="Main">
  <ul class="main-nav__list">

    <li class="main-nav__item">
      <img class="user-profile main-nav__user-profile" alt="" src="{{ Auth::user()->profile }}"/>
      <a href="#" class="main-nav__link">{{ Auth::user()->username }}</a>
    </li>

    <li>
      <form method="POST" id="" action="{{ route('logout') }}">
        @csrf
        <input class="icon form__input--logout" name="" type="submit" value=""/>
        <!-- <button class="form__input--logout" type="submit"></button> -->
      </form>
    </li>
  </ul>
</nav>
@endsection

@section('content')

<section class="posts">
  @foreach($posts as $post)
  <div class="card-container">
    <article class="card">
      <div class="card__header">
        <img class="user-profile card__user-profile" alt="" src="{{ $post->user->profile }}"/>        

        <p class="card__username">{{ $post->user->username }}</p>      
      </div>

      <div class="card__body">
        <div class="card__title">{{ $post->title }}</div>
        <p class="card__content">
          {{ $post->body }}
        </p>      
      </div>

      <div class="card__footer">
        <div class="card__actions">
          <button class="icon button--message"></button>
          <button class="icon button--pen"></button>
          <button class="icon button--heart"></button>
        </div>
      </div>
    </article>    
  </div>

  @endforeach  
</section>
<!-- @if (session('status')) -->
<!-- <div class="alert alert-success"> -->
<!--   {{ session('status') }} -->
<!-- </div> -->
<!-- @endif -->




@endsection
