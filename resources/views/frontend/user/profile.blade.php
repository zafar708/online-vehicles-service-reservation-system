@extends('frontend.layouts.app')
@section('title', 'My Profile')
@section('content')
<section>
	<div class="container">
		<div class="row">
			@include('frontend.user.sidebar')
			<div class="col-lg-9 col-md-8 p-5">
				<h3>My Profile</h3>
				<form method="post" action="{{route('update-profile')}}">
          <div class="row g-3 mt-4">
            @csrf
            <div class="col-lg-6 mt-3">
              <div class="form-group">
                <label class="form-label">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                placeholder="Enter your name" type="text" name="name" value="{{Auth::user()->name}}" required>
                @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-3">
              <div class="form-group">
                <label class="form-label">Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                placeholder="Enter your email" type="email" name="email" value="{{Auth::user()->email}}" required>
                @if($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-3">
              <div class="form-group">
                <label class="form-label">Password</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                placeholder="Enter your password" type="password"
                name="password">
                @if($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-3">
              <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                @if($errors->has('password_confirmation'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-3">
              <button class="btn btn-primary" type="submit">Update</button>
            </div>
          </div>
        </form>
			</div>
		</div>
	</div>
	
</section>
@endsection