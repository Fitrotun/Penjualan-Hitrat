@extends('backend.layouts.base')

@section('content')


  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Transaksi</h4>

        <div class="table-responsive" id="order-list">
          <div class="mt-2 mb-2 d-flex gap-3">
            <input class="search form-control w-25" placeholder="Cari Transaksi"/>
            <span class="sort" data-sort="order-date">Sort by date</span>
            <span class="sort" data-sort="order-customer">Sort by customer</span>
            <span class="sort" data-sort="order-status">Sort by status</span>
          </div>

          <table class="table table-hover list">
            <thead>
              <tr>
                <th>
                  Tanggal Order
                </th>
                <th>
                  Pelanggan
                </th>
                <th>
                  Items
                </th>
                <th>
                    Total Tagihan
                </th>
                <th>
                    Status
                </th>
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr>
                <td class="order-date">
                  {{ $order->order_date }}
                </td>
                <td class="order-customer">
                  {{ $order->user->name }}
                </td>
                <td>
                    @foreach ($order->orderitem as $item)
                    <ul>
                        <li>{{ $item->product->name }}</li>
                    </ul>
                    @endforeach
                </td>
                <td>
                    {{  number_format($order->transaction->total_harga) }}
                </td>
                <td class="order-status">
                    {{ $order->status }}
                </td>
                <td>
                  <form action="" method="POST">
                    <a type="button" href="{{route('transaksi.edit', $order->id)}}" class="btn btn-warning btn-rounded btn-icon btn-sm"><i class="mdi mdi-lead-pencil"></i></a>
                    @method("delete")
                    @csrf
                    {{-- Delete  --}}
                    <button type="submit" class="btn btn-danger btn-rounded btn-icon btn-sm" onclick="return confirm('apakah anda yakin ?')">
                      <i class="mdi mdi-delete-forever"></i>
                    </button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>

  <script>
    var options = {
        valueNames: [ 'order-date', 'order-customer', 'order-status' ]
    };

    var hackerList = new List('order-list', options);
  </script>



@endsection
