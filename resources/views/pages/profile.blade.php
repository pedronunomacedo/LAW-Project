@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<nav class="path" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
	<ol class="breadcrumb" style="margin: 0px 20px">
		<li class="breadcrumb-item"><a href="/">Home</a></li>
		<li class="breadcrumb-item active">Profile</li>
	</ol>
</nav>

<main>
	<div class="container main_content">
		<div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>My Profile</h2></div>
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
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label class="profile_details_text">Email Address:</label>
							<input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
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
</main>

@endsection
