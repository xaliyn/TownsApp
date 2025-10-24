@extends('layouts.app')

@section('title', 'Database – TownsApp')

@section('content')
<h2>Hungarian Towns Database</h2>
<p>List of Hungarian towns with county and population information.</p>

<table style="width:90%; margin:auto; border-collapse:collapse;">
    <thead style="background-color:#222; color:#fff;">
        <tr>
            <th style="padding:8px;">ID</th>
            <th style="padding:8px;">Town Name</th>
            <th style="padding:8px;">County</th>
            <th style="padding:8px;">Population (latest year)</th>
        </tr>
    </thead>
    <tbody>
@foreach($towns as $town)
<tr style="color:#ddd;">
    <td style="padding:6px;">{{ $town->id }}</td>
    <td style="padding:6px;">{{ $town->tname }}</td>
    <td style="padding:6px;">{{ $town->county->cname ?? '—' }}</td>
    <td style="padding:6px;">
        @if($town->populationRecords->isNotEmpty())
            {{ $town->populationRecords->last()->total }}
        @else
            —
        @endif
    </td>
</tr>
@endforeach
</tbody>

</table>

<div style="margin-top:20px; text-align:center;">
    {{ $towns->links() }}
</div>
@endsection
