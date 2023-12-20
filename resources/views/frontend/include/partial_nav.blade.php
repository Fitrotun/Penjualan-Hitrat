
	<!-- menu start -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3" style="background-color: #fff;">
		<div class="container-fluid mx-lg-5">
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
				  <li><a class="dropdown-item" href="/dashboard"><i class="fa-solid fa-house"></i>  Dashbord</a></li>
				  <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-right-from-bracket"></i>  Logout</a></li>
				</ul>
				@else
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <li>
					<?php
					  $cart_utama = \App\Models\Cart::where('id_user', session('id'))->first();
					  if(!empty($cart_utama))
					  {
                        $notif = \App\Models\CartItem::where('id_cart', $cart_utama->id)->count();
					  }
					?>
					<a class="dropdown-item" href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart"></i>
						Keranjang
						@if(!empty($notif))
						  <span class="badge badge-danger">{{ $notif }}</span>
						@endif
					</a>
				  </li>
                  <li>
					<?php
					  $orders = \App\Models\Order::where('id_user', session('id'))->count();
					?>
					<a class="dropdown-item" href="{{ route('order.index') }}"><i class="fas fa-shopping-cart"></i>
						Order
						@if(!empty($orders))
						  <span class="badge badge-danger">{{ $orders }}</span>
						@endif
					</a>
				  </li>
				  <li><a class="dropdown-item" href="/profile"><i class="fa-solid fa-user"></i>  Profile</a></li>
				  <li><a class="dropdown-item" href="/history"><i class="fa-solid fa-clock-rotate-left"></i>  Riwayat</a></li>
				  <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-right-from-bracket"></i>  Logout</a></li>
				</ul>
				@endif
			  </li>
			  <li>
				<div class="header-icons">
					<a class="text-dark" href="/faq"><b><i class="fas fa-question"></i></b></a>
				</div>
			</li>
			</ul>
		  </div>
		</div>
	  </nav>



