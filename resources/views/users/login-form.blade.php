@extends('layouts.app')

@section('content')
    <form action="{{ route('users.login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control w-50" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="text-danger">
                    <small> {{ $message }} </small>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control w-50" id="password" name="password">
            @error('password')
                <p class="text-danger">
                    <small> {{ $message }} </small>
                </p>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark">Login</button>
    </form>

    <div class="mt-4">
        <p>
            Don't have an account?
            <a href="{{ route('users.signup-form') }}">Sign Up</a>
        </p>
    </div>
@endsection
