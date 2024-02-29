@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-1">
                <div class="sidenav">
                    <a class="active" href="product">Product</a>
                    <a href="order">Order</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-dark text-light">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
