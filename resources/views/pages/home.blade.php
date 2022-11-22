@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<!-- MISSING DISPLAYING THE CATEGORIES -->
<script src={{ asset('js/product.js') }} defer></script>
<main>
    <div class="mt-5 container">
        <h2>New Releases</h2>
        <div class="row justify-content-between">
        @foreach($newProducts as $newProduct)
            <div class="mt-4 col-md-6 col-lg-2 bg-opacity-25 bg-dark">
                <div class="box d-flex flex-column align-items-center">
                    <a href="{{ route('product', ['product_id'=> $newProduct->id]) }}"><img src="https://cdn.pixabay.com/photo/2016/10/02/19/51/chip-1710300_960_720.png" alt="{{ $newProduct->prodName }}" class="img-fluid" style="cursor:pointer;"></a>
                    <a href="{{ route('product', ['product_id'=> $newProduct->id]) }}"><h6 style="cursor:pointer;">{{ $newProduct->prodname }}</h6></a>
                    <span>{{ $newProduct->price }} €</span>
                    <div>
                        <button class="btn" onclick="sendRequest('post','wishlist', {{$newProduct->id}})"><i class="fas fa-star"></i></button>
                        <button class="btn" onclick="addToShopCart(null, {{$newProduct->id}})"><i class="fas fa-shopping-bag"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="mt-5 container">
        <h2>Best Smartphones</h2>
        <div class="row justify-content-between">
        @foreach($bestSmartphones as $Smartphone)
            <div class="mt-4 col-md-6 col-lg-2 bg-opacity-25 bg-dark">
                <div class="box d-flex flex-column align-items-center">
                    <a href="{{ route('product', ['product_id'=> $Smartphone->id]) }}"><img src="https://cdn.pixabay.com/photo/2013/07/12/18/39/smartphone-153650_960_720.png" alt="{{ $Smartphone->prodName }}" class="img-fluid" style="cursor:pointer;"></a>
                    <a href="{{ route('product', ['product_id'=> $Smartphone->id]) }}"><h6 style="cursor:pointer;">{{ $Smartphone->prodname }}</h6></a>
                    <span>{{ $Smartphone->price }} €</span>
                    <div>
                        <a class="btn" href="#"><i class="fas fa-star"></i></a>
                        <a class="btn" href="#"><i class="fas fa-shopping-bag"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="mt-5 container">
        <h2>Best Laptops</h2>
        <div class="row justify-content-between">
        @foreach($bestLaptops as $Laptop)
            <div class="mt-4 col-md-6 col-lg-2 bg-opacity-25 bg-dark">
                <div class="box d-flex flex-column align-items-center">
                    <a href="{{ route('product', ['product_id'=> $Laptop->id]) }}"><img src="https://cdn.pixabay.com/photo/2012/04/13/20/24/laptop-33521_960_720.png" alt="{{ $Laptop->prodName }}" class="img-fluid" style="cursor:pointer;"></a>
                    <a href="{{ route('product', ['product_id'=> $Laptop->id]) }}"><h6 style="cursor:pointer;">{{ $Laptop->prodname }}</h6></a>
                    <span>{{ $Laptop->price }} €</span>
                    <div>
                        <a class="btn" href="#"><i class="fas fa-star"></i></a>
                        <a class="btn" href="#"><i class="fas fa-shopping-bag"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</main>


@endsection