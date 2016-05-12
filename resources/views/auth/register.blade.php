@extends('layouts.auth')

@section('head')

<link href="/css/registerstyles.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
<div class="small">Lichen is an image sharing repository targeted at designers.</div>
<h1>Register</h1>
<aside>Already have an account? <a href="/login">Log in here.</a></aside><br>

@if(count($errors) > 0)
    <ul class='errors'>
        @foreach ($errors->all() as $error)
            <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/register">

          {!! csrf_field() !!}


<label for="name">Name</label><br>
  <input type="text" name="name" class="input" value='{{ old('name') }}'></input>
<br><br><br>
<label for="email">Email</label><br>
  <input type="text" name="email" class="input" value='{{ old('email') }}'></input>
<br><br><br>
<label for="password"> Password</label><br>
  <input type="password" name="password" class="input" value='{{ old('password') }}'></input><br><br><br>
  <label for='password_confirmation'>Confirm Password</label><br>
  <input type='password' name='password_confirmation' class="input"><br>
    <input type="submit" value="Register" class="action"></input><br>
</form>
@stop
