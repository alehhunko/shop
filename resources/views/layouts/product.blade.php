<div class="col-md-4 mt-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src={{$image??"https://dummyimage.com/450x300/dee2e6/6c757d.jpg"}} alt="..." />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">{{$name??'name'}}</h5>
                <!-- Product price-->
                {{$price??'price'}}$
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent ">
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-primary mt-auto mr-2" href="{{route('product', [$some??'shoes', $code??'shoes'])}}">Options</a>
                <a class="btn btn-outline-dark mt-auto" href="{{route('cart')}}">
                    <span id="boot-icon" class="bi bi-cart"></span>
                </a>
            </div>
        </div>
    </div>
</div>