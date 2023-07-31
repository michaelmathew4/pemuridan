<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pemuridan | Masuk</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <style>
    
  </style>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Masuk</h5>
                    <p class="text-center small">Gunakan ID atau Alamat Surel & Kata Sandi Akun Anda.</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="{{ route('loginRequest') }}" method="post">
                    @csrf
                    <div class="col-12">
                      <label for="idLogin" class="form-label">ID atau Alamat Surel</label>
                      <div class="has-validation">
                        <input type="text" name="idOrEmail" class="form-control {{ $errors->has('idOrEmail') ? ' is-invalid' : '' }}" id="idLogin" value="{{ old('idOrEmail') }}" required>
                        @if ($errors->has('idOrEmail'))
                            <!-- <span class="invalid-feedback">
                                <strong>{{ $errors->first('idOrEmail') }}</strong>
                            </span> -->
                          <div class="alert alert-danger d-flex align-items-center alert-size mt-2 mb-0" role="alert">
                            <p class="" style="font-size: 10pt; p-1">
                              <i class="bi bi-exclamation-triangle-fill"></i>
                              {{ $errors->first('idOrEmail') }}
                            </p>
                          </div>
                        @endif
                      </div>
                    </div>

                    <div class="col-12">
                        <label for="kataSandi" class="form-label">Kata Sandi</label>
                      <div class="input-group">
                        <input type="password" name="password" class="form-control border border-end-0 {{ $errors->has('password') ? ' is-invalid' : '' }}" id="kataSandi" value="{{ old('password') }}" required>
                        <button class="btn btn-light border border-start-0 bg-transparent" type="button" id="togglePassword" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Kata Sandi"><i class="bi bi-eye-slash" id="togglePasswordOnOff"></i></button>
                      </div>
                      @if ($errors->has('password'))
                            <!-- <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> -->
                          <div class="alert alert-danger d-flex align-items-center alert-size mt-2 mb-0" role="alert">
                            <p class="" style="font-size: 10pt; p-1">
                              <i class="bi bi-exclamation-triangle-fill"></i>
                              {{ $errors->first('password') }}
                            </p>
                          </div>
                        @endif
                    </div>

                    <div class="col-12">
                      <p class="small text-end">Lupa Kata Sandi ?</p>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Masuk</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>
<script>
        const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#kataSandi');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            document.getElementById("togglePasswordOnOff").classList.toggle('bi-eye');
        });
    </script>

</html>