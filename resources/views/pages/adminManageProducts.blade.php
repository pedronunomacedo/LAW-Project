@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<h1 style="margin-left: 10px">All products...</h1>
<div style="margin-left: 10px; margin: 20px;">

    <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <th scope="col">Product name</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Launch Date</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <script>
                $('button').click(function(e){
                    $(this).closest('tr').remove()
                })
            </script>
            @foreach($allProducts as $product)
                <tr>
                    <th contenteditable='true' scope="row">{{ $product->prodname }}</th>
                    <td contenteditable='true'>{{ $product->price }}</td>
                    <td contenteditable='true'>{{ $product->stock }}</td>
                    <td contenteditable='true'>{{ $product->launchdate }}</td>
                    <td>
                        <select class="form-select" id="exampleSelect2">
                            @foreach($allCategories as $category)
                                @if (!strcmp($category, $product->category))
                                    <option>{{ $category }}</option>
                                @else
                                    <option selected="selected">{{ $category }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                    <td contenteditable='true'>{{ $product->proddescription }}</td>
                    <td>
                        <button onClick="rote({{ $product::destroy($product) }})" style="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" width="100px" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        <button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection