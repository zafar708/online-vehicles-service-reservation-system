@extends('frontend.layouts.app')
@section('title', 'Update Password')
@section('content')
<section class="my-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <h2 class="mb-5">Update Password</h2>
        <form method="post" action="{{route('update-password')}}">
          <div class="row g-3">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
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
              <button class="btn btn-primary w-100" type="submit">Update Password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection