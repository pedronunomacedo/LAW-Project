@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')
<main>
    <div class="container py-5">
        <nav class="path" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category_page', ['category'=> $product->categoryname]) }}">{{ $product->categoryname }}</a></li>
                <li class="breadcrumb-item" style="color: black;"><strong>{{ $product->prodname }}</strong></li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-center my-4" id="two_main_divs">
            <div class="col-md-7">
                <div class="product_page_img mb-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
                            <?php for ($x = 1; $x < count($productImages); $x++) { ?>
                                <button class="bg-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $x ?>" aria-label="Slide <?= $x + 1 ?>"></button>
                            <?php } ?>
                        </div>
                        @if (count($productImages) > 0)
                            <div class="carousel-inner">
                                <div class="carousel-item active" style="">
                                    <img src="<?= $productImages[0]->imgpath ?>" class="d-block ">
                                </div>
                                <?php for ($y = 1; $y < count($productImages); $y++) { ?>
                                    <div class="carousel-item">
                                        <img src="<?= $productImages[$y]->imgpath ?>" class="d-block ">
                                    </div>
                                <?php } ?>
                            </div>
                        @else
                            <div class="carousel-inner">
                                <div class="carousel-item active" style="">
                                    <img src="#" class="d-block ">
                                </div>
                            </div>
                        @endif
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" style="background-color: black; border-radius: 5px" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" style="background-color: black; border-radius: 5px" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
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
                            @if (count($productReviews) == 0)
                                <span>No reviews found...</span>
                            @else
                            @foreach($productReviews as $review)
                                <hr class="my-4" />
                                <div id="review{{ $review->id }}">
                                    <p style="font-weight:normal"><strong>{{ $review->name }}</strong>, {{ $review->reviewdate }}</p>
                                    <p style="font-weight:normal">{{ $review->content }}</p>
                                    <div class="ratings">
                                        <?php
                                        for ($x = 0; $x < $review->rating; $x++) {?> 
                                            <i class="fa fa-star rating-color"></i>
                                        <?php } ?>
                                        <?php
                                        for ($x = 0; $x <= 4 - $review->rating; $x++) {?> 
                                            <i class="fa fa-star"></i>
                                        <?php } ?>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-4 product_page_info position-relative" id="product_info_div">
                    <h4 class="mb-3"><strong>{{$product->prodname}}</strong></h4>
                    <div class="product_card_ratings mb-3">
                        <?php
                        for ($x = 0; $x < $product->score; $x++) {?> 
                            <i class="fa fa-star rating-color"></i>
                        <?php } ?>
                        <?php
                        for ($x = 0; $x <= 4 - $product->score; $x++) {?> 
                            <i class="fa fa-star"></i>
                        <?php } ?>
                    </div>
                    <h2 class="mb-3" style="color: red"><strong>{{ $product->price }} €</strong></h2>
                    <div style="position: absolute; bottom: 1rem; right: 1rem;">
                        <button type="button" class="btn btn-success" onclick="addToWishlist({{ $product->id }})">
                            <i class="fas fa-heart"></i>  Add to Wishlist
                        </button>
                        <button type="button" class="btn btn-danger" onclick="addToShopCart({{ $product->id }})">
                            <i class="fas fa-shopping-cart"></i>  Add to Shopcart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection