@extends('frontend.layouts.app')
@section('title', 'Service Booking Request Form')
@section('content')
<div class="container">
	<div class="my-5">
		<h3>Service Booking Request Form</h3>
		<form action="{{route('book-service')}}" method="post">
			<div class="row">
            @csrf
            <input type="hidden" name="service_id" value="{{$service->id}}">
            <input type="hidden" name="service_admin_id" value="{{$service->user_id}}">
            <div class="col-lg-6 mt-4">
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
            <div class="col-lg-6 mt-4">
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
            <div class="col-lg-6 mt-4">
              <div class="form-group">
                <label class="form-label">Contact Number</label>
                <input class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                placeholder="Enter your phone" type="text" name="phone" required>
                @if($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-4">
              <div class="form-group">
                <label class="form-label">Address</label>
                <input class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                placeholder="Enter your address" type="text" name="address" required>
                @if($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-4">
              <div class="form-group">
                <label class="form-label">Date</label>
                <input class="form-control {{ $errors->has('book_date') ? ' is-invalid' : '' }}"
                placeholder="Date" type="date" name="book_date" required>
                @if($errors->has('book_date'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('book_date') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-4">
              <div class="form-group">
                <label class="form-label">Time</label>
                <select class="form-control {{ $errors->has('book_time') ? 'is-invalid' : ''}}" name="book_time" required>
                  <option label="Select"></option>
                  <option value="12:00 AM">12:00 AM</option>
                  <option value="01:00 AM">01:00 AM</option>
                  <option value="02:00 AM">02:00 AM</option>
                  <option value="03:00 AM">03:00 AM</option>
                  <option value="04:00 AM">04:00 AM</option>
                  <option value="05:00 AM">05:00 AM</option>
                  <option value="06:00 AM">06:00 AM</option>
                  <option value="07:00 AM">07:00 AM</option>
                  <option value="08:00 AM">08:00 AM</option>
                  <option value="09:00 AM">09:00 AM</option>
                  <option value="10:00 AM">10:00 AM</option>
                  <option value="11:00 AM">11:00 AM</option>
                  <option value="12:00 PM">12:00 PM</option>
                  <option value="01:00 PM">01:00 PM</option>
                  <option value="02:00 PM">02:00 PM</option>
                  <option value="03:00 PM">03:00 PM</option>
                  <option value="04:00 PM">04:00 PM</option>
                  <option value="05:00 PM">05:00 PM</option>
                  <option value="06:00 PM">06:00 PM</option>
                  <option value="07:00 PM">07:00 PM</option>
                  <option value="08:00 PM">08:00 PM</option>
                  <option value="09:00 PM">09:00 PM</option>
                  <option value="10:00 PM">10:00 PM</option>
                  <option value="11:00 PM">11:00 PM</option>
                    
                </select>
                @if($errors->has('book_time'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('book_time') }}</strong>
                </span>
                @endif
              </div>
            </div>
            @php
              $vehicles = \App\Models\Vehicle::where('user_id', Auth::id())->latest()->get();
            @endphp
            <div class="col-lg-6 mt-4">
              <div class="form-group">
                <label class="form-label">Vehicle Name</label>
                <select class="form-control {{ $errors->has('vehicle_id') ? 'is-invalid' : ''}}" name="vehicle_id" required>
                  <option label="Select"></option>
                  @foreach($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}" @if(old('vehicle_id') == $vehicle->id) selected @endif>{{$vehicle->name}}</option>
                  @endforeach
                </select>
                @if($errors->has('vehicle_id'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('vehicle_id') }}</strong>
                </span>
                @endif
                @if(count($vehicles) < 1)
                <span class="fw-bold text-danger">Please add vehicle(s) from dashboard to send booking request</span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-4">
              <div class="form-group">
                <label class="form-label">Service Title</label>
                <input type="text" class="form-control {{ $errors->has('service') ? ' is-invalid' : '' }}" name="service" value="{{$service->title}}" readonly>
                @if($errors->has('service'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('service') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-4">
              <div class="form-group">
                <label class="form-label">Price</label>
                <input type="text" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{$service->price}} PKR" readonly>
                @if($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-lg-6 mt-4">
              <div class="form-group">
                <label class="form-label">Service Station</label>
                <input type="text" class="form-control {{ $errors->has('service_station') ? ' is-invalid' : '' }}" name="service_station" value="{{$service->serviceStation->name}}" readonly>
                @if($errors->has('service_station'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('service_station') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-4">
              <button class="btn btn-primary" type="submit">Send Booking Request</button>
            </div>
		</form>
	</div>

</div>

@endsection