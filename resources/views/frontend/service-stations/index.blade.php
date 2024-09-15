@extends('frontend.layouts.app')
@section('title', 'Service Stations')
@section('content')

<!-- Service Stations -->

<section class="my-5">
	<div class="container">
		<h2>Our Service Stations</h2>
		<div class="row">
			@foreach($stations as $station)
			<div class="col-lg-4 col-md-6 mt-5">
				<div class="card">
				  <div class="card-body">
				    <h5 class="card-title">{{ucfirst($station->name)}}</h5>
				    <p class="card-title">Contact No: <span class="card-text">{{$station->phone}}</span></p>
				    <p class="card-title">Location: <span class="card-text">{{$station->location}}</span></p>
				    <a href="{{route('station-detail', $station->slug)}}" class="card-link">Detail</a>
				  </div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection