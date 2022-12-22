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

    var deletedUsers = 0;
    function deleteUser(id, numUsers) {
        deletedUsers++;
        sendAjaxRequest("POST", "adminManageUsers/delete", {id : id}); // request sent to adminManageUsers/delete with out id {parameter : myVariable}

        document.querySelector("#userForm" + id).remove();
        document.querySelector("#paragraph_num_users_found").innerHTML = "(" + (numUsers - deletedUsers).toString() + " user(s) found)";
    }
</script>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<nav class="path" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb path" style="margin: 0px 100px">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active"><a href="/adminManageUsers">SearchOrders</a></li>
    <li class="breadcrumb-item active">search({{ $searchStr }})</li>
    </ol>
</nav>

<div style="margin: 0px 100px">
    @if(count($searchOrders) == 0)
        <h2>Sorry, we could not find any orders related to user with name <i>{{ $searchStr }}</i></h2>
    @else
    <h2>We have found the following orders:</h2>
    <p id="paragraph_num_users_found">({{ count($searchOrders) }} order(s) found)</p>
    <div class="data_div">
        @foreach($searchOrders as $order)
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
    </div>
    
</div>
@endif

@endsection
