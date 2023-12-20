@extends('backend.layout.create')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List Transaksi User</h4>
        {{-- <p class="card-description">
          <a href="/admin/create" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">+ Tambah</a><br>
        </p> --}}
        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>
                  Name
                </th>
                <th>
                  Product
                </th>
                <th>
                  Tanggal Pesanan
                </th>
                <th>
                    Jumlah Pesanan
                </th>
                <th>
                    Total Harga
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaction as $i)
              <tr>
                <td>
                  {{ $i->cart->user->name }}
                </td>
                <td>
                  {{ $i->product->name }}
                </td>
                <td>
                    {{ $i->created_at }}
                </td>
                <td>
                  {{ $i->jumlah }}
                </td>
                <td>
                  Rp. {{ number_format($i->jumlah_harga-$i->cart->kode) }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection