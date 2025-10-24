@extends('layouts.app')
@section('title', 'Admin')
@section('content')
<section id="admin-panel">
    <h1>Admin Panel</h1>
    <p>Welcome, <strong>{{ Auth::user()->name }}</strong>!</p>

    @if(Auth::user()->role == 'admin')
        <p>You have administrator privileges.</p>
        <ul>
            <li>Manage users</li>
            <li>Access all database features</li>
            <li>Modify CRUD entries</li>
        </ul>
    @else
        <p>You do not have permission to view admin only content.</p>
    @endif
</section>
@endsection
