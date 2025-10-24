@extends('layouts.app')
@section('title','Contact – TownsApp')

@section('content')
<section id="contact">
    <h2>Contact Us</h2>

    @if(session('ok'))
        <p style="color:#7cff9b">{{ session('ok') }}</p>
    @endif

    <form method="POST" action="{{ url('/contact') }}" style="max-width:600px">
        @csrf
        <input type="text" name="name" placeholder="Your name" value="{{ old('name') }}" required>
        @error('name')<div style="color:#ff8080">{{ $message }}</div>@enderror

        <input type="email" name="email" placeholder="Your email" value="{{ old('email') }}" required>
        @error('email')<div style="color:#ff8080">{{ $message }}</div>@enderror

        <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
        @error('subject')<div style="color:#ff8080">{{ $message }}</div>@enderror

        <textarea name="body" placeholder="Your message..." rows="6" required>{{ old('body') }}</textarea>
        @error('body')<div style="color:#ff8080">{{ $message }}</div>@enderror

        <button type="submit">Send</button>
    </form>
</section>
@endsection
