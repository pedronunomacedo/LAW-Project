@extends('layouts.app')

@section('content')
<form class="form-group bg-dark bg-opacity-25 p-3 mx-auto mt-5" method="POST" action="{{ route('register') }}" style="width: 20em">
    {{ csrf_field() }}  

    <div class="form-floating mb-3">
      <input class="form-control" placeholder="name" id="name" type="text" name="name" value="{{ old('name') }}" required>
      <label for="name">Name</label>
    </div>
    @if ($errors->has('name'))
      <span class="error">
          {{ $errors->first('name') }}
      </span>
    @endif
    <div class="form-floating mb-3">
      <input class="form-control" placeholder="email" id="email" type="email" name="email" value="{{ old('email') }}" required>
      <label for="email">Email</label>
    </div>
    @if ($errors->has('email'))
      <span class="error">
          {{ $errors->first('email') }}
      </span>
    @endif
    <div class="form-floating mb-3">
      <input class="form-control" placeholder="password" id="password" type="password" name="password" required>
      <label for="password">Password</label>
    </div>
    @if ($errors->has('password'))
      <span class="error">
          {{ $errors->first('password') }}
      </span>
    @endif
    <div class="form-floating mb-3">
      <input class="form-control" placeholder="password" id="password-confirm" type="password" name="password_confirmation" required>
      <label for="password-confirm">Confirm Password</label>
    </div>

    <button class="btn btn-dark" type="submit">
      Register
    </button>
    <a class="btn btn-outline-dark" href="{{ route('login') }}">Login</a>
</form>
@endsection
