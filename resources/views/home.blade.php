@extends('layouts.app')

@section('head')
<meta name="access_token" content="" />
@endsection

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
<main class="main main--home">
  <section class="content-creation">
    <div class="card-container">
      <article class="card card--creation">
        <div class="card__header--md">
          <button id="create__button" onclick="show_post_form(this)" class="content-creation__button">Create Content</button>
        </div>

        <div id="post-form" class="card__body">
          <span id="form-close" class="form-close">x</span>
          <form method="post" id="" action="{{ route('posts.store')}}" enctype="multipart/form-data">

            <div class="form__group">
              <label class="form__label" for="">Title</label>
              <input class="form__input" name="title" type="text" value=""/>
            </div>

            <div class="form__group">
              <label class="form__label" for="body">Content</label>
              <textarea class="form__text" name="body" rows="10" cols="30">
              </textarea>
            </div>

            <div id="form--image" class="form__group form__container">
              <label class="form__label form__button" for="upload">Add Image</label>
              <input id="upload" class="form__input" name="file" type="file"/>              
            </div>

            <div id="form--link" class="form__group">
              <label class="form__label" for="iframe">Embedded Content</label>
              <textarea class="form__text" cols="50" id="" name="iframe" rows="4"></textarea>
            </div>

            <div class="form__icons">
              <button id="button--land" class="icon button--land"></button>
              <button id="button--link" class="icon button--link"></button>
            </div>
            
            <div class="form__group">
              @csrf
              <input class="form__button" name="" type="submit" value="Send"/>
            </div>

            </form>
        </div>
      </article>
    </div>
  </section>

  <section id="posts" class="posts">
    <!-- @foreach($posts as $post) -->
    <!-- <div class="card-container"> -->
    <!--   <article class="card"> -->
    <!--     <div class="card__header"> -->
    <!--       <img class="user-profile card__user-profile" alt="" src="{{ $post->user->profile }}"/>         -->

    <!--       <p class="card__username">{{ $post->user->username }}</p>       -->
    <!--     </div> -->

    <!--     <div class="card__body"> -->
    <!--       <div class="card__title">{{ $post->title }}</div> -->
    <!--       <p class="card__content"> -->
    <!--         {{ $post->body }} -->
    <!--       </p> -->
    <!--       @isset($post->images) -->
    <!--       @foreach($post->images as $image) -->
    <!--       <img class="card__image" alt="" src="{{ $image->get_url }}"/> -->
    <!--       @endforeach -->
    <!--       @endisset -->

    <!--     </div> -->

    <!--     <div class="card__footer"> -->
    <!--       <div class="card__actions"> -->
    <!--         <button class="icon button--message"></button> -->
    <!--         <button class="icon button--pen"></button> -->

    <!--         <div> -->
    <!--           <button class="icon button--heart"></button> -->
    <!--           <span class="likes"> -->
    <!--             {{ $post->likes->count() }}               -->
    <!--           </span>               -->
    <!--         </div> -->
    <!--       </div> -->
    <!--     </div> -->
    <!--   </article>     -->
    <!-- </div> -->

    <!-- @endforeach   -->
  </section>  
</main>

<!-- @if (session('status')) -->
<!-- <div class="alert alert-success"> -->
<!--   {{ session('status') }} -->
<!-- </div> -->
<!-- @endif -->




@endsection


@section('script')

@endsection
