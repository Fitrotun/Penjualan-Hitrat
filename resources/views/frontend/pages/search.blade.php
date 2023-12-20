@extends('frontend.include.base')
@section('content')
@include('frontend.include.nav')
<div class="container">
    <div class="product-section mt-150 mb-150">
    <div class="row justify-content-center">
        
            <h3><i class="fa fa-search"></i></i> Search Result</h3>
            <hr size="15px" width="50%" align="left">
        
        @forelse ($searchProduct as $p)
                <div class="col-lg-4 col-md-6 text-center ">
                    <div class="card col-md-10 mb-2 mt-5">
                        <div class="single-product-item">
                            <div class="product-image">
                                <img src="{{ asset($p->image) }}" alt="">
                            </div>
                            <h3>{{ $p->name }}</h3>
                            <p class="card-text">
                                {{ mb_strimwidth($p->description, 0, 40, "...") }}<br>
                            </p>
                            {{-- <a href="/detail_produk/{{ $p->id }}" class="item"><i class="item-primary me-0"></i>Selengkapnya</a> --}}
                            <font size="3" color="gray" class="product-price" style="text-decoration: line-through;">Rp. {{ $p->price }}</font>
                            <strong><font size="4" color="orange" class="harga-diskon"> Rp. {{ $p->harga_diskon}}</font></strong><br>
                            <strong>Stok :</strong> {{ $p->stok }} <br><br>
                            <ul>
                                <a href="/detail_produk/{{ $p->id }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Pesan</a><br><br>
                                <a href="https://s.lazada.co.id/s.nM8Ol" target="_blank" class="cart-btn"><i class="fas fa-shopping-cart"></i> Lazada</a><br><br>
                                <a href="https://shp.ee/6weg9zr" target="_blank" class="cart-btn"><i class="fas fa-shopping-cart"></i> Shopee</a><br><br>
                                <a href="https://tokopedia.link/l1aok6q48Eb" target="_blank" class="cart-btn"><i class="fas fa-shopping-cart"></i> Tokopedia</a>
                                
                            </ul>

                        </div>
                    </div>
                </div>
                @empty
                  <div class="col-md-3 mt-5">
                  <center><h3 style="font-family: 'Signika Negative', sans-serif;">404</h3></center>
                  <center><h4 style="font-family: 'Inconsolata', monospace;">OOPS!|Wisata tidak ditemukan</h4></center>
                 @endforelse
                  <!-- <div class="col-md-3 mt-5">
                    {{ $searchProduct->appends(request()->input())->links() }}
                  </div> -->
                </div>
        </div>
    </div>
</div>



@endsection
