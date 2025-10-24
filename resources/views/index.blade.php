@extends('layouts.app')

@section('title', 'Mainpage – TownsApp')

@section('content')
<section id="main">
    <h1>Welcome to TownsApp</h1>
    <p>
        This is a Laravel-based web application created for the
        <strong>Web Programming II</strong> course.
        It presents information about Hungarian towns and counties,
        using data stored in a MySQL database.
    </p>

    <h2>About the Project</h2>
    <p>
        This project was developed by <strong>Enkhjee Gantulga (CPY45Q)</strong>
        and <strong>Khaliun Tamir (EU2XJ4)</strong>.
        The system demonstrates database connections, authentication,
        and responsive design using the HTML5 UP “Eventually” theme.
    </p>

    <img src="{{ asset('theme/assets/images/pic01.jpg') }}"
         alt="Hungarian Towns" style="width:60%;border-radius:10px;margin-top:20px;">

    <h3>Our Goals</h3>
    <ul>
        <li>Learn and apply the Laravel 12 framework.</li>
        <li>Demonstrate CRUD and data-visualization features.</li>
        <li>Build a fully responsive, role-based web application.</li>
    </ul>
</section>
@endsection