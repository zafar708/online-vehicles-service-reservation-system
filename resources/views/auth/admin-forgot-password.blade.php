<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin | Forgot Password</title>
    <!-- Favicons -->
    <link
      rel="apple-touch-icon"
      sizes="72x72"
      href="{{asset('frontend/assets/images/favicon.png')}}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      h
      href="{{asset('frontend/assets/images/favicon.png')}}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{asset('frontend/assets/images/favicon.png')}}"
    />
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet">
  </head>
  <body>
    <main>
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column justify-content-center">
                <div class="d-flex justify-content-center py-4">
                    <h3 class="d-none d-lg-block">Forgot Password</h3>
                  </div><!-- End Logo -->
                  
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="pt-4 pb-2">
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{session('error')}}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{session('success')}}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                      </div>
                      <form class="row g-3" method="post" action="{{route('admin-forgot-password')}}">
                        @csrf
                        <div class="col-12">
                          <div class="form-group">
                            <label class="form-label">Email</label>
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                            placeholder="Enter your email" type="email" name="email" required>
                            @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                          </div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Send</button>
                        </div>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </main>
      <script src="{{asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Template Main JS File -->
      <script src="{{asset('backend/assets/js/main.js')}}"></script>
  </body>
</html>