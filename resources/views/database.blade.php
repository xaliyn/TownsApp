@extends('layouts.app')

@section('title', 'Database – TownsApp')

@section('content')
<section id="database">
    <h2>Database Menu</h2>
    <p>List of Hungarian towns with county and population information.</p>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:20px;width:90%;text-align:left">
        <tr>
            <th>ID</th>
            <th>Town Name</th>
            <th>County</th>
            <th>Population</th>
        </tr>
        @foreach($towns as $town)
        <tr>
            <td>{{ $town->id }}</td>
            <td>{{ $town->tname }}</td>
            <td>{{ $town->county->cname ?? '—' }}</td>
            <td>{{ $town->population->pcount ?? '—' }}</td>
        </tr>
        @endforeach
    </table>
</section>
@endsection