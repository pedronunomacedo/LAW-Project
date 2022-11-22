@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageOrders</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<h1 style="margin-left: 10px">All orders...</h1>

<div style="margin-left: 10px; margin: 20px;">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <!-- <th scope="col">Product id</th> -->
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">Order Date</th>
                <th scope="col" style="text-align: center">Order State</th>
                <th scope="col" style="text-align: center">User ID</th>
                <th scope="col" style="text-align: center">Address</th>
                <th scope="col" style="text-align: center">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allOrders as $order)
                <form action="{{ route('adminManageUpdateOrders', ['id' => $order->id]) }}" method="POST">
                    @csrf
                    <tr>
                        <!-- <th contenteditable='true' scope="row">{{ $order->id }}</th> -->
                        <th scope="row" id="orderID" style="text-align: center">{{ $order->id }}</th>
                        <td id="orderDate" style="text-align: center">{{ date('d-m-Y', strtotime($order->orderdate)) }}</td>
                        <td>
                            <select class="form-select" id="exampleSelect2" name="category_selector">
                                @foreach($allOrderStates as $orderState)
                                    @if ($orderState <> $order->orderstate))
                                        <option style="text-align: center">{{ $orderState }}</option>
                                    @else
                                        <option selected="selected" style="text-align: center">{{ $order->orderstate }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>

                        <td id="orderUserID" style="text-align: center">{{ $order->idusers }}</td>
                        <td id="orderAddress" style="text-align: center">{{ $order->idaddress }}</td>

                        <td>
                            <button class="btn" style="float: right; margin-right: 20px" id="save_button" type="submit" style="text-align: center; justify-content: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                    <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
</div>

@endsection