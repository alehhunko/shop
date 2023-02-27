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
        <div class="col-sm-4">
            <div class="card mt-5">
                <article class="card-group-item ">
                    <header class="card-header">
                        <h6 class="title">Seach </h6>
                    </header>
                    <form class="filter-content" action="{{route('index')}}" method="GET">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {{-- <label>Min</label> --}}
                                    <input name="name" type="text" class="form-control">
                                </div>
                                {{-- <div class="form-group col-md-6 text-right">
                                    <label>Max</label>
                                    <input name="price_max" type="number" min=0 value=0 class="form-control">
                                </div> --}}
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-primary">Filter</button>
                            </div>
                        </div> <!-- card-body.// -->
                    </form>
                </article> <!-- card-group-item.// -->
                {{-- <div> {{$products_filter->withQueryString()->links() }} </div> --}}
                {{-- <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Brand </h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                            <div class="custom-control custom-checkbox">
                                <span class="float-right badge badge-light round">52</span>
                                <input type="checkbox" class="custom-control-input" id="Check1">
                                <label class="custom-control-label" for="Check1">Samsung</label>
                            </div> <!-- form-check.// -->

                            <div class="custom-control custom-checkbox">
                                <span class="float-right badge badge-light round">132</span>
                                <input type="checkbox" class="custom-control-input" id="Check2">
                                <label class="custom-control-label" for="Check2">Black berry</label>
                            </div> <!-- form-check.// -->

                            <div class="custom-control custom-checkbox">
                                <span class="float-right badge badge-light round">17</span>
                                <input type="checkbox" class="custom-control-input" id="Check3">
                                <label class="custom-control-label" for="Check3">Samsung</label>
                            </div> <!-- form-check.// -->

                            <div class="custom-control custom-checkbox">
                                <span class="float-right badge badge-light round">7</span>
                                <input type="checkbox" class="custom-control-input" id="Check4">
                                <label class="custom-control-label" for="Check4">Other Brand</label>
                            </div> <!-- form-check.// -->
                        </div> <!-- card-body.// -->
                    </div>
                </article> <!-- card-group-item.// --> --}}
            </div> <!-- card.// -->

        </div>
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