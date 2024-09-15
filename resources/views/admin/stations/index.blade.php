@extends('admin.layouts.app')
@section('title','Admin | Service Stations')
@section('content')


    <div class="pagetitle">
      <h1>All Service Stations</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Service Stations</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
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
                          <th>Admin</th>
                          <th>Phone</th>
                          <th>Location</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($stations) > 0)
                        @foreach($stations as $index => $station)
                        <tr>
                          <td>{{++$index}}</td>
                          <td>{{ucfirst($station->name)}}</td>
                          <td>{{$station->user ? ucfirst($station->user->name) : '-'}}</td>
                          <td>{{$station->phone}}</td>
                          <td>{{$station->location}}</td>
                          <td>
                            <select class="w-100 border-0 p-2 bg-light" onchange="location = this.value;" aria-label="Default select example">
                              <option value="{{route('service-station-status', $station->id)}}?status=inactive" @if($station->status == 'inactive') selected @endif>Inactive</option>
                              <option value="{{route('service-station-status', $station->id)}}?status=active"  @if($station->status == 'active') selected @endif>Active</option>
                            </select>
                          </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="text-center">
                          <td colspan="4" class="text-center">
                            No Record Found
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