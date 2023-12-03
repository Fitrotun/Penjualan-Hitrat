@extends('backend/include/create')

@section('content')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Informasi Product</h4>

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

      <form method="post" action="/product/{{ $products->id }}" id="myForm" enctype="multipart/form-data" class="row g-3">
        @method('PUT')
        @csrf
        <p class="card-description">
          Informasi Detail Product
        </p>
        <div class="mb-3">
            <label for="desk" class="from-label">Nama Product</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="name" value="{{ $products->name }}" > 
            @error('name')
                <div class="invalid-feedback">
                    Nama tidak boleh kosong
                </div>
            @enderror
        </div>
        <div>
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" name="image" id="formFile"
        accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
        </div>
        <div class="mt-3"><img src="{{ asset($products->image) }}" id="output" width="400"></div>

        <div class="mb-3">
            <label for="desk" class="from-label">Deskripsi</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror"
            id="exampleInputPassword1" name="description" value="{{ $products->description }}" > 
            @error('description')
                <div class="invalid-feedback">
                    Deskripsi tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror"
                id="exampleInputPassword1" name="price" value="{{ $products->price }}">
            @error('price')
                <div class="invalid-feedback">
                    Harga tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control @error('stok') is-invalid @enderror"
                id="exampleInputPassword1" name="stok" value="{{ $products->stok }}">
            @error('stook')
                <div class="invalid-feedback">
                    Stok tidak boleh kosong
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Pilih Category</label>
            <select class="form-select @error('id_category') is-invalid @enderror" aria-label="Default select example"
            name="id_category">
            @foreach ($category as $item)
                <option value="{{ $item->id }}" {{ $products->id_category == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    Pilih salah satu kategori
                </div>
            @enderror
        </div>
        <div class="col-12">
        <button type="submit" class="btn btn-primary me-2">Save</button>
        <button class="btn btn-light">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
    
@endsection