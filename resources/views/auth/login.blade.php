@extends('layouts.app')

@section('title')
Login
@endsection

@section('content')
<form method="POST" id="" action="{{ route('login') }}">
  @csrf

  <label for="email">Email</label>
  <input name="email" type="email" value="" placeholder="mail@example.com"/>
  <label for="password">Password</label>
  <input name="password" type="password" value="" placeholder="password"/>

  <input name="remember" type="checkbox" value=""/>
  <label for="remember">Remember me</label>
    
  <input name="" type="submit" value="Send"/>
</form>
@endsection
