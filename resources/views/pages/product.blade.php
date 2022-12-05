@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')


<div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
        <div class="col-md-7">
            <div class="product_page_img mb-4">
                @foreach($productImages as $image)
                    <img src="https://cdn.pixabay.com/photo/2016/10/02/19/51/chip-1710300_960_720.png" />
                @endforeach
            </div>
            <div class="product_page_tabs mb-4">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                        <p class="mb-0">{{ $product->proddescription }}</p>
                    </div>
                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                        @foreach($productReviews as $review)
                            <div id="review{{ $review->id }}">
                                <p style="font-weight:normal"><strong>userID</strong>: {{ $review->idusers }}</p>
                                <p style="font-weight:normal"><strong>Date:</strong> {{ $review->reviewdate }}</p>
                                <p style="font-weight:normal"><strong>Rating</strong>: {{ $review->rating }}</p>
                                <p style="font-weight:normal"><strong>Content:</strong> {{ $review->content }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-4 product_page_info">
                <h4 class="mb-3"><strong>{{$product->prodname}}</strong></h4>
                <h5 class="mb-3" style="color: red"><strong>{{ $product->price }} €</strong></h5>
                <button type="button" class="btn btn-danger" onclick="addToShopCart({{ $product->id }})">
                    <i class="fas fa-shopping-bag"></i>  Add to Shopcart
                </button>
            </div>
        </div>
    </div>
</div>


@endsection