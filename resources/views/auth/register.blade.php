@extends('layouts.app')
@section('title', 'Register')

@section('content')
<h2>Register</h2>

<!-- Normal Visitor Registration -->
<form method="POST" action="{{ route('register') }}">
    @csrf

    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>

    <!-- Default role = registered -->
    <input type="hidden" name="role" value="registered">

    <button type="submit">Register as Visitor</button>
</form>

<hr style="margin: 25px 0;">

<!-- Admin Registration -->
<h3>Register as Admin</h3>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>

    <!-- THIS is the important part -->
    <input type="hidden" name="role" value="admin">

    <button type="submit" style="padding:10px; margin-top:10px;">
        Register as Admin
    </button>
</form>

@endsection