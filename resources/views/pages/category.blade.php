@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')



<!--<script src="extensions/editable/bootstrap-table-editable.js"></script>-->

<main>
    @if($categoryProducts->total() == 0)
        <h3>Sorry, we could not find any product with the category '{{ $category }}'</i></h3>
    @else
    <div class="mt-5 container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" style="color: black;">{{ $category }}</li>
            </ol>
        </nav>
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>{{ $category }}</h2></div>
        <div class="row flex-wrap justify-content-between" style="gap: 2rem">
            @each('partials.product_card', $categoryProducts, 'product')
        </div>
    </div>
    <div class="text-center">
        {!! $categoryProducts->appends(request()->input())->links(); !!}
    </div>
</main>
@endif

@endsection
