@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="container py-5">
    <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>Checkout</h2></div>
    <div class="row d-flex justify-content-center my-4">
        <div class="col-md-9">
            <div class="checkout_state_bar mb-3 d-flex align-items-center justify-content-center py-2">
                <div class="stepper-wrapper">
                    <div class="stepper-item active" id="billingAddress">
                        <div class="step-counter"></div>
                        <div class="step-name">Billing Address</div>
                    </div>
                    <div class="stepper-item" id="paymentMethod">
                        <div class="step-counter"></div>
                        <div class="step-name">Payment Method</div>
                    </div>
                    <div class="stepper-item" id="confirmCheckout">
                        <div class="step-counter"></div>
                        <div class="step-name">Confirm Checkout</div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item my-3" style="border: 0; border-radius: 10px;">
                    <h2 class="accordion-header" id="headingBillingAddress">
                    <button style="border: 0; border-radius: 10px;" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBillingAddress" aria-expanded="true" aria-controls="collapseBillingAddress">
                        Billing Address
                    </button>
                    </h2>
                    <div id="collapseBillingAddress" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            <button class="btn btn-success" onclick="document.querySelector('#headingPaymentMethod > button:nth-child(1)').click(); document.getElementById('billingAddress').classList.add('completed'); document.getElementById('billingAddress').classList.remove('active'); document.getElementById('paymentMethod').classList.add('active');">Next</button>
                        </div>
                    </div>
                </div>
                <div class="accordion-item my-3" style="border: 0; border-radius: 10px">
                    <h2 class="accordion-header" id="headingPaymentMethod">
                    <button style="border: 0; border-radius: 10px;" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePaymentMethod" aria-expanded="false" aria-controls="collapsePaymentMethod">
                        Payment Method
                    </button>
                    </h2>
                    <div id="collapsePaymentMethod" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            <button class="btn btn-success" onclick="document.querySelector('#headingConfirmCheckout > button:nth-child(1)').click(); document.getElementById('paymentMethod').classList.add('completed'); document.getElementById('paymentMethod').classList.remove('active'); document.getElementById('confirmCheckout').classList.add('active');">Next</button>
                        </div>
                    </div>
                </div>
                <div class="accordion-item my-3" style="border: 0; border-radius: 10px">
                    <h2 class="accordion-header" id="headingConfirmCheckout">
                    <button style="border: 0; border-radius: 10px;" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConfirmCheckout" aria-expanded="false" aria-controls="collapseConfirmCheckout">
                        Confirm Checkout
                    </button>
                    </h2>
                    <div id="collapseConfirmCheckout" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#checkoutModal" onclick="document.getElementById('confirmCheckout').classList.add('completed'); document.getElementById('confirmCheckout').classList.remove('active');">Finish</button>
                        </div>
                    </div>
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
                <button type="button" class="btn btn-primary btn-lg">
                    more details
                </button>
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
                    <button type="button" class="btn btn-danger" onclick="">Buy</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection