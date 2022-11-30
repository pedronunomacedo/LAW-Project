@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">Profile</li>
</ol>

<h1 style="margin-left: 10px">My Profile</h1>

<div class="container">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 edit_information">
			<form action="{{ route('saveUserProfile', ['id' => $user->id]) }}"  method="POST">
        @csrf
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="profile_details_text">Name:</label>
							<input type="text" name="username" class="form-control" value="{{ $user->name }}" required>
						</div>
					</div>
				</div>
        <div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="profile_details_text">Password:</label>
							<input type="password" name="password" class="form-control" placeholder="New password" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="profile_details_text">Email Address:</label>
							<input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="profile_details_text">Phone Number:</label>
							<input type="tel" name="phonenumber" class="form-control" value="{{ $user->phonenumber }}" pattern=[0-9]{9}>
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit" style="margin-top: 15px">
						<div class="form-group">
							<input type="submit" class="btn btn-success" value="Submit">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection