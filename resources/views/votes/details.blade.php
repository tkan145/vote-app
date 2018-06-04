@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class=" text-center">
    <h2>{{$vote->title}}</h2>
  </div>
  <div class="row">
    <div class="col-md-4 bd-card">
      <div class="bd-card-body">
        <div class="row">
          <div class="col-md-8">
            <p>Description: {{$vote->description}}</p>
            @if ($vote->status === 'Open')
                Status: <span class="label label-success">{{ $vote->status }}</span>
            @else
                Status: <span class="label label-danger">{{ $vote->status }}</span>
            @endif
            <p>Created on: {{ $vote->created_at->diffForHumans() }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Result here -->
    <div class="col-md-8 bd-card">
      <div class="bd-card-body">
        <div class="row">
          <div class="col-md-8">
            <p>Show result</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection