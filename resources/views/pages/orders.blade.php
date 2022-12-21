@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<nav class="path" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin: 0px 100px">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">My Orders</li>
    </ol>
</nav>

<!-- <div style="margin: 0px 100px">
    <h1>My orders...</h1>
    @foreach($userOrders as $order)
        <div class="card userCard" style="margin-top: 30px; display: flex;" id="orderForm{{ $order->id }}">
            <div class="card-header">
                <strong>Order {{ $order->id }}</strong>
            </div>
            <div class="card-body">
                <p class="card-text" id="orderDate"><strong>Date:</strong> {{ date('d-m-Y', strtotime($order->orderdate)) }}</p>
                <p class="card-text" id="orderAddress"><strong>Address:</strong> {{ $order->street }}</p>    
                <p class="card-text" id="orderState"><strong>State:</strong> {{ $order->orderstate }}</p>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed order_info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <span class="card-text" id="orderDate"><strong>Date:</strong> {{ date('d-m-Y', strtotime($order->orderdate)) }}</span> 
                        <span class="card-text" id="orderState"><strong>State:</strong> {{ $order->orderstate }}</span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body orderProducts">
                        {{ $orderProducts =  $order->getOrderProducts($order->id)}}
                        @foreach($orderProducts as $product)
                            <div class="list-group orderProduct">
                                <a href="/product/{{ $product->id }}" class="list-group-item list-group-item-action">
                                    <div class="product_order_info">
                                        <span><strong>Product: </strong>{{ $product->prodname }}</span>
                                        <span><strong>Quantity: </strong>{{ $product->quantity }}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div> -->
<main style="margin: 0px 100px">
    <p>{{ $userOrders }}</p>
    @foreach($userOrders as $order)
        <div class="card user_order">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
            <div class="product_image">
                <img href="" />
            </div>
        </div>
    @endforeach
<main>


@endsection