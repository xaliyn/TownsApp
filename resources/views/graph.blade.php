@extends('layouts.app')

@section('title', 'Population Graph – TownsApp')

@section('content')
<h2>Population Statistics of Hungarian Towns</h2>
<p>Displaying the population of 10 selected towns from the database.</p>

<div style="width:80%; margin:auto;">
    <canvas id="populationChart"></canvas>
</div>

<!-- Chart.js -->
<script src="⁦https://cdn.jsdelivr.net/npm/chart.js⁩"></script>
<script>
    const ctx = document.getElementById('populationChart').getContext('2d');
    const populationChart = new Chart(ctx, {
        type: 'bar', // or 'line'
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Total Population',
                data: @json($populations),
                borderWidth: 1,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Population' }
                },
                x: {
                    title: { display: true, text: 'Town Name' }
                }
            }
        }
    });
</script>
@endsection