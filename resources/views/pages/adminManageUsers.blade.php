@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<ol class="breadcrumb" style="margin: 0px 100px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageUsers</li>
</ol>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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

    function deleteUser(id) {
        sendAjaxRequest("POST", "adminManageUsers/delete", {id : id}); // request sent to adminManageProducts/delete with out id {parameter : myVariable}

        document.querySelector("#userForm" + id).remove();
    }
</script>


<div class="mainDiv" style="margin: 0px 100px;">
    <h1>Manage users...</h1>
    <div id="search_div" style="display: block; text-align: center; width: 100%;">
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{ url('search') }}" method="GET" role="search">
            <input type="search" name="search" value="" class="form-control form-control-light text-bg-light" placeholder="Search for users" aria-label="Search">
        </form>
    </div>
    <div class="data_div">
        @foreach($allUsers as $user)
            <div class="card userCard" style="margin-top: 30px; display: flex;" id="userForm{{ $user->id }}">
                <div class="card-header">
                    <strong>{{ $user->name }}</strong>
                </div>
                <div class="card-body">
                    <p class="card-text userEmail">Email: {{ $user->email }}</p>
                    <p class="card-text userEmail">Phone number: {{ $user->phonenumber }}</p>    
                </div>
                <div class="card_buttons">
                    <a class="btn" id="userSearch" onClick="deleteUser({{ $user->id }})" style="text-align: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <p style="margin-top: 5px; color: grey;">* If you would like to search for a user not specified in the table, use the search bar on the top of this page.</p>

    <div class="text-center">
        {!! $allUsers->links(); !!}
    </div>
</div>

@endsection