@extends('layouts.app')
@section('title','Messages – TownsApp')

@section('content')
<h2>Messages (registered users only)</h2>

@if($messages->count() === 0)
    <p>No messages yet.</p>
@else
    <ul>
        @foreach($messages as $m)
            <li style="margin:10px 0">
                <strong>{{ $m->name }}</strong> &lt;{{ $m->email }}&gt; —
                <em>{{ $m->subject }}</em><br>
                {{ $m->body }}<br>
                <small>{{ $m->created_at->format('Y-m-d H:i') }}</small>
            </li>
        @endforeach
    </ul>
    {{ $messages->links() }}
@endif
@endsection
