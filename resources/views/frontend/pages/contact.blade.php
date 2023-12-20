@extends('frontend.include.base')

@section('content')
@include('frontend.include.nav')
<!-- breadcrumb-section -->

<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Get 24/7 Support</p>
						<h1>Contact us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
    <!--================Contact Area =================-->
    <!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Have you any question?</h2>
						<p>Jika anda merasa bingung, tentang bagaimana cara memesan atau yang lainnya, silahkan untuk contact kami!</p>
					</div>
				 	<div id="form_status"></div>
					 <div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Email address</label>
						<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
					  </div>
					  <div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Phone</label>
						<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
					  </div>
					  <div class="mb-3">
						<label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
					  </div>
					  <p><a href="mailto:idafitrotunkhasanah@gmail.com"><input type="submit" value="submit" class="btn submit_btn"></a></p>
					
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Alamat Toko</h4>
							<p>Pandeyan<br> Kec. Ngemplak, Kabupaten Boyolali, Jawa Tengah<br> Indonesia</p>
							<p>Google Map<a href="https://maps.app.goo.gl/f6x746JjqnNVbX6y8" target="_blank" rel="noopener noreferrer"> Klik disini!</a></p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Jam Kerja</h4>
							<p>Senin- Sabtu: 08.00 - 17.00 WIB <br> Minggu : Tutup </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Kontak</h4>
							<p>Phone: (+62) 812-2822-578 </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->
@endsection
