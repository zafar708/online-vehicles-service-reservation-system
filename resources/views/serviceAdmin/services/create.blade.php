@extends('serviceAdmin.layouts.app')
@section('title','Service Station Admin | Add Service')
@section('content')
<div class="pagetitle">
  <h1>Add Service</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('service-dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Add Service</li>
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
                <h4>Add Service</h4>
              </div>
              <div>
                <a href="{{route('services.index')}}" class="btn btn-success"><i class="bi bi-eye"></i> Services</a>
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
            <form action="{{route('services.store')}}" method="post">
              @csrf
              <div class="row p-4">
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Title*</label>
                    <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                    placeholder="Enter title" type="text" name="title" value="{{old('title')}}" required>
                    @if($errors->has('title'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Price*</label>
                    <input class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}"
                    placeholder="Enter price" type="number" name="price" value="{{old('price')}}" min="1" required>
                    @if($errors->has('price'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Service Station</label>
                    <select class="form-control {{ $errors->has('service_station_id') ? 'is-invalid' : ''}}" name="service_station_id" id="station" required>
                      <option label="Select"></option>
                      @foreach($stations as $station)
                        <option value="{{$station->id}}" @if(old('service_station_id') == $station->id) selected @endif>{{$station->name}}</option>
                      @endforeach
                    </select>
                    @if($errors->has('service_station_id'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('service_station_id') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6 mt-3">
                  <div class="form-group">
                    <label class="form-label">Mechanic</label>
                    <select class="form-control {{ $errors->has('staff_id') ? 'is-invalid' : ''}}" name="staff_id" id="staff" required>
                    </select>
                    @if($errors->has('staff_id'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('staff_id') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-12 my-3">
                  <button class="btn btn-primary" type="submit">Save</button>
                </div>

              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#station').change(function () {
      var station_id = $(this).val();
        $.ajax({
          type: 'get',
          url: "{{route('get-staff')}}",
          data: {'station_id':station_id},
          dataType: 'json',
          success: function (data) {
            $("#staff").html(data);
          }
        });
    });
  });
</script>
@endsection