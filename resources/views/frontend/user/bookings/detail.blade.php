@extends('frontend.layouts.app')
@section('title', 'Booking | Detail')
@section('content')
<section class="">
  <div class="container">
    <div class="row">
      @include('frontend.user.sidebar')
      <div class="col-lg-9 col-md-8 p-5">
        <h3 class="text-center">Booking Details</h3>
        <section>
              <h4 class="mb-3">Booking Info</h4>
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <strong>Created_at</strong> 
                  <p>
                    {{$booking->created_at->format('Y-m-d')}}
                  </p>
                </div>
                <div class="col-lg-4 col-md-6">
                  <strong>Booking Date</strong>
                  <p>
                    {{$booking->book_date}}
                  </p>
                </div>
                <div class="col-lg-4 col-md-6">
                  <strong>Time</strong>
                  <p>
                    {{$booking->book_time}}
                  </p>
                </div>
                <div class="col-lg-4 col-md-6">
                  <strong>Status</strong>
                  <p>
                    {{ucfirst($booking->status)}}
                  </p>
                </div>
              </div>
            </section>
        <section class="mt-5">
          <h4 class="mb-5">Personal Info</h4>
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <strong>Name</strong>
              <p>
                {{ucfirst($booking->name)}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Email</strong>
              <p>
                {{$booking->email}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Contact Number</strong>
              <p>
                {{$booking->phone}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Address</strong> 
              <p>
                {{$booking->address}}
              </p>
            </div>
          </div>
        </section>
        <section class="my-5">
          <h4 class="mb-5">Vehicle Info</h4>
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <strong>Name</strong>
              <p>
                {{ucfirst($booking->vehicle->name)}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Model</strong>
              <p>
                {{ucfirst($booking->vehicle->model)}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Year</strong>
              <p>
                {{$booking->vehicle->year}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Color</strong>
              <p>
                {{ucfirst($booking->vehicle->color)}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Registration Number</strong>
              <p>
                {{ucfirst($booking->vehicle->registration_number)}}
              </p>
            </div>
          </div>
        </section>
        <section class="my-5">
          <h4 class="mb-5">Service Info</h4>
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <strong>Title</strong>
              <p>
                {{ucfirst($booking->service->title)}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Price</strong>
              <p>
                {{$booking->service->price}} PKR
              </p>
            </div>
          </div>
        </section>
        <section class="mt-5">
          <h4 class="mb-5">Mechanic Info</h4>
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <strong>Name</strong>
              <p>
                {{ucfirst($booking->service->staff ? $booking->service->staff->name : 'Not Available')}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Contact Number</strong>
              <p>
                {{$booking->service->staff ? $booking->service->staff->phone : 'Not Available'}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Address</strong> 
              <p>
                {{$booking->service->staff ? $booking->service->staff->address : 'Not Available'}}
              </p>
            </div>
          </div>
        </section>
        <section class="mt-5">
          <h4 class="mb-5">Service Station Info</h4>
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <strong>Name</strong>
              <p>
                {{ucfirst($booking->service->serviceStation->name)}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Contact Number</strong>
              <p>
                {{$booking->service->serviceStation->phone}}
              </p>
            </div>
            <div class="col-lg-4 col-md-6">
              <strong>Location</strong> 
              <p>
                {{$booking->service->serviceStation->location}}
              </p>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div> 
</section>
@endsection