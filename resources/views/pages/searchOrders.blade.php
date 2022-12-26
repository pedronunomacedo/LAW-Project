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

<nav class="path" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin: 0px 100px">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active"><a href="/adminManageOrders">SearchOrders</a></li>
        <li class="breadcrumb-item active">search({{ $searchStr }})</li>
    </ol>
</nav>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<div class="mainDiv" style="margin: 0px 100px">
    @if(count($searchOrders) == 0)
        <h3>Sorry, we could not find any order with user name <i>{{ $searchStr }}</i></h3>
    @else

    <h1>We have found the following products:</h1>
    <p id="paragraph_num_products_found">({{ count($searchOrders) }} orders(s) found) </p>
    <div class="data_div">
        @foreach($searchOrders->values() as $order)
            <div class="card user_order">
                <div class="card-body">
                    <h4 class="card-title">Order {{ $order->id }}</h4>
                    <div class="order_info">
                        
                    </div>
                    <div class="order_products">
                        <h5>Products</h5>
                        <h1>Como posso mudar isto???????????</h1>
                        <p><?php echo App\Models\Order::getOrderProducts($order->id) ?></p>
                        
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
    <div class="text-center">
        {!! $searchOrders->appends(request()->input())->links(); !!}
    </span>
</div>
@endif


@endsection
