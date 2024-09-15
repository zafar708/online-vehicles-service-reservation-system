@extends('serviceAdmin.layouts.app')
@section('title','Service Station Admin | Edit Service Stations')
@section('content')
<div class="pagetitle">
  <h1>Edit Service Station</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('service-dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Edit Service Station</li>
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
                <h4>Edit Service Station</h4>
              </div>
              <div>
                <a href="{{route('serviceStations.index')}}" class="btn btn-success"><i class="bi bi-eye"></i> Service Stations</a>
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
            <form action="{{route('serviceStations.update', $serviceStation->id)}}" method="post">
              @csrf
              @method('PUT')
              <div class="row p-4">
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Name*</label>
                    <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                    placeholder="Enter name" type="text" name="name" value="{{$serviceStation->name}}" required>
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
                    placeholder="Enter phone" type="text" name="phone" value="{{$serviceStation->phone}}" required>
                    @if($errors->has('phone'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Location*</label>
                    <textarea class="form-control {{ $errors->has('location') ? 'is-invalid' : ''}}"
                    placeholder="Enter location" name="location" required>{{$serviceStation->location}}</textarea>
                    @if($errors->has('location'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('location') }}</strong>
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