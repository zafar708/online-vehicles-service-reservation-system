@extends('frontend.layouts.app')
@section('title', 'Bookings')
@section('content')
<section class="">
  <div class="container">
    <div class="row">
      @include('frontend.user.sidebar')
      <div class="col-lg-9 col-md-8 p-5" style="min-height: 55vh;">
        <h3 class="mb-5">Bookings</h3>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="border border-2">
                <th>#</th>
                <th>Created_at</th>
                <th>Booking Date</th>
                <th>Time</th>
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
                <td>{{ucfirst($booking->vehicle->name)}}</td>
                <td>{{ucfirst($booking->service->title)}}</td>
                <td>
                  @if($booking->status != 'pending')
                  {{ucfirst($booking->status)}}
                  @else
                  <select class="w-100 border-0 p-2 bg-light" onchange="location = this.value;" aria-label="Default select example">
                    <option value="{{route('booking-update-status',$booking->id)}}?status=pending" @if($booking->status == 'pending') selected @endif>Pending</option>
                    <option value="{{route('booking-update-status',$booking->id)}}?status=cancelled"  @if($booking->status == 'cancelled') selected @endif>Cancelled</option>
                  </select>
                  @endif
                </td>

                <td>
                  <a class="btn btn-sm btn-success" href="{{route('booking-details',$booking->id)}}">
                    <i class="bi bi-eye"></i>
                  </a>
                </td>
              </tr>
              @endforeach
              @else
              <tr class="text-center">
                <td colspan="8" class="text-center">
                  No booking(s)
                </td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</section>
@endsection