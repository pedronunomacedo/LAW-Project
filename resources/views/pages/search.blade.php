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
    <li class="breadcrumb-item active"><a href="/adminManageUsers">SearchUsers</a></li>
    <li class="breadcrumb-item active">search({{ $searchStr }})</li>
    </ol>
</nav>

<div style="margin: 0px 100px">
    @if($searchUsers->total() == 0)
        <h2>Sorry, we could not find any user with name <i>{{ $searchStr }}</i></h2>
    @else
    <h2>We have found the following users:</h2>
    <p id="paragraph_num_users_found">({{ $searchUsers->total() }} user(s) found)</p>
    <div class="data_div d-flex flex-wrap justify-content-between" style="gap: 2rem">
        @foreach($searchUsers as $user)
            <div class="user_card" style="margin-top: 30px; display: flex;" id="userCard{{ $user->id }}">
                    <a href="{{route('profile', $user->id)}}"><span>{{ $user->name }}</span><span>#{{ $user->id }}</span></a>
                    <div class="edit_del_btn">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeUser{{$user->id}}"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                <div class="modal fade" id="removeUser{{$user->id}}" tabindex="-1" aria-labelledby="removeUserLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="removeUser{{$user->id}}Header">Remove User #{{ $user->id }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                After this action user <strong>{{$user->name}}</strong> will be removed from this website.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="deleteUser({{$user->id}})">Remove</button>
                            </div>
                        </div>
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
