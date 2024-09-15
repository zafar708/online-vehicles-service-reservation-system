@extends('frontend.layouts.app')
@section('title', 'Vehicles')
@section('content')
<section class="">
  <div class="container">
    <div class="row">
      @include('frontend.user.sidebar')
      <div class="col-lg-9 col-md-8 p-5" style="min-height: 55vh;">
        <h3 class="mb-5">Vehicles</h3>
        <a href="{{route('vehicles.create')}}" class="btn btn-primary mb-5"><i class="bi bi-plus"></i> Add Vehicle</a>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="border border-2">
                <th>#</th>
                <th>Name</th>
                <th>Model</th>
                <th>Color</th>
                <th>Year</th>
                <th>Registration Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($vehicles) > 0)
              @foreach($vehicles as $index => $vehicle)
              <tr>
                <td>{{++$index}}</td>
                <td>{{ucfirst($vehicle->name)}}</td>
                <td>{{ucfirst($vehicle->model)}}</td>
                <td>{{ucfirst($vehicle->color)}}</td>
                <td>{{ucfirst($vehicle->year)}}</td>
                <td>{{ucfirst($vehicle->registration_number)}}</td>
                <td>
                  <a class="btn btn-sm btn-info" href="{{route('vehicles.edit',$vehicle->id)}}">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a class="btn btn-sm btn-danger"  href="javascript:void(0);" onclick="$(this).find('form').submit();">
                    <i class="bi bi-trash"></i>
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="post" onsubmit="return confirm('Do you really want to delete this?');">
                      @csrf
                      @method('delete')
                    </form>
                  </a>
                </td>
              </tr>
              @endforeach
              @else
              <tr class="text-center">
                <td colspan="7" class="text-center">
                  No Vehicle(s) Added
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