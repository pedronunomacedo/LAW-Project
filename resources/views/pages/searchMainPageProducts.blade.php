@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<script>
    function encodeForAjax(data) {
        if (data == null) return null;
        return Object.keys(data).map(function(k){
            return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
        }).join('&');
    }

    function sendAjaxRequest(method, url, data, handler) {
        let request = new XMLHttpRequest();

        request.open(method, url, true);
        request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.addEventListener('load', handler);
        request.send(encodeForAjax(data));
    }

    var deletedProducts = 0; // global variable  
    function deleteProduct(id, numProducts) {
        deletedProducts++;
        sendAjaxRequest("POST", "adminManageProducts/delete", {id : id}); // request sent to adminManageProducts/delete with out id {parameter : myVariable}
        document.querySelector("#productForm" + id).remove();
        document.querySelector("#paragraph_num_products_found").innerHTML = "(" + (numProducts - deletedProducts).toString() + " product(s) found)";
    }
</script>

<link href="/css/rangeSlider.css" rel="stylesheet">
<script type="text/javascript" src={{ asset('js/rangeSlider.js') }} defer></script>

<main>
    <div class="mt-5 container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" style="color: black;">Search</li>
            </ol>
        </nav>
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>Search Result: <span style="font-style: italic">{{ $searchStr }}</span></h2></div>
        @if($searchProducts->total() == 0)
            <h3>Sorry, we could not find any product with name <i>{{ $searchStr }}</i></h3>
        @else
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-3">
                <div class="filter_sidebar">
                    <h4 class="mb-4"><strong>Filters</strong></h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item align-items-center border-0 p-0 mb-2">
                            <h5><strong>Categories</strong></h5>
                            <hr class="mb-3"/>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="SmartphonesCheck">
                                <label class="form-check-label" for="SmartphonesCheck">
                                    Smartphones
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="ComponentsCheck">
                                <label class="form-check-label" for="ComponentsCheck">
                                    Components
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="TVsCheck">
                                <label class="form-check-label" for="TVsCheck">
                                    TVs
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="LaptopsCheck">
                                <label class="form-check-label" for="LaptopsCheck">
                                    Laptops
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="DesktopsCheck">
                                <label class="form-check-label" for="DesktopsCheck">
                                    Desktops
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="OtherCheck">
                                <label class="form-check-label" for="OtherCheck">
                                    Other
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item align-items-center border-0 p-0 mb-2">
                            <h5><strong>Price</strong></h5>
                            <hr class="mb-3"/>
                            <div class="row">
                                <div class="col-sm-12">
                                <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="row slider-labels">
                                <div class="col-xs-6 caption">
                                    <strong>Min:</strong> <span id="slider-range-value1"></span>
                                </div>
                                <div class="col-xs-6 text-right caption">
                                    <strong>Max:</strong> <span id="slider-range-value2"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                <form>
                                    <input type="hidden" name="min-value" value="">
                                    <input type="hidden" name="max-value" value="">
                                </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="filter_orderby_bar mb-3 d-flex align-items-center justify-content-end py-2">
                    <span>Order By: </span>
                    <select class="form-select">
                        <option selected>Rating</option>
                        <option value="1">ASC Price</option>
                        <option value="2">DESC Price</option>
                    </select>
                </div>
                <div class="d-flex flex-wrap " style="gap: 2rem">
                    <!-- Single item -->
                    @each('partials.product_card', $searchProducts, 'product')
                    <!-- Single item -->
                </div>
                <div class="text-center">
                    {!! $searchProducts->appends(request()->input())->links(); !!}
                </div>
            </div>
        </div>
        @endif
    </div>
</main>


@endsection
