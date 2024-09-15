@extends('serviceAdmin.layouts.app')
@section('title','Service Admin | Services')
@section('content')
<div class="pagetitle">
  <h1>All Services</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('service-dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Services</li>
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
                <h4>Services</h4>
              </div>
              <div>
                <a href="{{route('services.create')}}" class="btn btn-primary"><i class="bi bi-plus"></i> Add Service</a>
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
            Services List
            </h5>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="border border-2">
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Mechanic</th>
                    <th>Service Station</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($services) > 0)
                  @foreach($services as $index => $service)
                  <tr>
                    <td>{{++$index}}</td>
                    <td>{{ucfirst($service->title)}}</td>
                    <td>{{$service->price}}</td>
                    <td>{{$service->staff ? $service->staff->name : 'Not Available'}}</td>
                    <td>{{$service->serviceStation->name}}</td>
                    <td>
                      <a class="btn btn-sm btn-info" href="{{route('services.edit',$service->id)}}">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a class="btn btn-sm btn-danger"  href="javascript:void(0);" onclick="$(this).find('form').submit();">
                        <i class="bi bi-trash"></i>
                        <form action="{{ route('services.destroy', $service->id) }}" method="post" onsubmit="return confirm('Do you really want to delete this?');">
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
                      No Servcie Available
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
    <div class="d-flex justify-content-center">{{$services->links()}}</div>
  </section>
  @endsection