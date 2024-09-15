@extends('serviceAdmin.layouts.app')
@section('title','Service Admin | Booking Detail')
@section('content')
<div class="pagetitle">
  <h1>All bookings</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('service-dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Booking Detail</li>
    </ol>
  </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-5">
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
            <section>
              <h4 class="mb-3">Customer Info</h4>
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
            <section class="my-3">
              <h4 class="mb-3">Vehicle Info</h4>
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
            <section class="my-3">
              <h4 class="mb-3">Service Info</h4>
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
              <h4 class="mb-3">Mechanic Info</h4>
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
              <h4 class="mb-3">Service Station Info</h4>
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
    </div>
  </section>
  @endsection