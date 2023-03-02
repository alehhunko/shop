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
        <form class="filter-content col-sm-4" action="{{route('category', ['category'=>$category->name, 'category_id'=>$category->id])}}" method="GET">
            <div class="card mt-5">
                <article class="card-group-item ">
                    <header class="card-header">
                        <h6 class="title">Seach </h6>
                    </header>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input name="name" type="text" class="form-control" value="{{Session::get('old_name')['name']}}">
                            </div>
                        </div>
                    </div> <!-- card-body.// -->
                </article> <!-- card-group-item.// -->
                <article class="card-group-item ">
                    <header class="card-header">
                        <h6 class="title">Price</h6>
                    </header>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Min</label>
                                <input name="price_min" type="number" min=0 max={{$max_price}} class="form-control" value="{{Session::get('old_name')['min'] ?? 0}}">
                            </div>
                            <div class="form-group col-md-6 text-right">
                                <label>Max</label>
                                <input name="price_max" type="number" min=0 max={{$max_price}} class="form-control" value="{{Session::get('old_name')['max'] ?? $max_price}}">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary">Filter</button>
                        </div>
                    </div> <!-- card-body.// -->
                </article> <!-- card-group-item.// -->
                {{-- <div> {{$products_filter->withQueryString()->links() }} </div> --}}
            </div> <!-- card.// -->
        </form>
        <!-- Product-->
        <div class="col-sm-8">
            <div class="container ">
                <div class="row ">
                    @foreach ($products as $product)
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