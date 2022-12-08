@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<ol class="breadcrumb" style="margin: 0px 100px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">{{ $product->prodname }}</li>
</ol>

<h1 style="margin-left: 10px">{{ $product->prodname }}</h1>

<div class="container">
    @foreach($productImages as $image)
        <img src="https://cdn.pixabay.com/photo/2016/10/02/19/51/chip-1710300_960_720.png" />
    @endforeach

    
    <div id="productDescription">
        <h2>Description</h2>
        <p>{{ $product->proddescription }}</p>
    </div>
    <div id="productInfo">
        <h5 style="color: red">Price: {{ $product->price }} €</h5>
        <h6>Score: {{ $product->score }}</h6>
    </div>
    <div id="generalInfo">
        <p>Pick up on the store in 15 min. <strong>(FREE)</p>
    </div>

    <div id="product_buttons">
        <button onClick="" class="btn btn-light">Add to wishlist</button>
        <button onClick="" type="button" class="btn btn-info">Add to shop cart</button>
    </div>
    
    <h3>Reviews...</h3>
    <section id="product_reviews">
        @foreach($productReviews as $review)
            <div id="review{{ $review->id }}">
                <p style="font-weight:normal"><strong>userID</strong>: {{ $review->idusers }}</p>
                <p style="font-weight:normal"><strong>Date:</strong> {{ $review->reviewdate }}</p>
                <p style="font-weight:normal"><strong>Rating</strong>: {{ $review->rating }}</p>
                <p style="font-weight:normal"><strong>Content:</strong> {{ $review->content }}</p>
            </div>
        @endforeach
    </section>
</div>

@endsection