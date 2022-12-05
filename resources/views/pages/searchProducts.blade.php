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

    function deleteProduct(id) {
        sendAjaxRequest("POST", "adminManageProducts/delete", {id : id}); // request sent to adminManageProducts/delete with out id {parameter : myVariable}
        console.log("deletedProduct" + id);
        document.querySelector("#productForm" + id).remove();
    }
</script>

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active"><a href="/adminManageProducts">SearchProducts</a></li>
  <li class="breadcrumb-item active">search({{ $searchStr }})</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>
@if($searchProducts->total() == 0)
    <h3>Sorry, we could not find any product with name <i>{{ $searchStr }}</i></h3>
@else

<h1 style="margin-left: 10px">We have found the following products:</h1>
<p>({{$searchProducts->total()}} product(s) found) </p>

<div style="margin-left: 10px; margin: 20px;">
    <div class="data_div">
        @foreach($searchProducts as $product)
            <div class="card userCard" style="margin-top: 30px; display: flex;" id="productForm{{ $product->id }}">
                <div class="card-header">
                    <strong>{{ $product->prodname }}</strong>
                </div>
                <div class="card-body">
                    <p class="card-text userEmail">Price: {{ $product->price }}</p>
                    <p class="card-text userEmail">Launch date: {{ $product->launchdate }}</p>    
                </div>
                <div class="card_buttons">
                    <a class="btn" onClick="deleteProduct({{ $product->id }})" style="text-align: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {!! $searchProducts->links(); !!}
    </span>
</div>
@endif

@endsection
