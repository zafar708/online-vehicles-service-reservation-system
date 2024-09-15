@extends('admin.layouts.app')
@section('title','Admin | Users')
@section('content')


    <div class="pagetitle">
      <h1>All Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        
            <div class="col-12">
              <div class="card">


                <div class="card-body">
                  <h5 class="card-title mb-4">
                    User List
                  </h5>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr class="border border-2">
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($users) > 0)
                        @foreach($users as $index => $user)
                        <tr>
                          <td>{{++$index}}</td>
                          <td>{{ucfirst($user->name)}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{ucfirst($user->type)}}</td>
                          <td>
                            <select class="w-100 border-0 p-2 bg-light" onchange="location = this.value;" aria-label="Default select example">
                              <option value="{{route('user-status', $user->id)}}?status=inactive" @if($user->status == 'inactive') selected @endif>Inactive</option>
                              <option value="{{route('user-status', $user->id)}}?status=active"  @if($user->status == 'active') selected @endif>Active</option>
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
      <div class="d-flex justify-content-center">{{$users->links()}}</div>
    </section>
@endsection