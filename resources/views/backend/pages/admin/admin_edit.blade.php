@extends('backend.include.create')

@section('content')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Administrator</h4>
      <form class="form-sample" method="POST" action="/admin/{{ $item->id }}"> @method("put")
        @csrf
        <p class="card-description">
          Personal info
        </p>
        <div class="row ">
          <div class="col-md-9">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" value="{{ $item->name }}"/>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input class="form-control" name="email" value="{{ $item->email }}"/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-md-9">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" value="{{ $item->password }}"/>
              </div>
            </div>
          </div> --}}
          <div class="col-md-9">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenisKelamin" id="membershipRadios1" value="0" {{ ($item->jenisKelamin=="0")? "checked" : "" }}>
                    Laki-laki
                  </label>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenisKelamin" id="membershipRadios2" value="1" {{ ($item->jenisKelamin=="1")? "checked" : "" }}>
                    Perempuan
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <p class="card-description" style="margin-top: 1%">
          Contact
        </p>
        <div class="row">
          <div class="col-md-9">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" name="alamat" class="form-control" value="{{ $item->alamat }}"/>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nomor HP</label>
              <div class="col-sm-9">
                <input type="numer" name="noHp" class="form-control" value="{{ $item->noHp }}"/>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary me-2">Save</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>
    
@endsection