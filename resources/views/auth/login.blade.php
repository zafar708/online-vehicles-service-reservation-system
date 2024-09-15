@extends('frontend.layouts.app')
@section('title', 'Login')
@section('content')
<section class="my-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <h2 class="mb-5">Login</h2>
        <form method="post" action="{{route('post-login')}}">
          <div class="row g-3">
            @csrf
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Login as:</label>
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
                <label class="form-label">Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                placeholder="Enter your email" type="email" name="email" required>
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
              <a href="{{route('forgot-password')}}">Forgot Password ?</a>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>
          </div>
        </form>
        <div class="mt-3">
          Don't have an account ?  <a href="{{route('register')}}">Register</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection