@extends('frontend.include.base')

@section('content')
@include('frontend.include.nav')

<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Help QnA</p>
                    <h1>FAQ</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <br>
    <br>
    
    <div class="faq_area section_padding_130" id="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <!-- Section Heading-->
                    <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <h3><span>Frequently </span> Asked Questions</h3>
                        <p>Dengan FAQ ini mungkin dapat membantu meyakinkan anda dengan produk kami.</p>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- FAQ Area-->
                <div class="col-12 col-sm-10 col-lg-8">
                    
                        <div >
                            <a><img src="assets/img/qna.jpg" alt=""></a>
                        </div>
                        <div class="support-button text-center d-flex align-items-center justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <i class="lni-emoji-sad"></i>
                            <p class="mb-0 px-2">Tidak menemukan jawaban?</p>
                            <a href="whatsapp://send?text=Hello&phone=+628122822578""> Hubungi Penjual !</a>
                        </div>
                   
                    {{-- <div class="accordion faq-accordian" id="faqAccordion">
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingOne">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Apakah produknya aman, soalnya punya kucing dirumah?<span class="lni-chevron-up"></span></h6>
                            </div>
                            <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <p>Produk kita sudah mengandung <b> Animal Detterent </b>, jadi hewan lain selain tikus cenderung tidak mau memakannya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingTwo">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Bagaimana dengan keunggulan produk ini?<span class="lni-chevron-up"></span></h6>
                            </div>
                            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <p>Dijamin ampuh dengan umpan kualitas terbaik, atau uang kembali.</p>
                                    
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <div class="card-header" id="headingThree">
                                <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Apakah produk mudah larut?<span class="lni-chevron-up"></span></h6>
                            </div>
                            <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                <div class="card-body">
                                    <p>Berbentuk kotak padat lilin yang tidak mudah larut terkena air. Sehingga cocok untuk dipasang di area Indoors maupun Outdoors serta area basah seperti got, saluran air dan sawah.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Support Button-->
                    <div class="support-button text-center d-flex align-items-center justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <i class="lni-emoji-sad"></i>
                        <p class="mb-0 px-2">Tidak menemukan jawaban?</p>
                        <a href="whatsapp://send?text=Hello&phone=+628122822578""> Hubungi Penjual !</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection