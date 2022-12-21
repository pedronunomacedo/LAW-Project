@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<nav class="path" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin: 0px 100px">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">ManageProducts</li>
    </ol>
</nav>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

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

        document.querySelector("#productForm" + id).remove();
    }

    function addProduct() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var newProductName = document.getElementById("newProductName").value;
        var newProductPrice = document.getElementById("newProductPrice").value;
        var newProdDescription = document.getElementById("newProdDescription").value;
        var newProductLaunchdate = document.getElementById("newProductLaunchdate").value;
        var newProductStock = document.getElementById("newProductStock").value;
        var newProductCategory = document.getElementById("newProductCategory").value;

        sendAjaxRequest("POST", "adminManageProducts/addProduct", {new_product_name : newProductName, new_product_price : newProductPrice, new_product_description : newProdDescription, new_product_launchdate : newProductLaunchdate, new_product_stock : newProductStock, new_product_category : newProductCategory});
    }
</script>

<div class="mainDiv" style="margin: 0px 100px">
    <h1>All products...</h1>
    <div id="search_div" style="display: block; text-align: center;">
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{ url('search/products') }}" method="GET" role="search">
            <input type="search" name="search" value="" class="form-control form-control-light text-bg-light" placeholder="Search for products" aria-label="Search">
        </form>
    </div>
    <div class="data_div">
        <div class="accordion" id="accordionExample" style="margin-top: 10px">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <i class="fas fa-plus"></i>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Product name: </p>
                        <input type="text" id="newProductName"><br>
                        <p>Product price: </p>
                        <input type="text" id="newProductPrice">
                        <div>
                            <label for="newProdDescription">Product description: </label><br>
                            <textarea id="newProdDescription" name="productDescription" rows="4" cols="50"></textarea>
                        </div><br>
                        <p>Product launch date: <input type="date" name="productLaunchdate" id="newProductLaunchdate"></p>
                        <p>Stock: <input type="text" name="productStock" id="newProductStock"></p>
                        <p>Product category: </p>
                        <div>
                            <select class="form-select" name="category_selector" id="newProductCategory">
                                <option style="text-align: center">Select a category</option>
                                @foreach($allCategories as $category)
                                    <option style="text-align: center">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a onClick="addProduct()" type="submit" class="btn btn-success" value="Product create" style="margin-top: 10px;">Create Product</a>
                    </div>
                </div>
            </div>
        </div>
        @foreach($allProducts as $product)
            <div class="card userCard" style="margin-top: 30px; display: flex;" id="productForm{{ $product->id }}">
                <div class="card-header">
                    <strong>{{ $product->prodname }}</strong>
                </div>
                <div class="card_body" style="padding: 20px">
                    <div class="card_body" style="display: inline-block;">
                        <p class="card-text productPrice">Price: {{ $product->price }}</p>
                        <p class="card-text productLaunchdate">Launch date: {{ $product->launchdate }}</p>    
                    </div>
                    <div class="div_buttons" style="display: inline-block; float: right; align-items: center;">
                        <a class="btn" onClick="" style="text-align: center; justify-content: center;">
                            <svg fill="none" height="40" width="40" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 13V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V13" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 15V3M12 3L8.5 6.5M12 3L15.5 6.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a class="btn" id="productSearch" onClick="deleteProduct({{ $product->id }})" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {!! $allProducts->links(); !!}
    </span>
</div>

@endsection




<!-- <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <th scope="col" style="text-align: center">Product name</th>
                <th scope="col" style="text-align: center">Price</th>
                <th scope="col" style="text-align: center">Stock</th>
                <th scope="col" style="text-align: center">Launch Date</th>
                <th scope="col" style="text-align: center">Category</th>
                <th scope="col" style="text-align: center">Description</th>
                <th colspan=2 style="text-align: center">Options</th>
            </tr>
        </thead>
        <tbody>
            <tr id="addNewProductForm">
                <th colspan=8 style="text-align: center;">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Product name: <input type="text" id="newProductName"></p>
                                    <p>Product price: <input type="text" id="newProductPrice"></p>
                                    <div>
                                        <label for="newProdDescription">Product description: </label>
                                        <textarea id="newProdDescription" name="productDescription" rows="4" cols="50"></textarea>
                                    </div>
                                    <p>Product launch date: <input type="date" name="productLaunchdate" id="newProductLaunchdate"></p>
                                    <p>Stock: <input type="text" name="productStock" id="newProductStock"></p>
                                    <div>
                                        <p>Product category: 
                                            <select class="form-select" name="category_selector" id="newProductCategory">
                                                <option style="text-align: center">Select a category</option>
                                                <option style="text-align: center">Smartphones</option>
                                                <option style="text-align: center">TVs</option>
                                                <option style="text-align: center">Laptops</option>
                                                <option style="text-align: center">Desktops</option>
                                                <option style="text-align: center">Others</option>
                                            </select>
                                        </p>
                                    </div>
                                    <a onClick="addProduct()" type="submit" class="btn btn-success" value="Product create">Create Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
            @foreach($allProducts as $product)
                <tr id="productForm{{ $product->id }}">
                    <th scope="row" style="white-space: nowrap; text-align: center; justify-content: center;"><input name="product_name" style="all: unset;" value="{{ $product->prodname }}" id="product_name{{ $product->id }}"></input></th>
                    <td name="productPrice" style="text-align: center; justify-content: center;"><input name="product_price" style="all: unset;" value="{{ $product->price }}" id="product_price{{ $product->id }}"></input></td>
                    <td name="productStock" style="text-align: center; justify-content: center;"><input name="product_stock" style="all: unset;" value="{{ $product->stock }}" id="product_stock{{ $product->id }}"></input></td>
                    <td name="productLaunchDate" style="text-align: center; justify-content: center;"><input name="product_launchdate" style="all: unset;" value="{{ $product->launchdate }}" id="product_launchDate{{ $product->id }}"></input></td>
                    <td>
                        <select class="form-select" id="product_category{{ $product->id }}" name="category_selector">
                            <option selected="selected">{{ $product->categoryname }}</option>
                            @foreach($allCategories as $category)
                                @if ($category <> $product->categoryname))
                                    <option>{{ $category }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                    <td name="productDescription{{ $product->id }}" style="text-align: center; justify-content: center;"><input name="product_description" style="all: unset;" value="{{ $product->proddescription }}" id="product_description{{ $product->id }}"></input></td>
                    <td>
                        <a class="btn" onClick="deleteProduct({{ $product->id }})" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" color="blue">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a onClick="updateProduct({{ $product->id }})" class="btn" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> -->