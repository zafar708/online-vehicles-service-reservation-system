@extends('serviceAdmin.layouts.app')
@section('title','Service Station Admin | Profile')
@section('content')
<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('service-dashboard')}}">Home</a></li>
      <li class="breadcrumb-item">Service Admin</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
      <div class="row justify-content-center">
        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
                <strong>Edit Profile</strong>
                <div class="profile-edit pt-3">

                  <!-- Profile Edit Form -->
                  <form method="post" action="{{route('profile-service-admin.update', $admin->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : ''}}" id="name" value="{{$admin->name}}">
                        @if($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : ''}}" id="Email" value="{{$admin->email}}">
                        @if($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : ''}}" id="password">
                        @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : ''}}" id="password_confirmation">
                        @if($errors->has('password_confirmation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                      @endif
                      </div>
                    </div>

                    <div>
                      <button class="btn btn-primary" type="submit" id="profile-update">
                        <span id="profile-update-text">
                          Update Changes
                        </span>
                      </button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              <!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
</section>
@endsection