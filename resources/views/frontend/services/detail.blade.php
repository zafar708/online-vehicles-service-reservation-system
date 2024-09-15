@extends('frontend.layouts.app')
@section('title', 'Service | '.$service->title)
@section('content')
<div class="container">
	<section class="mt-5">
		<h3 class="mb-2">Service Info</h3>
		<a href="{{route('service-booking-request', $service->slug)}}" class="btn btn-primary">Book Service</a>
		<div class="row mt-3">
			<div class="col-lg-4 col-md-6">
				<strong>Title</strong>
				<p>
					{{ucfirst($service->title)}}
				</p>
			</div>
			@php
				$rating = $service->ratings;
				if(count($rating) > 0)
				{
					$rating = $rating->sum('rate') / count($rating);
				}
				else
				{
					$rating = 0;
				}
			@endphp
			<div class="col-lg-4 col-md-6">
				<strong>Ratings</strong>
				<p>
					@if($rating > 0)
						{{number_format($rating, 2)}}+ 
					@else 
						Not Avaiable 
					@endif
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Price</strong>
				<p>
					{{$service->price}} PKR
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Mechanic</strong> 
				<p>
					{{$service->staff ? $service->staff->name : 'Not Available'}}
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Mechanic Contact Number</strong>
				<p>
					{{$service->staff ? $service->staff->phone : 'Not Available'}}
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Mechanic Address</strong> 
				<p>
					{{$service->staff ? $service->staff->address : 'Not Available'}}
				</p>
			</div>
		</div>
	</section>
	<section class="my-5">
		<h3 class="mb-5">Service Station Info</h3>
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<strong>Name</strong>
				<p>
					{{ucfirst($service->serviceStation->name)}}
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Contact Number</strong>
				<p>
					{{$service->serviceStation->phone}}
				</p>
			</div>
			<div class="col-lg-4 col-md-6">
				<strong>Location</strong> 
				<p>
					{{$service->serviceStation->location}}
				</p>
			</div>
		</div>
	</section>
</div>

@endsection