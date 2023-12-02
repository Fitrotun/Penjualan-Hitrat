@extends('frontend.include.base')

@section('content')

<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row mb-3">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Halal & Original</p>
							<h1>Ampuh dan Terpercaya</h1>
							<div class="hero-btns">
								<a href="/about" class="boxed-btn">Tentang Kami</a>
								<a href="/contact" class="bordered-btn">Kontak</a>
							</div>
							<br>
							<div class="container-searchbar">
								<form action="{{ url('searchProduct') }}" method="GET" class="searchbar" role="search">
									<input type="search" name="search" id="searchbar" value="" placeholder="Cari Product! ">
									<button type="submit"> <img src={{ asset('assets/img/search.png') }} alt=""></button>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Gratis Pengiriman</h3>
							<p>Ketika pesan lebih dari Rp. 50.000,00</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Pelayanan</h3>
							<p>Dapatkan Pelayanan Setiap Hari</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Garansi Uang Kembali 100% Jika Tidak Terbukti Ampuh!
							</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->
    <!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-10">
					<div >
						<a><img src="assets/img/logoo.jpg" alt=""></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2000</p>
						<h2>We are <span class="orange-text">HitRat Indonesia</span></h2>
						<p>Hitrat merupakan umpan racun tikus berbentuk block kecil yang sangat ampuh dan efektif basmi tikus hingga tuntas.

                        </p>
						<p>Berbentuk padat dengan potongan-potongan kecil, tikus akan suka sekali menggigit dan membawanya ke sarang untuk dimakan bersama tikus lain.
						</p>
						<p>
							Rodentisida dengan teknologi terbaik berbahan aktif Brodifacoum dirancang untuk membunuh tikus secara perlahan (slow action) dalam 3-7 hari, sehingga tidak membuat curiga tikus lainya. 
							Tikus akan mati kurus kering tanpa meninggalkan bau busuk yang menyengat.
						</p>
						<a href="/about" class="boxed-btn mt-4">Tahu Lebih Lanjut >></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	<!-- kelebihan section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>Apa <span class="orange-text">Keunggulan</span> HitRat</h3>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="client-avater">
							<img src="assets/img/fot-log.png" alt="">
						</div>
						<p>
							Umpan siap pakai. Mudah diaplikasikan. Berbentuk block dengan ukuran yang pas untuk tikus. Tidak perlu memotong atau mencampur dengan bahan lain.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="client-avater">
							<img src="assets/img/fot-log.png" alt="">
						</div>
						<p>
							Aromanya mampu membuat tikus keluar dari sarangnya. Terbuat dari bahan makanan yang disukai tikus, namun tidak disukai oleh binatang peliharaan.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
					<div class="single-product-item">
						<div class="client-avater">
							<img src="assets/img/fot-log.png" alt="">
						</div>
						<p>
							Tikus mati perlahan 3-7 hari setelah memakan umpan, sehingga tidak bikin curiga tikus lain, membuat lebih banyak tikus yang memakan umpan tersebut. 
						</p>

					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="client-avater">
							<img src="assets/img/fot-log.png" alt="">
						</div>
						<p>
							Formula khusus membuat tikus keluar dari sarang untuk mencari sumber air dan cahaya setelah menelan racun HITRAT, sehingga bangkai mudah ditemukan dan dievakuasi.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="client-avater">
							<img src="assets/img/fot-log.png" alt="">
						</div>
						<p>
							Berbentuk kotak padat lilin yang tidak mudah larut terkena air. Sehingga cocok untuk dipasang di area Indoors maupun Outdoors serta area basah seperti got, saluran air dan sawah.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="client-avater">
							<img src="assets/img/fot-log.png" alt="">
						</div>
						<p>
							Pasti AMPUH dan GARANSI 100% uang kembali.
						</p>
						<br>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end kelebihan section -->
	<!-- testimoni section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>Apa <span class="orange-text">Kata</span> Mereka</h3>
						<p>Lihat testimoni para pembeli supaya anda lebih yakin dengan produk HitRat!</p>
					</div>
				</div>
			</div>

			<div class="row" id="1">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a><img src="assets/img/testimon2.jpg" alt=""></a>
							<a><img src="assets/img/testimon1.jpg" alt=""></a>
						</div>
						<br>
						
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a><img src="assets/img/testimon4.jpg" alt=""></a>
						</div>
						
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a><img src="assets/img/testimon5.jpg" alt=""></a>
						</div>
						
					</div>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
					  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
					  <li class="page-item"><a class="page-link" href="#1">1</a></li>
					  <li class="page-item"><a class="page-link" href="#">2</a></li>
					  <li class="page-item"><a class="page-link" href="#">3</a></li>
					  <li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>
				  </nav>
			</div>
		</div>
	</div>
	<!-- end product section -->


@endsection