@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')


<link href="/css/rangeSlider.css" rel="stylesheet">
<script type="text/javascript" src={{ asset('js/rangeSlider.js') }} defer></script>

<main>
    <div class="mt-5 container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" style="color: black;">{{ $category }}</li>
            </ol>
        </nav>
        @if($categoryProducts->total() == 0)
            <h3>Sorry, we could not find any product with name <i>{{ $category }}</i></h3>
        @else
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>{{ $category }}</h2></div>
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-3">
                <div class="filter_sidebar">
                    <h4 class="mb-4"><strong>Filters</strong></h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item align-items-center border-0 p-0 mb-2">
                            <h5><strong>Release Year</strong></h5>
                            <hr class="mb-3"/>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="2022Check">
                                <label class="form-check-label" for="2022Check">
                                    2022
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="2021Check">
                                <label class="form-check-label" for="2021Check">
                                    2021
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="2020Check">
                                <label class="form-check-label" for="2020Check">
                                    2020
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="lt2020Check">
                                <label class="form-check-label" for="lt2020Check">
                                    &lt;2020
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
                    @each('partials.product_card', $categoryProducts, 'product')
                    <!-- Single item -->
                </div>
                <div class="text-center">
                    {!! $categoryProducts->appends(request()->input())->links(); !!}
                </div>
            </div>
        </div>
        @endif
    </div>
</main>

@endsection
