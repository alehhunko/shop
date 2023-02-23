@extends('layouts/main')
@section('title', 'Shop - Shopping cart')
@section('contents')
<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                </div>
                @foreach ($session as $product)
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src={{ $product->options->image }}
                                class="img-fluid rounded-3" alt="">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal mb-2">{{$product->name}}</p>
                                <p><span class="text-muted">Code: </span>{{ $product->options->code }}
                                </p>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="bi bi-dash-lg"></i>
                                </button>

                                <input id="form1" min="0" name="quantity" value="{{$product->qty}}" type="number"
                                    class="form-control form-control-sm" />

                                <button class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0">${{$product->price}}</h5>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="#!" class="text-danger"><i class="bi bi-trash-fill"
                                        style="font-size: 1.5rem"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="card">
                    <div class="card-body">
                        <a class="text-decoration-none" href="{{route('order')}}">
                            <button type="button" class="btn btn-outline-primary btn-block btn-lg">Order</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection