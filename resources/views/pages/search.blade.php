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

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active"><a href="/adminManageUsers">SearchUsers</a></li>
  <li class="breadcrumb-item active">search({{ $searchStr }})</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<div style="margin: 0px 100px">
    @if($searchUsers->total() == 0)
        <h2>Sorry, we could not find any user with name <i>{{ $searchStr }}</i></h2>
    @else
    <h2>We have found the following users:</h2>
    <p id="paragraph_num_users_found">({{ $searchUsers->total() }} user(s) found)</p>
    <div class="data_div">
        @foreach($searchUsers as $user)
            <div class="card userCard" style="margin-top: 30px; display: flex;" id="userForm{{ $user->id }}">
                <div class="card-header">
                    <strong>{{ $user->name }}</strong>
                </div>
                <div class="card-body">
                    <p class="card-text userEmail">Email: {{ $user->email }}</p>
                    <p class="card-text userEmail">Phone number: {{ $user->phonenumber }}</p>    
                </div>
                <div class="card_buttons">
                    <a class="btn" onClick="deleteUser({{ $user->id }}, {{ $searchUsers->total() }})" style="text-align: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {!! $searchUsers->appends(request()->input())->links(); !!}
    </span>
</div>
@endif

@endsection
