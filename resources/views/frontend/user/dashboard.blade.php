@extends('frontend.layouts.app')
@section('title', 'Dashboard')
@section('content')
<section>
	<div class="container">
		<div class="row">
			@include('frontend.user.sidebar')
			<div class="col-lg-9 col-md-8 p-5" style="min-height: 55vh;">
        <div class="row">
              <div class="col-lg-4 col-md-6">
                <div class="card info-card">
                  <div class="card-body">
                    <h5 class="card-title">Total Vehicles</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-car-front"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$vehicles}}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="card info-card">
                  <div class="card-body">
                    <h5 class="card-title">Total Bookings</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-calendar-check"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$bookings}}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
			</div>
		</div>
	</div>
	
</section>
@endsection