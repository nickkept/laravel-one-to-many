@extends('layouts.app')
@section('content')


  @if (session('status') === 'success')
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  <div class="card">
    @if ($project->cover_img)
      <img src="{{ asset('/storage/' . $project->cover_img) }}" alt="" class="card-img-top">
    @endif

    <div class="card-body">
      <div class="card-title">{{ $project->name }}</div>
      <div class="card-title">Description: {{ $project->description}}</div>
      <div class="card-title"><a href="{{ $project->github_link }}">Go to the github page</a> </div>
    </div>
  </div>

@endsection