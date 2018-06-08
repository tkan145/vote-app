@extends('layouts.frontpage')

@section('content')
<div class="main">
  <div class="container votes-bg">
    <div class="row justify-content-center">
      <!-- <div class="col-6 mx-auto col-md-6 order-md-2">
        <img class="img-fluid mb-3 mb-md-0" src="/images/vote.png" width="1024" height="860"/>
      </div> -->
      <div class="col-md-6 order-md-1 text-center text-md-left pr-md-5 tex-center">
        <h1 class="mb-3 text-primary  text-center">Vote System</h1>
        <p class="lead  text-center">This is a development project as a part of PYP Topic 7</p>
        <p class="lead  text-center">This project was build with Laravel and deploy to Microsoft Azure</p>
        <div class="d-flex flex-column flex-md-row lead mb-3">
          <a class="btn btn-md btn-outline-primary mb-3 mb-md-0 mr-md-3" href="">Learn More</a>
          <a class="btn btn-md btn-outline-secondary" href="">Source Code</a>
        </div>
      </div>
    </div>
</div>
<div class="mt-5">
  <div class="container">
  <h1>Available Votes</h1>
  <div class="row justify-content-center">
      @if(count($available_votes) > 0)
      <table class="table table-hover table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Name</th>
            <th>Author</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($available_votes as $available_vote)
            <tr>
              <td>{{ $available_vote->title }}</td>
              <td>{{ $available_vote->author_name }}</td>
              <td>
                <div class="pull-right">
                  <a>Start this survey</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
</div>
@endsection
