@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">Profile</li>
</ol>

<h1>My Profile</h1>
@if (Auth::user()->isAdmin() and Auth::check())
  
@elseif (Auth::check())
  <div class="list-group" style="padding-left: 10px; width: 15%; font-size: 120%;">
    <button href="#" class="list-group-item list-group-item-action active">My details</button>
    <button href="#" class="list-group-item list-group-item-action">My Addresses</button>
    <button href="#" class="list-group-item list-group-item-action">My Orders</button>
    <button href="#" class="list-group-item list-group-item-action" data-target="#exampleModal">Delete account</button>

    <!-- Button trigger modal -->
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
    </button> -->

    
  </div>
@endif

@endsection