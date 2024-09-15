@extends('serviceAdmin.layouts.app')
@section('title','Service staff Admin | Staff')
@section('content')
<div class="pagetitle">
  <h1>All Staff</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('service-dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Staff</li>
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
                <h4>Staff</h4>
              </div>
              <div>
                <a href="{{route('staff.create')}}" class="btn btn-primary"><i class="bi bi-plus"></i> Add Staff</a>
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
            Staff List
            </h5>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="border border-2">
                    <th>#</th>
                    <th>Name</th>
                    <th>Service Station</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($staffs) > 0)
                  @foreach($staffs as $index => $staff)
                  <tr>
                    <td>{{++$index}}</td>
                    <td>{{ucfirst($staff->name)}}</td>
                    <td>{{ucfirst($staff->serviceStation ? $staff->serviceStation->name : '-')}}</td>
                    <td>{{$staff->phone}}</td>
                    <td>{{$staff->address}}</td>
                    <td>
                      <a class="btn btn-sm btn-info" href="{{route('staff.edit',$staff->id)}}">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a class="btn btn-sm btn-danger"  href="javascript:void(0);" onclick="$(this).find('form').submit();">
                        <i class="bi bi-trash"></i>
                        <form action="{{ route('staff.destroy', $staff->id) }}" method="post" onsubmit="return confirm('Do you really want to delete this?');">
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
                      No Staff Available
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
    <div class="d-flex justify-content-center">{{$staffs->links()}}</div>
  </section>
  @endsection