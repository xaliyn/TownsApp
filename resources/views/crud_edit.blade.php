@extends('layouts.app')

@section('title', 'Edit Town')

@section('content')
<h2>Edit Town</h2>

<form action="{{ route('crud.update', $town->id) }}" method="POST" style="width:50%; margin:auto;">
    @csrf
    @method('PUT')

    <label>Town Name:</label><br>
    <input type="text" name="tname" value="{{ $town->tname }}" required><br><br>

    <label>County:</label><br>
    <select name="countyid" required>
        @foreach($counties as $county)
            <option value="{{ $county->id }}" @if($town->countyid == $county->id) selected @endif>
                {{ $county->cname }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Update</button>
    <a href="{{ route('crud.index') }}">Cancel</a>
</form>
@endsection