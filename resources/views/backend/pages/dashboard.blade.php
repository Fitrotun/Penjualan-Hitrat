@extends('backend.layouts.base')

@section('content') 
<div class="main-panel">
        <div class="content-wrapper" id="body">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs no-print" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link">Dashboard</a>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper no-print">
                      {{-- <a onclick="window.print()" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                      <button id="export" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</button> --}}
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="pasien" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12 no-print">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          <div>
                            <p class="statistics-title">Administrator</p>
                            <h3 class="rate-percentage">11<h3>
                            {{-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>Orang</span></p> --}}
                          </div>
                           <div>
                            <p class="statistics-title">User</p>
                            <h3 class="rate-percentage">2</h3>
                          </div>
                          <div>
                            <p class="statistics-title">Pegawai</p>
                            <h3 class="rate-percentage">3</h3>
                          </div>
                          {{-- <div>
                            <p class="statistics-title">Category</p>
                            <h3 class="rate-percentage">{{ $jml_category }}</h3>
                          </div>
                          <div>
                            <p class="statistics-title">Produk</p>
                            <h3 class="rate-percentage">{{ $jml_produk }}</h3>
                          </div> --}}
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



@endsection   
    
    
    
    
    

