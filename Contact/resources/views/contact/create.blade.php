@extends('layouts.app')

@section('body')
    <section id="login-container" class="m-container m-center ">
        <form method="POST" action="{{ route('contact.store') }}" class="m-card w-50">
            @csrf
            
            <div class="form-group">
                <label>Name</label>
                <input type="name" 
                    class="form-control" 
                    value="{{ old('name') }}"
                    name="name">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Company</label>
                <input type="text" 
                    class="form-control" 
                    value="{{ old('company') }}"
                    name="company">
                @error('company')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" 
                    class="form-control" 
                    value="{{ old('phone') }}"
                    name="phone">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" 
                    class="form-control" 
                    value="{{ old('email') }}"
                    name="email">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" 
                class="btn btn-primary">
                Submit
            </button>
        </form>
    </section>
@endsection