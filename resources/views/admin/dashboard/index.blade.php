@extends('admin.layouts.app')
@section('title','Admin | Dashboard')
@section('content')


    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">

            
            <div class="col-lg-4 col-md-6">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Total User</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$user}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Total Service Stations</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-wrench"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$stations}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

      </div>
    </section>
@endsection