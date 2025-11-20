@extends('layouts.app')
@section('title', 'Login')

@section('content')
<h2>Login</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>

<hr style="margin: 30px 0;">

<h3>Quick Login</h3>

<!-- Quick Login Buttons -->
<form method="POST" action="{{ secure_url('/login') }}">
    @csrf
    <input type="hidden" name="email" value="admin@example.com">
    <input type="hidden" name="password" value="admin123">
    <button type="submit" style="margin:10px; padding:10px;">Login as Admin</button>
</form>

<form method="POST" action="{{ secure_url('/login') }}">
    @csrf
    <input type="hidden" name="email" value="visitor@example.com">
    <input type="hidden" name="password" value="visitor123">
    <button type="submit" style="margin:10px; padding:10px;">Login as Visitor</button>
</form>

@endsection