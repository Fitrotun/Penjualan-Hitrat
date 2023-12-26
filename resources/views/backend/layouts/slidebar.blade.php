<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas no-print" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category" {{ (session('role')=="admin")? "style=display:block" : "style=display:none" }} >Administrator</li>
      <li class="nav-item" {{ (session('role')=="admin")? "style=display:block" : "style=display:none" }}>
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" {{ (session('role')=="admin")? "aria-expanded=true" : "aria-expanded=false" }} aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-account-multiple"></i>
          <span class="menu-title">Pengguna</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ (session('role')=="admin")? "show" : "" }}" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin')}}">Administrator</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('user')}}">User</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('category')}}">Categori</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('product')}}">Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('transaksi.index')}}">Transaksi</a></li>

          </ul>
        </div>


        </ul>
</nav>
