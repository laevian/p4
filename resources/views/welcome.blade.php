@extends('layouts.master')

@section('nav')
<div class="navtree">
  <ul class="nav">
    @foreach ($projects as $i=>$project)
    <a href="{{ $project->name }}"><li
      @if ( $i == $this_project-1 ) class="selected_li" @endif
      id={{ $project->name }}>{{ $project->name }}
    </li></a>
    @endforeach
  </ul>
</div>
@stop

@section('files')

  @foreach ($files as $file)
    <div class="filecontainer">
      <img src="
      {{ URL::to('/').$file->file_location }}
      "/>
      <div class="dropdown">
      {{$file->file_name}}
      <div class="dropdown_arrow"></div>
        <div class="dropdown_content">
          <a href="/edit/{{$file->file_name}}">Edit</a><br>
          <a href="/delete/{{$file->file_name}}">Delete</a>
        </div>
      </div>
    </div>
  @endforeach

@stop
