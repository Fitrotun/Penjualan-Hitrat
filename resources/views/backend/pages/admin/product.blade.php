@extends('backend/layouts/base')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Product</h4>
        <p class="card-description">
          <a href="/product/create" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">+ Tambah</a><br>
        </p>
        <div class="card mb-4">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>
                  Nama Product
                </th>
                <th>
                  Image
                </th>
                <th>
                  Deskripsi
                </th>
                <th>
                  Harga 
                </th>
                <th>
                  Stok 
                </th>
                <th>
                  Category
                </th>
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $i)
              <tr>
                <td>
                  {{ $i->name }}
                </td>
                <td>
                  <img width="60px" height="60px" src="{{ asset($i->image) }}" >
                {{-- @if ($i->image)
                  <img width="60px" height="60px" src="{{ asset($i->image) }}" >
                  @else
                    <p>tidak ada gambar</p>                   
                   @endif
                  <img width="60px" height="60px" src="{{ asset('image/').$i->image }}" > --}}
                </td>
                <td>
                  {{ mb_strimwidth($i->description, 0, 10, "..."); }}
                </td>
                <td>
                  {{ $i->price}}
                </td>
                <td>
                  {{ $i->stok}}
                </td>
                <td>
                   {{$i->category->name }}
                </td>
                <td>
                  <form action="/product/{{ $i->id }}" method="POST">
                    {{-- Update  --}}
                    <a type="button" href="/product/{{ $i->id }}/edit" class="badge bg-warning  border-0"><i class="mdi mdi-lead-pencil"></i></a>
                    @method("delete")
                    @csrf
                    {{-- Delete  --}}
                      <button class="badge bg-danger border-0 " onclick="return confirm('apakah anda yakin ?')"><i class="mdi mdi-delete-forever"></i></button>
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
  </div>
@endsection