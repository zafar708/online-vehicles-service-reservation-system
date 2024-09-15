@extends('frontend.layouts.app')
@section('title', 'Service Station | '.$station->name)
@section('content')
<div class="container">
	<section class="mt-5">
		<h3 class="mb-5">Service Station Info</h3>
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<strong>Name</strong>
				<p>
					{{ucfirst($station->name)}}
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Contact Number</strong>
				<p>
					{{$station->phone}}
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Location</strong> 
				<p>
					{{$station->location}}
				</p>
			</div>
		</div>
	</section>
	<section class="mt-5">
		<h3 class="mb-5">Staff Info</h3>
		@if(count($station->staff) > 0)
		@foreach($station->staff as $staf)
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<strong>Name</strong>
				<p>
					{{ucfirst($staf->name)}}
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Contact Number</strong>
				<p>
					{{$staf->phone}}
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Address</strong> 
				<p>
					{{$staf->address}}
				</p>
			</div>
		</div>
		@endforeach
		@else
		<h4>Staff not avaiable</h4>
		@endif
	</section>
	<section class="my-5">
		<h3 class="mb-5">Offered Services</h3>
		@if(count($station->staff) > 0)
		@foreach($station->services as $service)
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<strong>Title</strong>
				<p>
					{{ucfirst($service->title)}}
				</p>
			</div>
			<div class="col-lg-3 col-md-6">
				<strong>Price</strong>
				<p>
					{{$service->price}} PKR
				</p>
			</div>
			<div class="col-lg-3 col-md-6">
				<strong>Mechanic</strong> 
				<p>
					{{$service->staff ? $service->staff->name : 'Not Available'}}
				</p>
			</div>
			<div class="col-lg-3 col-md-6">
				<a href="{{route('service-booking-request', $service->slug)}}" class="btn btn-primary">Book Service</a>
			</div>
		</div>
		@endforeach
		@else
		<h4>Service(s) not avaiable</h4>
		@endif
	</section>
</div>

@endsection