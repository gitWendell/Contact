@extends('layouts.app')

@section('body')
    <section id="login-container" class="m-container m-center ">
        <form method="POST" action="{{ route('user.create') }}" class="m-card w-50">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" 
                    class="form-control"
                    value="{{ old('name') }}" 
                    name="name">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" 
                    class="form-control" 
                    value="{{ old('email') }}"
                    name="email">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" 
                    class="form-control" 
                    value="{{ old('password') }}"
                    name="password">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" 
                    class="form-control" 
                    value="{{ old('confirm_password') }}"
                    name="password_confirmation">
            </div>
            <button type="submit" 
                class="btn btn-primary">
                Submit
            </button>
            <div class="p-2 fs">
                <div class="float-right">
                    already have an account?
                    <a class="link" 
                        href="{{ route('login') }}"> 
                        Login 
                    </a>
                </div>
            </div>
        </form>
    </section>
@endsection