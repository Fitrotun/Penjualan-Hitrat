@extends('frontend.include.base')

@section('content')
@include('frontend.include.nav')

<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Halal dan Ampuh</p>
						<h1>Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="container">
		<div class="product-section mt-150 mb-150">
		<div class="row justify-content-center">
				@foreach ($products as $p)
					<div class="col-lg-4 col-md-6 text-center ">
						<div class="card col-md-10 mb-2 mt-5">
							<div class="single-product-item">
								<div class="product-image">
									<img src="{{ asset($p->image) }}" alt="">
								</div>
								<h3>{{ $p->name }}</h3>
								<p class="card-text">
									{{ mb_strimwidth($p->description, 0, 40, "..."); }}<br>
								</p>
								<a href="/detail_produk/{{ $p->id }}" class="item"><i class="item-primary me-0"></i>Selengkapnya</a>			
								<p class="product-price">{{ $p->price }}</p>
								<strong>Stok :</strong> {{ $p->stok }} <br><br>
								<ul>
									
									<a href="https://shp.ee/6weg9zr" target="_blank" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shopee</a><br><br>
									<a href="https://s.lazada.co.id/s.nM8Ol" target="_blank" class="cart-btn"><i class="fas fa-shopping-cart"></i> Lazada</a><br><br>
									<a href="https://tokopedia.link/l1aok6q48Eb" target="_blank" class="cart-btn"><i class="fas fa-shopping-cart"></i> Toko Pedia</a><br><br>
									<a href="#" target="_blank" class="cart-btn"><i class="fas fa-shopping-cart"></i> Pesan</a>
								</ul>
								
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection