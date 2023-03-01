@extends('layouts/main')
@section('title', 'Shop - Home page')
@section('contents')
<!-- Header-->
<header class="bg-dark py-3">
    <div class="container">
        <img src="{{ asset('/img/header.jpg') }}" class="img-fluid">
    </div>
</header>
<!-- Catalog-->
<div class="container ">
    <div class="row">
        <!-- Filter-->
        <form class="filter-content col-sm-4" action="{{route('index')}}" method="GET">
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
                                <input name="price_max" type="number" min=0 max={{$max_price}} class="form-control" value="{{Session::get('old_name')['max']}}">
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