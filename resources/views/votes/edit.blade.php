@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class=" text-center">
    <h2>Edit {{ $vote->title}}</h2>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-10 bd-card">
      <div class="bd-card-body">

        <form id="create-form" class="needs-validation row" action="{{ route('votes.update')}}" method="post">
            <div class="col-md-9">
            <div class="form-group">
              <label>Title</label>
              <div class="row">
                  <div class="col-md-8 mb-3">
                      <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{$vote->title}}" required>
                  </div>
                  @if($vote->description === "")
                  <div class="col-md-4 mb-3">
                    <button type="button" class="btn btn-outline-primary btn-add-description">Add Description</button>
                  </div>
                  @endif
                </div>
            </div>

            @if($vote->description != "")
            <div class="form-group">
              <label>Description</label>
              <div class="row">
                  <div class="col-md-8 mb-3">
                      <input type="text" class="form-control" id="description" name="description" placeholder="" value="{{$vote->description}}">
                  </div>
                </div>
            </div>
            @endif
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
                      <button type="button" class="btn btn-outline-primary btn-add-option">Add new option</button>
                    </div>
                </div>
            </div>

            <!-- The option field template containing an option field and a Remove button -->
            <div class="form-group d-none" id="optionTemplate">
              <div class="row">
                <div class="col-md-8 mb-3">
                  <input type="text" class="form-control option-fields" name="options[]" id="" placeholder="" value="">
                </div>
                <div class="col-md-4 mb-3">
                  <button type="button" class="btn btn-danger btn-remove-option">Remove</button>
                </div>
              </div>
            </div>

            <hr class="mb-4">
            <div class="form-group">
              <h4>Upload attachments</h4>
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            </div>
            <div class="col-md-2">
              <div class="">
                <h4>Visibility</h4>
                <div class="form-group">
                  <select class="form-control" id="status" name="status">
                    <option value="Public">Public</option>
                    <option value="Private">Private</option>
                    <option value="Archive">Archive</option>
                  </select>
                </div>
              </div>
            </div>
            {{ csrf_field() }}
            <input type="hidden" name="uuid" value="{{ $vote_uuid }}">
            <a>{{$vote_uuid}}qweq</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
  </div>

</div>

@endsection