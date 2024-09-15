@extends('frontend.layouts.app')
@section('title', 'Vehicles')
@section('content')
<section class="">
  <div class="container">
    <div class="row">
      @include('frontend.user.sidebar')
      <div class="col-lg-9 col-md-8 p-5">
        <h3 class="mb-5">Edit Vehicle</h3>
        <a href="{{route('vehicles.index')}}" class="btn btn-primary"><i class="bi bi-eye"></i> Vehicles</a>
        <form method="post" action="{{route('vehicles.update', $vehicle->id)}}">
          <div class="row g-3 mt-4">
            @csrf
            @method('PUT')
            <div class="col-lg-6 mt-3">
              <div class="form-group">
                <label class="form-label">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                placeholder="Enter name" type="text" name="name" value="{{$vehicle->name}}" required>
                @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-3">
              <div class="form-group">
                <label class="form-label">Model</label>
                <input class="form-control {{ $errors->has('model') ? ' is-invalid' : '' }}"
                placeholder="Enter model" type="text" name="model" value="{{$vehicle->model}}" required>
                @if($errors->has('model'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('model') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-3">
              <div class="form-group">
                <label class="form-label">Color</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}"
                placeholder="Enter color" type="text" name="color" value="{{$vehicle->color}}">
                @if($errors->has('color'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('color') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-3">
              <div class="form-group">
                <label class="form-label">Year</label>
                <input type="text" class="form-control {{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{$vehicle->year}}" id="year" placeholder="Enter year">
                @if($errors->has('year'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('year') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-3">
              <div class="form-group">
                <label class="form-label">Registration Number</label>
                <input type="text" class="form-control {{ $errors->has('registration_number') ? ' is-invalid' : '' }}" name="registration_number" value="{{$vehicle->registration_number}}" id="registration_number" placeholder="Enter registration number">
                @if($errors->has('registration_number'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('registration_number') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-3">
              <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  
</section>
@endsection