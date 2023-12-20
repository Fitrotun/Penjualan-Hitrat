@extends('frontend.include.base')

@section('content')

@include('frontend.include.partial_nav')

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
                                            <form method="post" action="{{route('cart.store')}}" >
                                                @csrf
                                                <input type="hidden" name="id_user" value="{{session('id')}}">
                                                <input type="hidden" name="id_product" value="{{$products->id}}">
                                                <input type="text" name="quantity" class="form-control" required="">
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </div>
            </div>
        </div>
    </div>
    <br><br><br>
@endsection
