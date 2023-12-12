@extends('frontend.include.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-3 mt-3">
            <img src="{{ asset('assets/img/fot-log.png') }}" class="rounded mx-auto d-block" width="150" alt="">
        </div>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @if (isset($items))
                        <tbody>
                            <?php $no = 1; $total_harga = 0; ?>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp. {{ number_format($item->product->price) }}</td>
                                <td>
                                    <a href="{{route('cart.item.destroy', $item->id)}}">
                                        <button class="btn btn-danger" type="button"><i class="fa-solid fa-trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $total_harga += ($item->product->price*$item->quantity)
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="3" align="right"><strong>Total Harga :</strong></td>
                                <td><strong>Rp. {{ number_format($total_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                                        <i class="fa fa-shopping-cart"></i> Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                                <td colspan="5">
                                    <h2 align="center">Keranjang Kosong!</h2>
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
@endsection
