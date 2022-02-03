@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')

<form method="POST" id="" action="{{ route('logout') }}">
  @csrf
  <input name="" type="submit" value="Log Out"/>
</form>


@foreach($posts as $post)

<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>
@endforeach

@endsection
