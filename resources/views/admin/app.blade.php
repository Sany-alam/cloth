<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    @yield('page-css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.min.css') }}">
    <script src="{{ asset('assets\admin\js\vendors.min.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="logo logo-white">
                    <a href="{{ url('admin') }}">
                      <img src="{{ asset('assets/admin/images/logo/logo-white.png') }}" alt="Logo">
                    </a>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item @yield('home-page')">
                  <a class="nav-link" href="{{ url('admin') }}">Home</a>
                </li>
                <li class="nav-item @yield('product-page')">
                  <a class="nav-link" href="{{ url('admin/product') }}">Product</a>
                </li>
                <li class="nav-item @yield('category-page')">
                  <a class="nav-link" href="{{ url('admin/category') }}">Category</a>
                </li>
                <li class="nav-item @yield('banner-page')">
                  <a class="nav-link" href="{{ url('admin/banner') }}">Banner</a>
                </li>
              </ul>
            </div>
        </div>
    </nav>
    @yield('content')
@yield('page-js')
<script src="{{ asset('assets\admin\js\app.min.js') }}"></script>
@yield('custom-js')
</body>
</html>