@extends('frontend.include.base')
@section('title','Detail Order')
@section('content')
@include('frontend.include.partial_nav')
<br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-10 mb-3 mt-3">
            <img src="{{ asset('assets/img/fot-log.png') }}" class="rounded mx-auto d-block" width="150" alt="">
        </div> --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        </div>
                    @endif
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
                                <td>Rp. {{ number_format($item->product->discount_price) }}</td>
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
                        <h4>Metode Pembayaran</h4>
                        <table>
                            <tr>
                                <th>Bank</th>
                                <td>{{$payment->nama_bank}}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{$payment->nama_rek}}</td>
                            </tr>
                            <tr>
                                <th>No. Rek.</th>
                                <td>{{$payment->no_rek}}</td>
                            </tr>
                        </table>
                    </div>

                    @if ($order->status == 'menunggu pembayaran')
                    <form action="/upload/{{ $item->order->id }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="file" name="bukti_pembayaran" id="" class="mt-2 mb-2">
                        <br>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                            <i class="fa fa-shopping-cart"></i> Upload Bukti Pembayaran
                        </button>
                    </form>
                    @endif
                    <p>Status Verifikasi Pembayaran: <span>{{$order->status}}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
@endsection
