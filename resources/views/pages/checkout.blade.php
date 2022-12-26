@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<main>
    <div class="container py-5">
        <nav class="path" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="shopcart">ShopCart</a></li>
                <li class="breadcrumb-item active" style="color: black;">Checkout</li>
            </ol>
        </nav>
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>Checkout</h2></div>
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-9" style="margin-bottom: 20px">
                <div class="checkout_state_bar mb-3 d-flex align-items-center justify-content-center py-2">
                    <ul class="nav nav-pills nav-justified stepper-wrapper" id="pills-tab" role="tablist">
                        <li class="nav-item stepper-item active" id="billingAddress" role="presentation">
                            <div class="step-counter"></div>
                            <div class="step-name nav-link active" onclick="tabAddress()" id="pills-address-tab" data-bs-toggle="pill" data-bs-target="#pills-address" type="button" role="tab" aria-controls="pills-address" aria-selected="true">Billing Address</div>
                        </li>
                        <li class="nav-item stepper-item" id="paymentMethod" role="presentation">
                            <div class="step-counter"></div>
                            <div class="step-name nav-link" onclick="tabPayment()" id="pills-pay-tab" data-bs-toggle="pill" data-bs-target="#pills-pay" type="button" role="tab" aria-controls="pills-pay" aria-selected="false">Payment Method</div>
                        </li>
                        <li class="nav-item stepper-item" id="confirmCheckout" role="presentation">
                            <div class="step-counter"></div>
                            <div class="step-name nav-link" onclick="tabConfirm()" id="pills-confirm-tab" data-bs-toggle="pill" data-bs-target="#pills-confirm" type="button" role="tab" aria-controls="pills-confirm" aria-selected="false">Confirm Checkout</div>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContentCheckout">
                    <div class="tab-pane fade show active" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">
                        <p>Choose a billing address from the following:</p>
                        <div style="display: flex; gap: 2rem;">
                            @each('partials.address_card', Auth::user()->address()->get(), 'address')
                        </div>
                        <button style="position: absolute; bottom: 1rem; right: 1rem;" class="btn btn-success" onclick="document.getElementById('pills-pay-tab').click()">Continue -></button>
                    </div>
                    <div class="tab-pane fade" id="pills-pay" role="tabpanel" aria-labelledby="pills-pay-tab">
                        <p>Generator of iban to pay for the order:</p>
                        <button style="position: absolute; bottom: 1rem; right: 1rem;" class="btn btn-success" onclick="document.getElementById('pills-confirm-tab').click()">Continue -></button>
                    </div>
                    <div class="tab-pane fade" id="pills-confirm" role="tabpanel" aria-labelledby="pills-confirm-tab">
                        <p>Resume of the order address/payment/and info:</p>
                        <button style="position: absolute; bottom: 1rem; right: 1rem;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkoutModal" onclick="tabAll()">Finish Checkout</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-4 wishlist_summary">
                    <h4 class="mb-3"><strong>Checkout Details</strong></h4>
                    <ul class="list-group list-group-flush">
                        <li
                        class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 mb-2">
                        Products
                        <span>{{sizeof($products)}}</span>
                        </li>
                        <li
                        class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 mb-3">
                        <strong>TOTAL</strong>
                        <span><strong>{{array_sum(array_column($products->toArray(), 'price'))}} €</strong></span>
                        </li>
                    </ul>
                    <hr class="my-4" />
                    @foreach($products as $product)
                        <p><strong>{{$product->prodname}}</strong> | {{$product->pivot->quantity}} | {{$product->price}}<p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="checkoutModalHeader">Finish your Purchase</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        After this action your order will be created.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" onclick="addToOrders()">Buy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection