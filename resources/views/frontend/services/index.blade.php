@extends('frontend.layouts.app')
@section('title', 'Services')
@section('content')
<!-- Services -->
<section class="my-5">
	<div class="container">
		@if(session('rating_message'))
	    <div class="mt-5 alert alert-success alert-dismissible fade show" role="alert">
	      {{session('rating_message')}}
	      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	    </div>
  		@endif
		<h2>Our Services</h2>
		<div class="row">
			@foreach($services as $service)
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
			<div class="col-lg-4 col-md-6 mt-5">
				<div class="card">
				  <div class="card-body">
				    <h5 class="card-title">{{ucfirst($service->title)}}</h5>
				    <p class="card-title">Ratings: <span class="card-text">@if($rating > 0) {{number_format($rating, 2)}}+ @else Not Available @endif </span></p>
				    <p class="card-title">Price: <span class="card-text">{{$service->price}} PKR</span></p>
				    <p class="card-title">Mechanic: <span class="card-text">{{$service->staff ? $service->staff->name : 'Not Available'}}</span></p>
				    <form action="{{ route('service-rating', $service->id) }}" method="POST" class="d-inline-flex align-items-center">
				        @csrf
				        <label for="rating">Rate service:</label>
				        <select name="rate" class="p-1 rounded border-primary ms-2">
				            <option value="1">1</option>
				            <option value="2">2</option>
				            <option value="3">3</option>
				            <option value="4">4</option>
				            <option value="5">5</option>
				        </select>
				        <button class="ms-2 btn btn-outline-primary p-1" type="submit">Submit</button>
				    </form>
				    <div class="mt-3">
				    	<a href="{{route('service-booking-request', $service->slug)}}" class="card-link">Book Service</a>
				    	<a href="{{route('service-detail', $service->slug)}}" class="card-link">Detail</a>
				    </div>
				  </div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection