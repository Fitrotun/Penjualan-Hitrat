@extends('backend.include.create')

@section('content')
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Tambah Administrator</h4>
      <form class="form-sample" method="POST" action="{{ url('/admin') }}" enctype="multipart/form-data">@csrf
        <p class="card-description">
          Personal info 
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" />
                @error('name')
                        <code>
                          {{ $message }}
                        </code>
                          @enderror
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input class="form-control" name="email" type="text"/>
                @error('email')
                        <code>
                          {{ $message }}
                        </code>
                          @enderror
              </div>
            </div>
          </div>
         
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" name="password" class="form-control" />
                @error('password')
                        <code>
                          {{ $message }}
                        </code>
                          @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="jenisKelamin" id="jenisKelamin1" value="0" checked>
                      Laki-laki
                    </label>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="jenisKelamin" id="jenisKelamin2" value="1">
                      Perempuan
                    </label>
                  </div>
                </div>
                @error('jenisKelamin')
                          <code>
                            {{ $message }}
                          </code>
                            @enderror
              </div>
            </div>
          </div>
        <p class="card-description" style="margin-top: 1%">
          Contact
        </p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" name="alamat" class="form-control" />
                @error('alamat')
                        <code>
                          {{ $message }}
                        </code>
                          @enderror
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nomor HP</label>
              <div class="col-sm-9">
                <input type="text" name="noHp" class="form-control" />
                @error('noHp')
                        <code>
                          {{ $message }}
                        </code>
                          @enderror
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary me-4 col-md-10">Submit</button>
        <button class="btn btn-light col-md-10">Cancel</button>
      </form>
    </div>
  </div>
</div>
    
@endsection