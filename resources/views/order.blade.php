@extends('layouts/main')
@section('title', 'Shop - Order confirmation')
@section('contents')
<div class="container h-100">
    <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
            <div class="d-table-cell align-middle">

                <div class="text-center mt-4">
                    <h1 class="h2">Order Confirmation</h1>
                    <p class="lead">
                        To confirm the order, enter your name and phone number and we will contact you.
                    </p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-4">
                            <form action="{{route('order')}}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control form-control-lg" type="text" name="name"
                                        placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control form-control-lg" type="text" name="company"
                                        placeholder="Enter your phone number">
                                </div>
                                <div class="text-center mt-3">
                                    <a href="index.html" class="btn btn-lg btn-primary">
                                        <button type="submit" class="btn btn-lg btn-primary">Сonfirm</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection