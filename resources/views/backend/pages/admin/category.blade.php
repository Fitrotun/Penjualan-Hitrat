@extends('backend/layouts/base')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Kategori Wisata Wonosobo</h4>
        <p class="card-description">
          <a href="/category/create" class="btn btn-primary float-end btn-sm" style="margin-right: 10px">+ Tambah</a><br>
        </p>
        <div class="card mb-4">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                
              
                <th>
                  Nama Kategori
                </th>
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
            
              @foreach ($categorys as $i)
              <tr>

                <td>
                  {{ $i->name }}
                
                <td>
                  <form action="/category/{{ $i->id }}" method="POST">
                    {{-- Update  --}}
                    <a type="button" href="/category/{{ $i->id }}/edit" class="badge bg-warning border-0"><i class="mdi mdi-lead-pencil"></i></a>
                    @method("delete")
                    @csrf
                    {{-- Delete  --}}
                      <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yakin ?')"><i class="mdi mdi-delete-forever"></i></button>
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
