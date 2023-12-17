@extends('layouts.app')

@section('content')
    <form action="{{ route('users.signup') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control w-50" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <p class="text-danger">
                    <small> {{ $message }} </small>
                </p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
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
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control w-50" id="confirm-password" name="confirm-password">
            @error('confirm-password')
                <p class="text-danger">
                    <small> {{ $message }} </small>
                </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark">Sign Up</button>
    </form>

    <div class="mt-4">
        <p>
            Already have an account?
            <a href="{{ route('users.login-form') }}">Login</a>
        </p>
    </div>
@endsection
