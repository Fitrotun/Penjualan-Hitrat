@extends('frontend.include.base')

@section('content')
@include('frontend.include.nav')
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-10 mb-3 mt-3">
            <img src="{{ asset('assets/img/fot-log.png') }}" class="rounded mx-auto d-block" width="150" alt="">
        </div> --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Keranjang</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @if (isset($items) && !$items->isEmpty())
                        <tbody>
                            <?php $no = 1; $total_harga = 0; $product_data = [];?>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp. {{ number_format($item->product->price) }}</td>
                                <td>Rp. {{number_format($item->product->price*$item->quantity)}}</td>
                                <td>
                                    <a href="{{route('cart.item.destroy', $item->id)}}">
                                        <button class="btn btn-danger" type="button"><i class="fa-solid fa-trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $total_harga += ($item->product->price*$item->quantity);
                                $p = [];
                                $p['id_product'] = $item->product->id;
                                $p['quantity'] = $item->quantity;
                                $p['total_price'] = $total_harga;

                                array_push($product_data, $p);
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                                <td><strong>Rp. {{ number_format($total_harga) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><strong>Metode Pembayaran :</strong></td>
                                <td colspan="2">
                                    <form action="{{route('order.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_user" value="{{session('id')}}">
                                        <input type="hidden" name="products" value="{{json_encode($product_data)}}">
                                        <select name="id_payment_method" id="" class="form-select w-100">
                                            <option value="">Pilih Metode</option>
                                            @foreach ($payment_methods as $item)
                                            <option value="{{$item->id}}">{{$item->nama_bank}}</option>
                                            @endforeach
                                        </select>
                                        <div class="mt-4 w-100">
                                            <button type="submit" class="btn btn-success w-100" onclick="return confirm('Anda yakin akan Check Out ?');">
                                                <i class="fa fa-shopping-cart"></i> Check Out
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                                <td colspan="6">
                                    <h2 align="center">Keranjang Kosong!</h2>
                                    <div class="text-center mt-2 mb-2">
                                        <a href="/produk" class="btn btn-primary text-center">Kembali Lihat Produk</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
@endsection
