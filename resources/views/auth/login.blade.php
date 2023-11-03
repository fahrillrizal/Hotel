<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Login | {{config('app.name')}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page bg-dark">
  @if(Session::has('success'))
  <div class="alert alert-success">
    {{Session::get('success')}}
  </div>
  @endif
  <div class="login-box">
    <div class="login-logo">
      <a href="{{url('/')}}" style="color: white;"><b>PIN</b>TU</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body bg-dark">
        <p class="login-box-msg">Masukkan Email dan Password Anda</p>

        <form action="?" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid':'' }}" value="{{old('email')}}" placeholder="Email" autofocus autocomplete="off" required>
            <div class="input-group-append">
              <div class="input-group-text bg-dark">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <div class="invalid-feedback">Masukkan Email yang terdaftar</div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid':'' }}" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text bg-dark">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <div class="invalid-feedback">Masukkan Password dengan benar</div>
            @enderror
          </div>
          <!-- register -->
          <div class="row">
            <div class="col-8">
              <a href="register" class="text-center">Belum memiliki akun?</a>
            </div>

            <!-- <div class="row">
            <div class="col-8">
              <a href="forgot-password" class="text-center">Lupa Password?</a>
            </div> -->
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-success btn-block">
                <i class="fas fa-sign-in-alt"></i> Login
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>