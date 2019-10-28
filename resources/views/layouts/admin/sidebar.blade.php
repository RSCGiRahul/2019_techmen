@section('sidebar')

<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('admin_asset/img/sidebar-1.jpg')}}">
      <div class="logo">
        <a href="dashboard.html" class="simple-text logo-normal">
          Tech'man
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('managment.region.index') }}">
              <i class="material-icons">location_city</i>
              <p>Region</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('managment.user.index') }}">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('managment.customer') }}">
              <i class="material-icons">person</i>
              <p>Customer</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('managment.gadget.index') }}">
              <i class="material-icons">stay_primary_portrait
              </i>
              <p>Gadget</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('managment.brand.index') }}">
              <i class="material-icons">branding_watermark
              </i>
              <p>Brand</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{route('managment.coupen.index')}}">
              <i class="material-icons">local_offer</i>
              <p>Coupen</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{ route('managment.product.index') }}">
              <i class="material-icons">storefront
              </i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('managment.diagnose.index') }}">
              <i class="material-icons">local_hospital
              </i>
              <p>Diagnose</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ route('managment.product.diagnose.all') }}">
              <i class="material-icons">local_hospital
              </i>
              <p>Product Diagnose</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('managment.inventory.index')}}">
              <i class="material-icons">store</i>
              <p>Inventory</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('managment.admin.order')}}">
              <i class="material-icons">shopping_card</i>
              <p>Order</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="{{route('managment.upload.csv')}}">
              <i class="material-icons">store</i>
              <p>Upload Csv</p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>
    @endsection