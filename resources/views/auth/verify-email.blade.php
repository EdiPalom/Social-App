@extends('layouts.app')

@section('content')

<div class="main main__login">
  <h2>Activate your account</h2>
  <p>We send you an email to activate your account.</p>

  <form class="form" method="post" action="{{ route('verification.send') }}">
    <div class="form__group">
      <input class="form__button" name="" type="Submit" value="Resend Verification email"/>
    </div>
  </form>
</div>

@endsection
