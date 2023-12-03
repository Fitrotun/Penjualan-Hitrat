@extends('frontend.include.base')
@section('title','Info Berita')
@section('content')

{{-- @include('frontend.include.navbar') --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-5 mt-5">
            {{-- <img src="{{ asset('assets/images/logo.png') }}" class="rounded mx-auto d-block" width="150" alt=""> --}}
        </div>
        <div class="col-md-12 mt-5 mb-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                    
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal Kunjungan</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                               
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($carts as $item)
                                <td>{{ $item->tanggal }}</td>
                                <td>
                                    @if($item->status == 1)
                                        Menunggu Konfrimasi
                                    @else
                                        Sudah dibayar
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($item->jumlah_harga-$item->kode) }}</td>
                              
                                <td>
                                    @if ($item->status == 1)
                                        
                                    @else
                                    <a href="{{ url('struk') }}/{{ $item->id }}" class="btn btn-primary"><i class="fa fa-ticket"></i></a>
                                    {{-- <a href="/komen" class="btn btn-primary"><i class="fa fa-comments-o"></i></a> --}}
                                    @endif
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

@endsection