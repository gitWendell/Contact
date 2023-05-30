@extends('layouts.app')

@section('body')
    <section id="login-container" class="m-container m-center ">
        <form method="POST" action="{{ route('contact.update') }}" class="m-card w-50">
            @csrf
            <input type="hidden" name="id" value="{{ encrypt($contact['id']) }}">
            
            <div class="form-group">
                <label>Name</label>
                <input type="name" 
                    class="form-control" 
                    value="{{ $contact['name'] }}"
                    name="name">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Company</label>
                <input type="text" 
                    class="form-control" 
                    value="{{ $contact['company'] }}"
                    name="company">
                @error('company')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" 
                    class="form-control" 
                    value="{{ $contact['phone'] }}"
                    name="phone">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" 
                    class="form-control" 
                    value="{{ $contact['email'] }}"
                    name="email">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" 
                class="btn btn-primary">
                Update
            </button>
        </form>
    </section>
@endsection