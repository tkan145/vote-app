@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class=" text-center">
    <h2>Edit {{ $vote->title}}</h2>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-10 bd-card">
      <div class="bd-card-body">

        <form class="needs-validation" action="{{ route('votes.create')}}" method="post">
            <div class="form-group">
              <label>Title</label>
              <div class="row">
                  <div class="col-md-8 mb-3">
                      <input type="text" class="form-control" id="title" name="title" placeholder="" value="" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <button type="button" class="btn btn-outline-primary">Add Description</button>
                  </div>
                </div>
            </div>

            <div class="form-group">
              <label>Description</label>
              <div class="row">
                  <div class="col-md-8 mb-3">
                      <input type="text" class="form-control" id="description" name="description" placeholder="" value="">
                  </div>
                </div>
            </div>

            <div class="row mb-5">
              <div class="col-md-5 mb-3">
                <label for="country">Day</label>
                <select class="custom-select d-block w-100" id="country" >
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>

              <div class="col-md-2 mb-3">
                  <label for="state">Hour</label>
                  <select class="custom-select d-block w-100" id="state">
                    <option value="">Choose...</option>
                    <option>California</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
              </div>

              <div class="col-md-2 mb-3">
                <label for="zip">Minute</label>
                <input type="text" class="form-control" id="zip" placeholder="">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>

              <div class="col-md-3 mb-3">
                  <label for="zip">Duration</label>
                  <input type="text" class="form-control" id="zip" placeholder="">
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div>
            </div>

            <div class="form-group">
                <label>Options</label>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <input type="text" class="form-control" id="firstName" placeholder="" value="">
                    </div>
                    <div class="col-md-4 mb-3">
                      <button type="button" class="btn btn-outline-primary">Add new option</button>
                    </div>
                </div>
            </div>

            <hr class="mb-4">
            <div class="form-group">
              <h4>Upload attachments</h4>
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
  </div>
</div>

@endsection