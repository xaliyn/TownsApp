@extends('layouts.app')

@section('title', 'CRUD')

@section('content')
<h2>CRUD Menu – Manage Towns</h2>

@if(session('success'))
    <p style="color:lightgreen;">{{ session('success') }}</p>
@endif

<a href="{{ route('crud.create') }}" class="button" style="margin:10px 0; display:inline-block;">+ Add New Town</a>

<table style="width:90%; margin:auto; border-collapse:collapse;">
    <thead style="background:#222; color:#fff;">
        <tr>
            <th style="padding:8px;">ID</th>
            <th style="padding:8px;">Town Name</th>
            <th style="padding:8px;">County</th>
            <th style="padding:8px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($towns as $town)
        <tr style="color:#ddd;">
            <td style="padding:6px;">{{ $town->id }}</td>
            <td style="padding:6px;">{{ $town->tname }}</td>
            <td style="padding:6px;">{{ $town->county->cname ?? '—' }}</td>
            <td style="padding:6px;">
                <a href="{{ route('crud.edit', $town->id) }}">Edit</a> |
                <form action="{{ route('crud.destroy', $town->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this town?')" style="background:none; border:none; color:red;">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div style="text-align:center; margin-top:15px;">
    {{ $towns->links() }}
</div>
@endsection