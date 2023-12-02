	<!-- header -->
	{{-- <div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
								<img src="assets/img/fot-log.png" alt="">
							</a>
						</div> --}}
	<!-- menu start -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3" style="background-color: #fff;">
		<div class="container-fluid mx-lg-5">
			<img src="assets/img/fot-log.png" alt="Logo" width="50" class="d-inline-block align-text-top" href="#">
		  {{-- <a class="navbar-brand" href="#"></a>
		  <button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNav"
			aria-controls="navbarNav"
			aria-expanded="false"
			aria-label="Toggle navigation"> --}}
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
				  <a href="{{ url('/') }}" class="nav-link text-dark {{ request()->is('/') ? ' active-link' : '' }}">
					  <span>Beranda</span>
				  </a>
				</li>
				<li class="nav-item">
				  <a class="nav-link text-dark" href="/about">Tentang</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link text-dark" href="/produk">Produk</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="/contact">Kontak</a>
				</li>
				<li class="nav-item" {{ session('isLogin')?"style=display:none":"" }}>
				  <a class="nav-link text-dark" href="/login">Login</a>
				</li>
				<li class="nav-item" {{ session('isLogin')?"style=display:none":"" }}>
				  <a class="nav-link text-dark" href="/register">Register</a>
				</li>
			  <li class="nav-item dropdown" {{ session('isLogin')?"":"style=display:none" }}>
				<a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					Welcome, {{ session('name') }}
				</a>
				@if ( session('role')== "user" ? "" : "style=display:none" )
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <li><a class="dropdown-item" href="/dashboard">Dashbord</a></li>
				  <li><a class="dropdown-item" href="/logout">Logout</a></li>
				</ul>
				@else
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <li>
					<?php
					  $cart_utama = \App\Models\Cart::where('id_user', session('id'))->where('status',0)->first();
					  if(!empty($cart_utama))
					  {
						$notif = \App\Models\Transaction::where('id_cart', $cart_utama->id)->count();
					  }
					?>
					<a class="dropdown-item" href="{{ url('check-out') }}"><i class="fas fa-shopping-cart"></i>
						Keranjang
						@if(!empty($notif))
						  <span class="badge badge-danger">{{ $notif }}</span>
						@endif
					</a>
				  </li>
				  <li><a class="dropdown-item" href="/history">Riwayat</a></li>
				  <li><a class="dropdown-item" href="/logout">Logout</a></li>
				</ul>
				@endif
			  </li>
			  <li>
				<div class="header-icons">
					<a class="text-dark" href="/faq"><i class="fas fa-question"></i></a>
				</div>
			</li>
			</ul>
		  </div>
		</div>
	  </nav>
	
	{{-- <nav class="main-menu">
		<ul>
			<li><a href="/" class="text-dark">Beranda</a>
				
			</li>
			<li><a href="/about" class="text-dark">Tentang</a></li>
			<li><a href="/produk" class="text-dark">Produk</a></li>
			<li><a href="/contact" class="text-dark">Kontak</a></li>
			<li class="nav-item" {{ session('isLogin')?"style=display:none":"" }}>
					<a class="nav-link text-dark" href="/login">Login</a>
			</li>
			
			<li class="nav-item" {{ session('isLogin')?"style=display:none":"" }}>
				<a class="nav-link text-dark" href="/register">Register</a>
			</li>
			<li class="nav-item dropdown" {{ session('isLogin')?"":"style=display:none" }}>
				<a class="nav-link text-dark dropdown-toggle" href="/dashboard" role="button" data-bs-toggle="dropdown-menu" aria-expanded="false">
					Welcome, {{ session('name') }}
				</a>
				@if ( session('role')== "user" ? "" : "style=display:none" )
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="/dashboard">Dashbord</a></li>
					<li><a class="dropdown-item" href="/logout">Logout</a></li>
				</ul>
				@else
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li>
					
					<a class="dropdown-item" href="{{ url('check-out') }}"><i class="fas fa-shopping-cart"></i>
						Keranjang
						@if(!empty($notif))
						<span class="badge badge-danger">{{ $notif }}</span>
						@endif
					</a>
				</li>
					  	<li><a class="dropdown-item" href="/history">Riwayat</a></li>
				  		<li><a class="dropdown-item" href="/logout">Logout</a></li>
				</ul>
				@endif
			</li>
				
								
			<li>
				<div class="header-icons">
					<a class="text-dark" href="/faq"><i class="fas fa-question"></i></a>
				</div>
			</li>
		</ul>
		
	</nav> --}}
	
	
	<!-- menu end -->
{{-- </div>
</div>
</div>
</div>
</div> --}}
<!-- end header -->
	

					