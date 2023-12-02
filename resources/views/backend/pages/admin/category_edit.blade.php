@extends('backend/include/create')

@section('content')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Category</h4>
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

    <form method="post" action="/category/{{ $item->id }}" id="myForm" enctype="multipart/form-data" class="row g-3">
      
        @method('PUT')
        @csrf
        <p class="card-description">
          Informasi Kategori Wisata Wonosobo 
        </p>
        <div class="col-md-12">
            <label for="desk" class="from-label">Name</label>
            <input type="text" class="form-control @error('wisata_name') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="category_name" value="{{ $item->name }}" > 
            @error('wisata_name')
                <div class="invalid-feedback">
                    Nama tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="col-12">
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
    
@endsection