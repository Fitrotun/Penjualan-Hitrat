<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/asset/css/style.css">
  <title> Register </title>
  
</head>

<body style="background: url({{ asset('assets/images/bg_login.png')}})">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-white text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <center><img src="{{ asset('assets/img/fot-log.png')}}" style="width: 200px;" alt="logo"></center>
              </div> 
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign up to continue.</h6>
              <form class="pt-3" method="post" action="/register">
                  @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control form-control-lg  @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Name">
                    @error('name')
                        <div id="Name" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <input name="email" type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email">
                  @error('email')
                        <div id="Name" class="form-text">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                  @error('password')
                    <div id="Name" class="form-text">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                    <input name="alamat" type="text" class="form-control form-control-lg @error('alamat') is-invalid @enderror" id="exampleInputalamat1" placeholder="alamat">
                    @error('alamat')
                      <div id="Name" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input name="noHp" type="text" class="form-control form-control-lg @error('noHp') is-invalid @enderror" id="exampleInputnoHp1" placeholder="noHp">
                    @error('noHp')
                      <div id="Name" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Select Role</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="role">
                      <option value="user">User</option>
                    </select>
                  </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenisKelamin" id="jenisKelamin1" value="0" checked>
                            Laki-laki
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenisKelamin" id="jenisKelamin2" value="1">
                            Perempuan
                          </label>
                        </div>
                </div>
                <p>
                  Sudah punya akun?
                  <a href="/login" class="text-primary">silahkan Sign in.</a>
                </p>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  
  <!-- endinject -->
</body>

</html>
