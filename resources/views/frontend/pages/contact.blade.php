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
					<div class="contact-form">
						<form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
							<p>
								<input type="text" placeholder="Name" name="name" id="name">
								<input type="email" placeholder="Email" name="email" id="email">
							</p>
							<p>
								<input type="tel" placeholder="Phone" name="phone" id="phone">
								<input type="text" placeholder="Subject" name="subject" id="subject">
							</p>
							<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
							<input type="hidden" name="token" value="FsWga4&@f6aw" />
							<p><input type="submit" value="submit" class="btn submit_btn"><a href="mailto:idafitrotunkhasanah@gmail.com"></a></p>
						</form>
					</div>
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
