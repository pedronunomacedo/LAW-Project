@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">Manage Users</li>
</ol>
  
@elseif (Auth::check())
  <div class="list-group" style="padding-left: 10px; width: 15%; font-size: 120%;">
    <button href="#" class="list-group-item list-group-item-action active">My details</button>
    <button href="#" class="list-group-item list-group-item-action">My Addresses</button>
    <button href="#" class="list-group-item list-group-item-action">My Orders</button>
    <button href="#" class="list-group-item list-group-item-action" data-target="#exampleModal">Delete account</button>
  </div>
@endif

@endsection