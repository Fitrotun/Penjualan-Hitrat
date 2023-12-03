@extends('frontend.include.base')

@section('content')
	
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
	
					
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-10 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mt-5">
                            <img width="300px" height="300px" src="{{ asset($products->image) }}" alt="" class="rounded mx-auto d-block" width="100%" alt=""> 
                        </div>
                        <div class="col-md-5 mt-3">
                            <h2>{{ $products->name }}</h2>
                            <div class="rating">
                                @php
                                    $rating = $products->rating; 
                                @endphp
                                @for ($i = 1; $i <= $rating; $i++)
                                    <span class="star fas fa-star"></span>
                                @endfor
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($products->price) }}</td>
                                    </tr>

                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $products->description }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                            <form method="post" action="{{ url('pesan') }}/{{ $products->id }}" >
                                                @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control" required="">
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="container" style="margin-bottom: 20px;">
                            <div class="card border-0" style="background-color: #cdcdcd">
                                <div class="card-body p-lg-4">
                                    <h2 class="card-title fw-bold mb-2">Tambah Ulasan</h2>
                                    <div class="card border-0" style="background-color: #ffffff">
                                        <div class="card-body p-lg-4">
                                            <form action="/komen/{{ $products->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="user">
                                                    <div class="row row-cols-auto mb-2">
                                                        <div class="col-md-11">
                                                            <div class="form-group row">
                                                            <label class="col fw-bold">Komentar</label>
                                                            <div class="card-text sm-14 p-2 align-baseline">
                                                                <input class="form-control" name="description" type="text"/>
                                                                @error('description')
                                                                    <code>
                                                                        {{ $message }}
                                                                    </code>
                                                                @enderror
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" class="btn btn-primary offset-md-10" value="Submit">
                                            </form>
                                        </div>
                                
                                    </div>
                                </div>    
                            </div>  
                        </div>
                    </div>
                </div>
             </div>
            </div>
        </div>
    </div>
@endsection