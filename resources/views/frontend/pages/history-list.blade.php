@extends('frontend.include.base')

@section('content')
@include('frontend.include.nav')
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-10 mb-3 mt-3">
            <img src="{{ asset('assets/img/fot-log.png') }}" class="rounded mx-auto d-block" width="150" alt="">
        </div> --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> List Riwayat Order</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Order</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach($orders as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->order_date }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{route('order.history.detail', $item->id)}}" class="btn btn-primary me-2">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection
