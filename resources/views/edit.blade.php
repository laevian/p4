@extends('layouts.master')

@section('head')
<link href="/css/editstyles.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
<div class="popup_container">
  <div class="popup">
      <div class="form_container">
      <h1>Edit Image Details</h1>

      @if(count($errors) > 0)
      <ul class="error">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      @endif

      <form method="post" action="/edit/{{$image_name}}">
        {!! csrf_field() !!}
        <label for="name">File Name</label>
        <input type="text" name="name" class="input" value={{$image_name}}></input><br><br><br>
        <label for="project">Project</label><br>
        <select name="project">
          @foreach ($projects as $project)
          <option value={{ $project->name }}>{{ $project->name }}</option>
          @endforeach
        </select>
        <input type="submit" value="Save Edits" class="action"></input><br>
      </form>
    </div>
    <a href="/"><div class="cancel"><a href="/">Cancel</a></div>
  </div>
</div>
@stop
