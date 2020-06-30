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
<div class="app">
    <div class="layout">
        <!-- Header START -->
        <div class="header">
            <div class="logo logo-dark">
                <a href="index.html">
                    <img src="{{asset('assets/admin/images/logo/logo.png')}}" alt="Logo">
                    <img class="logo-fold" src="{{asset('assets/admin/images/logo/logo-fold.png')}}" alt="Logo">
                </a>
            </div>
            <div class="logo logo-white">
                <a href="index.html">
                    <img src="{{asset('assets/admin/images/logo/logo-white.png')}}" alt="Logo">
                    <img class="logo-fold" src="{{asset('assets/admin/images/logo/logo-fold-white.png')}}" alt="Logo">
                </a>
            </div>
            <div class="nav-wrap">
                <ul class="nav-left">
                    <li class="desktop-toggle">
                        <a href="javascript:void(0);">
                            <i class="anticon"></i>
                        </a>
                    </li>
                    <li class="mobile-toggle">
                        <a href="javascript:void(0);">
                            <i class="anticon"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                            <i class="anticon anticon-search"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="dropdown dropdown-animated scale-left">
                        <a href="javascript:void(0);" data-toggle="dropdown">
                            <i class="anticon anticon-bell notification-badge"></i>
                        </a>
                        <div class="dropdown-menu pop-notification">
                            <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                <p class="text-dark font-weight-semibold m-b-0">
                                    <i class="anticon anticon-bell"></i>
                                    <span class="m-l-10">Notification</span>
                                </p>
                                <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                    <small>View All</small>
                                </a>
                            </div>
                            <div class="relative">
                                <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                        <div class="d-flex">
                                            <div class="avatar avatar-blue avatar-icon">
                                                <i class="anticon anticon-mail"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-dark">You received a new message</p>
                                                <p class="m-b-0"><small>8 min ago</small></p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                        <div class="d-flex">
                                            <div class="avatar avatar-cyan avatar-icon">
                                                <i class="anticon anticon-user-add"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-dark">New user registered</p>
                                                <p class="m-b-0"><small>7 hours ago</small></p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                        <div class="d-flex">
                                            <div class="avatar avatar-red avatar-icon">
                                                <i class="anticon anticon-user-add"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-dark">System Alert</p>
                                                <p class="m-b-0"><small>8 hours ago</small></p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                        <div class="d-flex">
                                            <div class="avatar avatar-gold avatar-icon">
                                                <i class="anticon anticon-user-add"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-dark">You have a new update</p>
                                                <p class="m-b-0"><small>2 days ago</small></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-animated scale-left">
                        <div class="pointer" data-toggle="dropdown">
                            <div class="avatar avatar-image  m-h-10 m-r-15">
                                <img src="{{asset('assets/admin/images/avatars/thumb-3.jpg')}}"  alt="">
                            </div>
                        </div>
                        <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                            <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                <div class="d-flex m-r-50">
                                    <div class="avatar avatar-lg avatar-image">
                                        <img src="{{asset('assets/admin/images/avatars/thumb-3.jpg')}}" alt="">
                                    </div>
                                    <div class="m-l-10">
                                        <p class="m-b-0 text-dark font-weight-semibold">Marshall Nichols</p>
                                        <p class="m-b-0 opacity-07">UI/UX Desinger</p>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                        <span class="m-l-10">Edit Profile</span>
                                    </div>
                                    <i class="anticon font-size-10 anticon-right"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                        <span class="m-l-10">Account Setting</span>
                                    </div>
                                    <i class="anticon font-size-10 anticon-right"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                        <span class="m-l-10">Projects</span>
                                    </div>
                                    <i class="anticon font-size-10 anticon-right"></i>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                        <span class="m-l-10">Logout</span>
                                    </div>
                                    <i class="anticon font-size-10 anticon-right"></i>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header END -->

        <!-- Side Nav START -->
        <div class="side-nav">
            <div class="side-nav-inner">
                <ul class="side-nav-menu scrollable">
                    <li class="nav-item">
                        <a class="dropdown-toggle" href="{{ url('admin') }}">
                            <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-toggle" href="{{ url('admin/courier') }}">
                            <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                            </span>
                            <span class="title">Courier</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="dropdown-toggle" href="javascript:void(0)">
                            <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                            </span>
                            <span class="title">Orders</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('queue')">
                                <a href="{{ url('admin/order/queue') }}">In Queue</a>
                            </li>
                            <li class="@yield('panding')">
                                <a href="{{ url('admin/order/pending-processing') }}">Panding</a>
                            </li>
                            <li class="@yield('complete')">
                                <a href="{{ url('admin/order/complete') }}">Complete</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-toggle" href="{{ url('admin/product') }}">
                            <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                            </span>
                            <span class="title">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-toggle" href="{{ url('admin/subcategory') }}">
                            <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                            </span>
                            <span class="title">Subcategory</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-toggle" href="{{ url('admin/category') }}">
                            <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                            </span>
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{ url('admin/domain') }}">
                            <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                            </span>
                            <span class="title">Domains</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-toggle" href="{{ url('admin/banner') }}">
                            <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                            </span>
                            <span class="title">Banner</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown open">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="anticon anticon-dashboard"></i>
                            </span>
                            <span class="title">Dashboard</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="active">
                                <a href="index.html">Default</a>
                            </li>
                            <li>
                                <a href="index-crm.html">CRM</a>
                            </li>
                            <li>
                                <a href="index-e-commerce.html">E-commerce</a>
                            </li>
                            <li>
                                <a href="index-projects.html">Projects</a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="anticon anticon-appstore"></i>
                            </span>
                            <span class="title">Apps</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-chat.html">Chat</a>
                            </li>
                            <li>
                                <a href="app-file-manager.html">File Manager</a>
                            </li>
                            <li>
                                <a href="app-mail.html">Mail</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0);">
                                    <span>Projects</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="app-project-list.html">Project List</a>
                                    </li>
                                    <li>
                                        <a href="app-project-details.html">Project Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0);">
                                    <span>E-commerce</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="app-e-commerce-order-list.html">Orders List</a>
                                    </li>
                                    <li>
                                        <a href="app-e-commerce-products.html">Products</a>
                                    </li>
                                    <li>
                                        <a href="app-e-commerce-products-list.html">Products List</a>
                                    </li>
                                    <li>
                                        <a href="app-e-commerce-products-edit.html">Products Edit</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
        <!-- Side Nav END -->

        <div class="page-container">
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@yield('page-js')
<script src="{{ asset('assets\admin\js\app.min.js') }}"></script>
@yield('custom-js')
</body>
</html>
