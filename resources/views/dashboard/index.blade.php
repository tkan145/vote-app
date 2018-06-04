@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class=" text-center">
    <h2>Index</h2>
  </div>
  <div class="row justify-content-center">
    @foreach( $votes as $vote)
    <div class="col-md-10 bd-card">
      <div class="bd-card-body">
        <div class="row">
          <div class="col-md-8">
            <a href=""><h2 class="post-title">{{ $vote->title}}</h2></a>
            @if( $vote->description != "")
              <div class="col-md-10">
                <p>{{ $vote->description}}</p>
              </div>
            @endif
          </div>
          <div class="col-md-4">
            <a class="btn btn-link text-muted" href=""><i class="fas fa-edit"></i> Edit</a>
            <a class="btn btn-link text-muted" href=""><i class="fas fa-trash"></i> Delete</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection