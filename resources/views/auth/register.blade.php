@extends('layouts.app')
@section('title', 'Register')

@section('content')
<h2>Register</h2>

<!-- Normal Registration -->
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>

    <!-- Default role for normal users -->
    <input type="hidden" name="role" value="registered">

    <button type="submit">Register as Visitor</button>
</form>

<hr style="margin: 30px 0;">

<!-- Quick Admin Registration -->
<h3>Special Accounts</h3>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="hidden" name="name" value="Admin User">
    <input type="hidden" name="email" value="admin@example.com">
    <input type="hidden" name="password" value="admin123">
    <input type="hidden" name="password_confirmation" value="admin123">
    <input type="hidden" name="role" value="admin">

    <button type="submit" style="margin-top:10px; padding:10px;">
        Register Admin Account
    </button>
</form>

@endsection