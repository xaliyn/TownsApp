@extends('layouts.app')

@section('title', 'Population Graph')

@section('content')
<h2>Population Statistics of Hungarian Towns</h2>
<p>Displaying the population of 10 selected towns from the database.</p>

<div style="width:80%; margin:auto;">
    <canvas id="populationChart" width="400" height="200"></canvas>
</div>

<script src="⁦https://cdn.jsdelivr.net/npm/chart.js⁩"></script>
<script>
    const labels = @json($labels);
    const populations = @json($populations);

    console.log(labels, populations); 

    if (labels.length && populations.length) {
        const ctx = document.getElementById('populationChart').getContext('2d');
        const populationChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Population',
                    data: populations,
                    borderWidth: 1,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Population'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Town Name'
                        }
                    }
                }
            }
        });
    } else {
        document.getElementById('populationChart').insertAdjacentHTML(
            'afterend',
            '<p style="text-align:center;color:#bbb;">No population data available.</p>'
        );
    }
</script>
@endsection