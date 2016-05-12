@extends('layouts.auth')

@section('content')
<div class="small">Lichen is an image sharing repository targeted at designers.</div>
<h1>Log In</h1>
<aside>Don't have an account? <a href="/register">Register here.</a></aside><br>

@if(count($errors) > 0)
    <ul class='errors'>
        @foreach ($errors->all() as $error)
            <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/login">

          {!! csrf_field() !!}

<label for="email">Email</label><br>
  <input type="text" name="email" class="input" value='{{ old('email') }}'></input>
<br><br><br>
<label for="password"> Password</label><br>
  <input type="password" name="password" class="input"value='{{ old('password') }}'></input><br><br><br>
  <input type='checkbox' name='remember' id='remember'>
  <label for='remember' class='checkboxLabel'>Remember me</label>
  <input type="submit" value="Log In" class="action"></input>

</form>
@stop
