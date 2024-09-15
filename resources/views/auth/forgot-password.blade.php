@extends('frontend.layouts.app')
@section('title', 'Forgot Password')
@section('content')
<section class="mt-5 bottom-margin">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <h2 class="mb-5">Forgot Password</h2>
        <form method="post" action="{{route('forgot-password')}}">
          <div class="row g-3">
            @csrf
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
              <button class="btn btn-primary w-100" type="submit">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection