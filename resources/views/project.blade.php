@extends('layouts.master')

@section('nav')
<div class="navtree">
  <ul class="nav">
    @foreach ($projects as $i=>$project)
    <a href="{{ $project->name }}"><li
      @if ( $i == {{ $project->id }} ) class="selected_li" @endif
      id={{ $project->name }}>{{ $project->name }}
    </li></a>
    @endforeach
  </ul>
</div>
@stop

@section('content')

@stop
