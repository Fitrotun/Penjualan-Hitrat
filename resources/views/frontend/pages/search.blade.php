@extends('frontend.include.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-2 mt-5"> 
            <h4>Search Result</h4>
            <hr size="10px" width="50%" align="left">
        </div>
        
        @forelse ($searchProduct as $a)
        
            <div class="col-md-3 mt-2">
                <div class="card">
                    <img width="200px" height="200px" src="{{ asset($a->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{ $a->name }}</h5>
                    <p class="card-text">
                      {{ mb_strimwidth($a->description, 0, 40, "..."); }}
                    </p>
                    <a href="/detail_product/{{ $a->id }}" class="item"><i class="item-primary me-0"></i>Selengkapnya</a>
                    </div>
                </div>
            </div>
            @empty
                  <div class="col-md-3 mt-5"></div>
                  <center><h3 style="font-family: 'Signika Negative', sans-serif;">404</h3></center>
                  <center><h4 style="font-family: 'Inconsolata', monospace;">OOPS!|Wisata tidak ditemukan</h4></center>
        @endforelse
                  <!-- <div class="col-md-3 mt-5"> 
                    {{ $searchProduct->appends(request()->input())->links() }}
                  </div> -->
    </div>
</div>



@endsection