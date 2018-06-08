@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class=" text-center">
    <h2>Index</h2>
  </div>
  @if(Session::has('info'))
  <div class="row">
    <div class="col-md-12">
      <p class="alert alert-info">{{ Session::get('info') }}</p>
    </div>
  </div>
  @endif
  <div class="row justify-content-center">
    @if($votes->isEmpty())
    <div class="col-md-10 bd-card">
      <div class="bd-card-body">
        <p>You have not created any polls</p>
      </div>
    </div>
    @else

    @foreach( $votes as $vote)
    <div class=" col-sm-12 col-md-10 bd-card">
      <div class="bd-card-body">
        <div class="row">
          <div class="col-md-7">
            @if($vote->status == 'Public')
              <span class="badge badge-success h6">Public</span>
            @elseif($vote->status == 'Private')
              <span class="badge badge-secondary h6">Private</span>
            @elseif($vote->status == 'Archive')
              <span class="badge badge-warning h6">Archive</span>
            @endif
            <h2 class="post-title">{{ $vote->title}}</h2>

            @if( $vote->description != "")
              <div class="col-md-10">
                <p>{{ $vote->description}}</p>
              </div>
            @endif
          </div>
          <div class="col-sm-12 col-md-5">
            <a class="btn btn-link text-muted" href="{{ route('votes.show',['uuid' => $vote->uuid])}}"><i class="fas fa-edit"></i> View</a>
            <a class="btn btn-link text-muted" href="{{ route('votes.edit',['uuid' => $vote->uuid])}}"><i class="fas fa-edit"></i> Edit</a>
            <a class="btn btn-link text-muted" href="{{ route('votes.delete',['uuid' => $vote->uuid])}}"><i class="fas fa-trash"></i> Delete</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
</div>
@endsection