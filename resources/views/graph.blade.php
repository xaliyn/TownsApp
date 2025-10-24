@extends('layouts.app')

@section('title', 'Population Graph – TownsApp')

@section('content')
<h2>Population Statistics of Hungarian Towns</h2>
<p>Displaying the population of 10 selected towns from the database.</p>

<div style="width:80%; margin:auto;">
    <canvas id="populationChart" width="400" height="200"></canvas>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const labels = @json($labels);
    const populations = @json($populations);

    console.log("Labels:", labels);
    console.log("Populations:", populations);

    if (labels.length === 0 || populations.length === 0) {
        document.getElementById('populationChart').insertAdjacentHTML(
            'afterend',
            '<p style="text-align:center; color:#bbb;">No population data found in the database.</p>'
        );
        return;
    }

    const ctx = document.getElementById('populationChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Population',
                data: populations,
                borderWidth: 1,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(100, 181, 246, 0.7)',
                    'rgba(77, 182, 172, 0.7)',
                    'rgba(255, 138, 101, 0.7)',
                    'rgba(149, 117, 205, 0.7)'
                ],
                borderColor: 'rgba(255, 255, 255, 0.8)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { labels: { color: 'white' } },
                title: {
                    display: true,
                    text: 'Population of 10 Towns',
                    color: 'white'
                }
            },
            scales: {
                x: {
                    ticks: { color: 'white' },
                    title: {
                        display: true,
                        text: 'Town',
                        color: 'white'
                    }
                },
                y: {
                    ticks: { color: 'white' },
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Population',
                        color: 'white'
                    }
                }
            }
        }
    });
});
</script>
@endsection
