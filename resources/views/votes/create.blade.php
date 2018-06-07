@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class=" text-center">
    <h2>Create</h2>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-10 bd-card">
      <div class="bd-card-body">

        <form id="create-form" class="needs-validation" action="{{ route('votes.create')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Title</label>
              <div class="row">
                  <div class="col-md-8 mb-3">
                      <input type="text" class="form-control" id="title" name="title" placeholder="" value="" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <button type="button" class="btn btn-outline-primary btn-add-description">Add Description</button>
                  </div>
                </div>
            </div>

            <!-- Dynamic generate by jquery
              <div class="form-group">
              <label>Description</label>
              <div class="row">
                  <div class="col-md-8 mb-3">
                      <input type="text" class="form-control" id="description" name="description" placeholder="" value="">
                  </div>
                </div>
            </div> -->

            <div class="row mb-5">
              <div class="col-md-5 mb-3">
                <label for="date">Day</label>
                <div class="input-group">
                  <input type="text" class="form-control datepicker" id="date" data-provide="datepicker">
                  <div class="input-group-append">

                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
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
                        <input type="text" class="form-control option-fields" name="options[]" id="" placeholder="" value="">
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
              <input type="file" class="form-control-file" name="file" id="file" accept="image/*" multiple>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
  </div>
</div>

@endsection