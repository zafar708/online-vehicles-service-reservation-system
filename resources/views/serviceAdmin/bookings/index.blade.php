@extends('serviceAdmin.layouts.app')
@section('title','Service Admin | Bookings')
@section('content')
<div class="pagetitle">
  <h1>All bookings</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('service-dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Bookings</li>
    </ol>
  </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">
            Bookings List
            </h5>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="border border-2">
                    <th>#</th>
                    <th>Created_at</th>
                    <th>Booking Date</th>
                    <th>Time</th>
                    <th>Customer Name</th>
                    <th>Vehicle Name</th>
                    <th>Service Title</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($bookings) > 0)
                  @foreach($bookings as $index => $booking)
                  <tr>
                    <td>{{++$index}}</td>
                    <td>{{$booking->created_at->format('Y-m-d')}}</td>
                    <td>{{$booking->book_date}}</td>
                    <td>{{$booking->book_time}}</td>
                    <td>{{ucfirst($booking->name)}}</td>
                    <td>{{ucfirst($booking->vehicle->name)}}</td>
                    <td>{{ucfirst($booking->service->title)}}</td>
                    <td>
                      <select class="w-100 border-0 p-2 bg-light" onchange="location = this.value;" aria-label="Default select example">
                        <option value="{{route('booking-status',$booking->id)}}?status=pending" @if($booking->status == 'pending') selected @endif>Pending</option>
                        <option value="{{route('booking-status',$booking->id)}}?status=cancelled"  @if($booking->status == 'cancelled') selected @endif>Cancelled</option>
                        <option value="{{route('booking-status',$booking->id)}}?status=confirmed" @if($booking->status == 'confirmed') selected @endif>Confirmed</option>
                        <option value="{{route('booking-status',$booking->id)}}?status=completed"  @if($booking->status == 'completed') selected @endif>Completed</option>
                      </select>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-success" href="{{route('booking-show',$booking->id)}}">
                        <i class="bi bi-eye"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr class="text-center">
                    <td colspan="9" class="text-center">
                      No Booking Available
                    </td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">{{$bookings->links()}}</div>
  </section>
  @endsection