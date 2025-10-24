@extends('layouts.app')

@section('title', 'Add Town')

@section('content')
<h2>Add New Town</h2>

<form action="{{ route('crud.store') }}" method="POST" style="width:50%; margin:auto;">
    @csrf
    <label>Town Name:</label><br>
    <input type="text" name="tname" value="{{ old('tname') }}" required><br><br>

    <label>County:</label><br>
    <select name="countyid" required>
        @foreach($counties as $county)
            <option value="{{ $county->id }}">{{ $county->cname }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Save</button>
    <a href="{{ route('crud.index') }}">Cancel</a>
</form>
@endsection