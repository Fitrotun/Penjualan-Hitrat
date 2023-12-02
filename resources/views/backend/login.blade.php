<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Hitrat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/asset/css/style.css">

	</head>
	<body ">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
          <br>
          <br>
        <h4 style="color: #fff;">Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(assets/img/logoo.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
			      	</div>
                @if(session('error_email'))
                          <div class="alert alert-danger my-4">
                              {{ session('error_email') }}
                              </div>
                          @endif
                          
                          @if(session('error_password'))
                          <div class="alert alert-danger my-4">
                              {{ session('error_password') }}
                          </div>
                          @endif
              <form class="pt-3" method="post" action="/login">
                  @csrf
                <div class="form-group">
                  <input name="email" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect2">Select Role</label>
                  <select class="form-control" id="exampleFormControlSelect2" name="role">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                </div>
                <p>
                  Belum punya akun?
                  <a href="/register">silakan Sign up.</a>
                </p>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                </div>
              </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="/asset/js/jquery.min.js"></script>
  <script src="/asset/js/popper.js"></script>
  <script src="/asset/js/bootstrap.min.js"></script>
  <script src="/asset/js/main.js"></script>

	</body>
</html>


