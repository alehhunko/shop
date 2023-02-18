@extends('layouts/main')
@section('title', 'Shop - page catergory- '. $category->name)
@section('contents')
<!-- Header-->
<header class="bg-dark py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <img src="{{ asset('/img/category_1.jpg') }}" class="img-fluid">
            </div>
            <div class="col-md-5">
                <img src="{{ asset('/img/category_2.webp') }}" class="img-fluid">
            </div>
        </div>
    </div>
</header>
<!-- Catalog-->
<div class="container ">
    <h2 class="display-4 text-uppercase text-center mt-5">{{$category->code}}</h2>
    <div class="row">
        <!-- Filter-->
        <div class="col-sm-4">
            <div class="card mt-5">
                <article class="card-group-item ">
                    <header class="card-header">
                        <h6 class="title">Price </h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Min</label>
                                    <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <label>Max</label>
                                    <input type="number" class="form-control" placeholder="$1,0000">
                                </div>
                            </div>
                        </div> <!-- card-body.// -->
                    </div>
                </article> <!-- card-group-item.// -->
            </div> <!-- card.// -->
        </div>
        <!-- Product-->
        <div class="col-sm-8">
            <div class="container ">
                <div class="row ">
                    @foreach ($category->products as $product)
                        @foreach ($categories as $category)
                            @if ($product->category_id===$category->id)
                            @include('layouts/product', [compact('product'), $category->name])
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection