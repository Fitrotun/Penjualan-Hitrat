@extends('backend.layouts.base')

@section('content')


  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Detail Order</h4>

        <div class="d-flex gap-3 justify-content-between align-item-center">
        <h5> {{ $order->user->name }}</h5>
        <p>{{ $order->order_date }}</p>
        </div>
        <h3>Order Item</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderitem as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->product->discount_price) }}</td>
                        <td>{{ number_format($item->unit_price) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <table class="table w-50">
                <tr>
                    <th>Total Price</th>
                    <td>Rp. {{ number_format($order->transaction->total_harga) }}</td>
                </tr>
                <tr>
                    <th>Metode Pembayaran</th>
                    <td>
                        {{ $order->transaction->payment_method->nama_bank }}
                        @if ($order->transaction->bukti_pembayaran == null)
                            <p class="text-primary">Belum ada bukti pembayaran</p>
                        @else
                        <a href="{{asset($order->transaction->bukti_pembayaran)}}" target="_blank">(Bukti)</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    @if ($order->status == 'menunggu pembayaran' || $order->status == 'verifikasi pembayaran' )
                        <td class="p-3 bg-warning text-white fw-bold">{{ $order->status }}</td>
                    @elseif($order->status == 'diproses' || $order->status == 'dikirim')
                    <td class="p-3 bg-info fw-bold">{{ $order->status }}</td>

                    @elseif($order->status == 'sukses')
                    <td class="p-3 bg-success text-white fw-bold">{{ $order->status }}</td>
                    @elseif($order->status == 'gagal')
                    <td class="p-3 bg-danger text-white fw-bold">{{ $order->status }}</td>

                    @endif
                </tr>
            </table>
            <hr>
            <h4>Ubah Status</h4>
            <form action="{{route('transaksi.updateStatus', $order->id)}}" method="post" class="w-50 d-flex gap-3 align-items-center">
                @csrf
                @method('PUT');
                <select name="status" id="" class="form-select">
                    <option value="{{$order->status}}">{{ $order->status }}</option>
                    <option value="">-------------------------------</option>
                    <option value="menunggu pembayaran">menunggu pembayaran</option>
                    <option value="verifikasi pembayaran">verifikasi pembayaran</option>
                    <option value="diproses">diproses</option>
                    <option value="dikirim">dikirim</option>
                    <option value="sukses">sukses</option>
                    <option value="gagal">gagal</option>
                </select>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
