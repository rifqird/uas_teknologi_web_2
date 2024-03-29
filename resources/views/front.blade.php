<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BANDSHOP</title>

    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
<style>
    body{
        background-image: url('images/background.png');
        background-size: 100%;
    }
</style>
</head>
<body>

<div class="center-container">

			<div class="w3_agile_header">
                <div style="width: 150px; height: 100px; border: 0px solid; float: right;">
                    <img src="images/1.png" style="width: 100%; background-size: 100%">
                </div>
						<div class="w3_agileits_logo" style="width: 1200px; padding-bottom: 20px;font-size: 70px">
                             <center>
                            <a class="brand" href="">BANDSHOP</a>
                            </center>
							</div>
							<div class="w3_menu">
							

					<div class="clearfix"></div>
			    </div>

    <div id="app">
      <nav class="navbar navbar-expand-md sticky-top " style="background-color: white ; color: white">
            <div class="container-fluid ">
               
                        <a class="navbar" href="{{ url('/') }}">
                            BANDSHOP
                        </a>
                  
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="nav-item" style="margin-right:10px">
                                <a class="nav-link   " href="{{ url('/') }}">
                                <i class="fa fa-home"></i> Home</a>
                        </li>
                        @if (Auth::check())
                        <li class="nav-item dropdown" style="margin-right:10px">
                            <a class="nav-link dropdown-toggle    " href="#" id="navbarDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cube"></i>    Product
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home')
                                }}">List Produk</a>
                                <a class="dropdown-item" href="{{ route('admin.products.index')
                                }}">List Produk User</a>

                                <a class="dropdown-item" href="{{ route('admin.products.create')
                                }}"> Tambah</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown" style="margin-right:10px">
                            <a class="nav-link dropdown-toggle   " href="#" id="navbarDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-exchange-alt"></i> Order
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.orders.index')
                                }}"><i class="fas fa-list"></i> List</a>

                                <a class="dropdown-item" href="{{ route('admin.orders.create')
                                }}"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('carts.index') }}"><i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-pill badge-danger">
                            @if(session('cart'))
                                {{ count(session('cart')) }}
                            @else
                                0
                            @endif
                            </span></a>
                        </li>
                        @endif
                    </ul>
                    <div class="clearfix"> </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a style="margin-right:10px" class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('register') }}"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container mt-4">
    <div class="row ml-2">
        <div class="col-md-3">
            <div class="form-group" style="height: auto; border: 1px solid; border-color: green">
                <form action="{{url('/')}}">
                    <select class="custom-select mr-sm-2" id="categories" name="filter_category">
                        <option hidden>Choose Category...</option>
                        @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach                       
                    </select>
                    </form>
                </div>

            </div>
            <div class="col-md-8 " style="padding-left: 500px ; width: 200px">
                <div class="form-group">
                <form action="{{url('/')}}">
                    <select name="sorting" id="sorting" class="form-control">
                        <option hidden> Sort By</option>
                        <option value="best_seller">Best Seller</option>
                        <option value="terbaik">Terbaik</option>
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                        <option value="terbaru">Terbaru</option>
                        <option value="most_viewed">View</option>
                    </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">

            @yield('content')
            </div>
</div>
        </main>
    </div>
    @include('layouts.script')


    <div class="copyright">
	           <p>© 2019 BANDSHOP. All rights reserved | Design by Rifqi Rojab Dzulfikri</p>
    </div>

</body>
</html>
