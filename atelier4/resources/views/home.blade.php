@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="container">
                            <div class="row ">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a href="{{route('category.index')}}" class="dropdown-item"  >List</a>
                                <a href="{{route('category.create')}}" class="dropdown-item"  >Add</a>

                                <a href="#" class="dropdown-item"  >Search</a>
                            </div>
                        </div>
                                <div class="col-12 col-md-6">
                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Products
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a href="{{route('userProduct.index')}}" class="dropdown-item"  >My Products</a>
                                <a href="{{route('products.index')}}" class="dropdown-item"  >List</a>
                                <a href="{{route('products.create')}}" class="dropdown-item"  >Add</a>

                                <a href="#" class="dropdown-item"  >Search</a>
                            </div>
                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                        <br>

                        @yield('contenu')

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
