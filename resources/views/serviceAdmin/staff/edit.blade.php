@extends('serviceAdmin.layouts.app')
@section('title','Service Station Admin | Edit Staff')
@section('content')
<div class="pagetitle">
  <h1>Edit Staff</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('service-dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Edit Staff</li>
    </ol>
  </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-4">
            <div class="d-flex justify-content-between">
              <div>
                <h4>Edit Staff</h4>
              </div>
              <div>
                <a href="{{route('staff.index')}}" class="btn btn-success"><i class="bi bi-eye"></i> Staff</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('staff.update', $staff->id)}}" method="post">
              @csrf
              @method('PUT')
              <div class="row p-4">
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Name*</label>
                    <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                    placeholder="Enter name" type="text" name="name" value="{{$staff->name}}" required>
                    @if($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Phone*</label>
                    <input class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                    placeholder="Enter phone" type="text" name="phone" value="{{$staff->phone}}" required>
                    @if($errors->has('phone'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Service Station</label>
                    <select class="form-control {{ $errors->has('service_station_id') ? 'is-invalid' : ''}}" name="service_station_id" required>
                      <option label="Select"></option>
                      @foreach($stations as $station)
                        <option value="{{$station->id}}" @if($staff->service_station_id == $station->id) selected @endif>{{$station->name}}</option>
                      @endforeach
                    </select>
                    @if($errors->has('service_station_id'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('service_station_id') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Address*</label>
                    <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}"
                    placeholder="Enter address" name="address" required>{{$staff->address}}</textarea>
                    @if($errors->has('address'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-12 my-3">
                  <button class="btn btn-primary" type="submit">Update</button>
                </div>

              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection