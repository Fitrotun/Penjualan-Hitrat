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
                    <h3><i class="fa fa-shopping-cart"></i> Detail Order</h3>
                    <p>Pelanggan: <span>{{$order->user->name}}</span></p>
                    <p>Tanggal Order: <span>{{$order->order_date}}</span></p>
                    <p><strong>Status Order: <span>{{$order->status}}</span></strong></p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; $total_harga = 0;?>
                            @foreach($orderItems as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp. {{ number_format($item->product->price) }}</td>
                                <td>Rp. {{number_format($item->unit_price)}}</td>
                            </tr>
                            @php
                                $total_harga += $item->unit_price;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                                <td><strong>Rp. {{ number_format($total_harga) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <h4>Pembayaran (BRI)</h4>
                        <p>No Rek: <strong>09908876757687917531</strong></p>
                        <p>atas nama : <strong>Dedi</strong></p>
                    </div>
                    <form action="#" method="post">
                        @csrf
                        <input type="file" name="bukti_pembayaran" id="" class="mt-2 mb-2">
                        <br>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                            <i class="fa fa-shopping-cart"></i> Upload Bukti Pembayaran
                        </button>
                    </form>
                    <p>Status Verifikasi Pembayaran: Sukses</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
