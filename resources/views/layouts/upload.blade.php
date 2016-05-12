@extends('layouts.master')

@section('head')
<link href="/css/popupstyles.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
<div class="popup_container">
  <div class="popup">
    <h2>Image Preview</h2>
    <div class="thumb_container">
      <img id="image">
    </div>
      <div class="form_container">
      <h1>Upload Image</h1>

      @if(count($errors) > 0)
      <ul class="error">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      @endif

      <form method="post" action="/upload" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="file" id="file" name="image" class="input" accept="image/*"></input><br><br>
        <label for="name">File Name</label>
        <input type="text" name="name" class="input"></input><br><br><br>
        <label for="project">Project</label><br>
        <select name="project">
          @foreach ($projects as $project)
          <option value={{ $project->name }}>{{ $project->name }}</option>
          @endforeach
        </select>
        <input type="submit" value="Upload" class="action"></input><br>
      </form>
    </div>
    <a href="/"><div class="cancel"><a href="/">Cancel</a></div>
  </div>
</div>
@stop

@section('body')
<script src="/scripts/loadthumb.js"></script>
@stop
