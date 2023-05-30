@extends('layouts.app')

@section('body')
    <section id="success-registration-container" class="m-container m-center flex-column">
        <h1 class="registration-success-message">Thank you for registering</h1>
        <a class="link" href="{{ route('home') }}"> Continue </a>
    </section>
@endsection