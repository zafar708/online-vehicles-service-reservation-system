@extends('serviceAdmin.layouts.app')
@section('title','Service Station Admin | Service Stations')
@section('content')
<div class="pagetitle">
  <h1>All Service Stations</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('service-dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Service Stations</li>
    </ol>
  </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-4">
            <div class="d-flex justify-content-between">
              <div>
                <h4>Service Stations</h4>
              </div>
              <div>
                <a href="{{route('serviceStations.create')}}" class="btn btn-primary"><i class="bi bi-plus"></i> Add Service Station</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">
            Service Station List
            </h5>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="border border-2">
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($stations) > 0)
                  @foreach($stations as $index => $station)
                  <tr>
                    <td>{{++$index}}</td>
                    <td>{{ucfirst($station->name)}}</td>
                    <td>{{$station->phone}}</td>
                    <td>{{$station->location}}</td>
                    <td>{{ucfirst($station->status)}}</td>
                    <td>
                      <a class="btn btn-sm btn-info" href="{{route('serviceStations.edit',$station->id)}}">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a class="btn btn-sm btn-danger"  href="javascript:void(0);" onclick="$(this).find('form').submit();">
                        <i class="bi bi-trash"></i>
                        <form action="{{ route('serviceStations.destroy', $station->id) }}" method="post" onsubmit="return confirm('Do you really want to delete this?');">
                          @csrf
                          @method('delete')
                        </form>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr class="text-center">
                    <td colspan="6" class="text-center">
                      No Service Station Available
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
    <div class="d-flex justify-content-center">{{$stations->links()}}</div>
  </section>
  @endsection