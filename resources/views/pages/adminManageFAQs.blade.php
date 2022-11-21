@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageFAQs</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<h1 style="margin-left: 10px">All orders...</h1>

<div style="margin-left: 10px; margin: 20px;">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <!-- <th scope="col">Product id</th> -->
                <th scope="col">ID</th>
                <th scope="col">Question</th>
                <th scope="col">Answer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allFAQs as $faq)
                <tr>
                    <!-- <th contenteditable='true' scope="row">{{ $faq->id }}</th> -->
                    <th scope="row" id="orderID">{{ $faq->id }}</th>
                    <td id="orderDate">{{ $faq->question }}</td>
                    <td contenteditable='true' id="orderDate">{{ $faq->answer }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection