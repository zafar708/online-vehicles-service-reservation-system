@extends('frontend.layouts.app')
@section('title', 'Search')
@section('content')

<section class="my-5">
	<div class="container">
		@if(count($stations) > 0)
		<h2 class="mb-5">Your Search Results</h2>
		<div class="row">
			@foreach($stations as $station)
			<div class="col-lg-4 col-md-6">
				<div class="card">
				  <div class="card-body">
				    <h5 class="card-title">{{$station->name}}</h5>
				    <p class="card-text">Some quick example text to build on the Service and make up the bulk of the Service content.</p>
				    <a href="{{route('station-detail', $station->slug)}}" class="card-link">Detail</a>
				  </div>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="text-center text-danger search-margin">
			<h2>No Record Found! Search Again</h2>
		</div>
		@endif
	</div>
	<div class="d-flex justify-content-center">{{$stations->links()}}</div>
	
</section>
@endsection