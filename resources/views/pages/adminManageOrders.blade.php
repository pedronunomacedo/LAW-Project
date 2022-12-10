@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<ol class="breadcrumb" style="margin: 0px 100px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageOrders</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<script>
    function encodeForAjax(data) {
        if (data == null) return null;

        return Object.keys(data).map(function(k){
            return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
        }).join('&');
    }

    function sendAjaxRequest(method, url, data, handler) {
        var request = new XMLHttpRequest();

        request.open(method, url, true);
        request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.addEventListener('load', handler);
        request.send(encodeForAjax(data));
    }

    function updateOrder(id) {
        var newOrderState = document.querySelector("#order_state" + id).value;
        
        sendAjaxRequest("POST", "adminManageOrders/saveChanges", {id : id, new_order_state : newOrderState});
    }
</script>



<div style="margin: 0px 100px">
    <h1>All orders...</h1>
    <div id="search_div" style="display: block; text-align: center;">
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{ url('search/orders') }}" method="GET" role="search">
            <input type="search" name="search" value="" class="form-control form-control-light text-bg-light" placeholder="Search for orders" aria-label="Search">
        </form>
    </div>
    @foreach($allOrders as $order)
        <div class="card userCard" style="margin-top: 30px; display: flex;" id="orderForm{{ $order->id }}">
            <div class="card-header">
                <strong>Order {{ $order->id }}</strong>
            </div>
            <div class="card-body">
                <p class="card-text" id="orderUserId"><strong>User:</strong> {{ $order->name }}</p>
                <p class="card-text" id="orderDate"><strong>Date:</strong> {{ date('d-m-Y', strtotime($order->orderdate)) }}</p>
                <p class="card-text" id="orderAddress"><strong>Address:</strong> {{ $order->street }}</p>    
                <label for="category_selector"><strong>State:</strong> </label>
                <select class="form-select" name="category_selector" id="order_state{{ $order->id }}" style="width: 30%">
                    @foreach($allOrderStates as $orderState)
                        @if ($orderState <> $order->orderstate))
                            <option style="text-align: center">{{ $orderState }}</option>
                        @else
                            <option selected="selected" style="text-align: center">{{ $order->orderstate }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="card_buttons">
                <a class="btn" onClick="updateOrder({{ $order->id }})" style="text-align: center; justify-content: center;">
                    <svg fill="none" height="40" width="40" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 13V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V13" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 15V3M12 3L8.5 6.5M12 3L15.5 6.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
    @endforeach
    <div class="text-center">
        {!! $allOrders->links(); !!}
    </span>
</div>

@endsection