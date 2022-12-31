@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')


<main>
	<div class="container my-5">
		<nav class="path" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" style="color: black;">Profile</li>
            </ol>
        </nav>
		<div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>My Profile</h2></div>
		<form action="{{ route('saveUserProfile', ['id' => $user->id]) }}"  method="POST" class="row d-flex justify-content-center my-4" style="background-color: white; padding: 1rem; border-radius:10px;">
			@csrf
			<h4 class="mb-4" style="text-decoration: underline 4px red">Personal Info</h4>
			<div class="col-md-6">
				<div class="form-group mb-4">
					<label class="profile_details_text">Name:</label>
					<input type="text" name="username" class="form-control" value="{{ $user->name }}" required>
				</div>
				<div class="form-group mb-4">
					<label class="profile_details_text">Email Address:</label>
					<input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="profile_details_text">Phone Number:</label>
					<input type="tel" name="phonenumber" class="form-control" value="{{ $user->phonenumber }}" pattern=[0-9]{9}>
				</div>
			</div>
			<button class="btn btn-danger btn-lg" onclick="" type="submit" style="width: 10rem; margin-top: 20px;">Save</button>
		</form>
		<form action="{{ route('saveUserPassword', ['id' => $user->id]) }}"  method="POST" class="row d-flex justify-content-center my-4">
			@csrf
			<div class="row d-flex justify-content-center my-4" style="background-color: white; padding: 1rem; border-radius:10px;">
				<h4 class="mb-4" style="text-decoration: underline 4px red">Change Password</h4>
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label class="profile_details_text">Old Password:</label>
						<input type="password" name="oldPassword" class="form-control"required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label class="profile_details_text">New Password:</label>
						<input type="password" name="newPassword" class="form-control" required>
					</div>
					<div class="form-group mb-4">
						<label class="profile_details_text">Confirm New Password:</label>
						<input type="password" name="confirmPassword" class="form-control" required>
					</div>
				</div>
				<button class="btn btn-danger btn-lg" onclick="" style="width: 10rem">Save</button>
			</div>
		</form>
		<div class="row d-flex justify-content-center my-4" style="background-color: white; padding: 1rem; border-radius:10px;">
			<h4 class="mb-4" style="text-decoration: underline 4px red">Billing Address</h4>
			<div class="mb-4" style="display: flex; justify-content: space-evenly; flex-wrap: wrap; gap: 2rem;">
				@foreach(Auth::user()->address()->get() as $address)
					<div class="address_card" style="height: auto">
						<p><strong>Street: </strong>{{$address->street}}<p>
						<p><strong>City: </strong>{{$address->city}}, {{$address->country}}</p>
						<p><strong>Postal Code: </strong>{{$address->postalcode}}</p>
					</div>
				@endforeach
			</div>
			<button class="btn btn-danger btn-lg" onclick="" style="width: 10rem">Add Address</button>
		</div>
	</div>
</main>

@endsection
