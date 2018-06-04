@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class=" text-center">
    <h2>Index</h2>
  </div>
  @foreach( $votes as $vote)

  <div class="row bd-card">
    <div class="col-12"><h1 class="post-title">{{ $vote->title}}</h1></div>
    <div class="col-md-10">
      <p>{{ $vote->description}}</p>
    </div>
    <div class="col-md-2 btn-group">
      <a class="btn btn-success" href="{{ route('admin.edit',['id' => $vote->id])}}">Edit</a>
      <a class="btn btn-danger" href="{{ route('admin.edit',['id' => $vote->id])}}">Delete</a>
    </div>
  </div>

  @endforeach
</div>
@endsection