@extends('frontend.layouts.app')
@section('title', 'Register')
@section('content')
<section class="my-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <h2 class="mb-5">Register</h2>
        <form method="post" action="{{route('post-register')}}">
          <div class="row g-3">
            @csrf
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Register as:</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : ''}}" name="type" required>
                  <option label="Select"></option>
                  <option value="user" @if(old('type') == 'user') selected @endif>User</option>
                  <option value="serviceAdmin" @if(old('type') == 'serviceAdmin') selected @endif>Service Station Admin</option>
                </select>
                @if($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('type') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                placeholder="Enter your name" type="text" name="name" value="{{old('name')}}" required>
                @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                placeholder="Enter your email" type="email" name="email" value="{{old('email')}}" required>
                @if($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Password</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                placeholder="Enter your password" type="password"
                name="password" required>
                @if($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                @if($errors->has('password_confirmation'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Register</button>
            </div>
          </div>
        </form>
        <div class="mt-3">
          Already have an account ?  <a href="{{route('login')}}">Login</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection