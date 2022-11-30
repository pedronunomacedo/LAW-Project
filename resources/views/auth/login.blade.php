@extends('layouts.app')

@section('content')
<form class="form-group bg-dark bg-opacity-25 p-3 mx-auto mt-5" method="POST" action="{{ route('login') }}" style="width: 20em">
    {{ csrf_field() }}
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="email">
        <label for="email">Email</label>
    </div>
    @if ($errors->has('email'))
        <span class="error">
        {{ $errors->first('email') }}
        </span>
    @endif
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" name="password" required placeholder="password">
        <label for="password">Password</label>
    </div>
    @if ($errors->has('password'))
        <span class="error">
            {{ $errors->first('password') }}
        </span>
    @endif
    <label>
        <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
    </label>
    <button class="btn btn-dark" type="submit">
        Login
    </button>
    <a class="btn btn-outline-dark" href="{{ route('register') }}">Register</a>
</form>
@endsection
