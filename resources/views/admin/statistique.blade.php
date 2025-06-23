@extends('layouts.dashboard')

@section('title', 'Statistiques')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/stats.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <div class="stats-container">
        <div class="stats-header">
            <h1 class="stats-title">
                <i class="bi bi-graph-up me-2"></i>Statistiques des Classes
            </h1>
        </div>

        <div class="stats-grid">
            <div class="stats-card">
                <div class="stats-card-icon">
                    <i class="bi bi-building"></i>
                </div>
                <div class="stats-card-content">
                    <h3>Nombre total de classes</h3>
                    <p>{{ count($stats) }}</p>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="stats-card-icon">
                    <i class="bi bi-journal-check"></i>
                </div>
                <div class="stats-card-content">
                    <h3>Moyenne générale des notes</h3>
                    <p>{{ number_format(collect($stats)->pluck('moyenne_notes')->map(fn($n) => floatval($n))->avg(), 2) }}</p>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="stats-card-icon">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="stats-card-content">
                    <h3>Taux moyen d'absence</h3>
                    <p>{{ number_format(collect($stats)->pluck('moyenne_absences')->map(fn($a) => floatval($a))->avg(), 2) }} <small>absences/étudiant</small></p>
                </div>
            </div>
        </div>
        
        <div class="stats-chart-container">
            <div class="stats-chart-header">
                <h3>Comparaison des moyennes par classe</h3>
                <div class="stats-chart-legend">
                    <span class="stats-legend-item">
                        <span class="stats-legend-color" style="background-color: rgba(76, 201, 240, 0.7)"></span>
                        Moyenne des Notes
                    </span>
                </div>
            </div>
            <canvas id="barChart"></canvas>
        </div>
        
        <div class="stats-chart-container">
            <div class="stats-chart-header">
                <h3>Taux d'absence par classe</h3>
                <div class="stats-chart-legend">
                    <span class="stats-legend-item">
                        <span class="stats-legend-color" style="background-color: rgba(244, 67, 54, 1)"></span>
                        Moyenne des Absences
                    </span>
                </div>
            </div>
            <canvas id="lineChart"></canvas>
        </div>
        
        <div class="stats-table-container">
            <div class="stats-table-responsive">
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th>Classe</th>
                            <th>Moyenne des Notes</th>
                            <th>Moyenne des Absences</th>
                            <th>Performance</th>
                            <th>Détails</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stats as $stat)
                        <tr>
                            <td>{{ $stat['classe'] }}</td>
                            <td>{{ number_format($stat['moyenne_notes'], 2) }}</td>
                            <td>{{ number_format($stat['moyenne_absences'], 2) }}</td>
                            <td>
                                @php
                                    $note = floatval($stat['moyenne_notes']);
                                    $absence = floatval($stat['moyenne_absences']);
                                    
                                    if($note >= 14 && $absence <= 2) {
                                        echo '<span class="stats-badge stats-badge-success">Excellente</span>';
                                    } elseif($note >= 10 && $absence <= 5) {
                                        echo '<span class="stats-badge stats-badge-warning">Moyenne</span>';
                                    } else {
                                        echo '<span class="stats-badge stats-badge-danger">À améliorer</span>';
                                    }
                                @endphp
                            </td>
                            <td>
                                <a class="stats-btn" href="{{ route('classe.stats', $stat['classe_id']) }}">
                                    <i class="bi bi-eye-fill me-1"></i> Voir Détails
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
      // Fonction pour créer un graphique
 // Configuration commune pour les graphiques
    const chartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: { 
        y: { 
          beginAtZero: true,
          grid: {
            color: 'rgba(0,0,0,0.05)'
          }
        },
        x: {
          grid: {
            display: false
          }
        }
      },
      plugins: {
        legend: {
          position: 'top',
        },
        tooltip: {
          backgroundColor: 'rgba(0,0,0,0.8)',
          titleFont: {
            size: 14,
            weight: 'bold'
          },
          bodyFont: {
            size: 12
          }
        }
      }
    };

    // Graphique à barres (moyennes des notes)
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
      type: 'bar',
      data: {
        labels: {!! json_encode(array_column($stats, 'classe')) !!},
        datasets: [{
          label: 'Moyenne des Notes',
          data: {!! json_encode(array_column($stats, 'moyenne_notes')) !!},
          backgroundColor: 'rgba(76, 201, 240, 0.7)',
          borderColor: 'rgba(76, 201, 240, 1)',
          borderWidth: 1
        }]
      },
      options: {
        ...chartOptions,
        plugins: {
          ...chartOptions.plugins,
          title: {
            display: true,
            text: 'Comparaison des moyennes par classe',
            font: {
              size: 16
            }
          }
        }
      }
    });

    // Graphique linéaire (absences)
    const lineCtx = document.getElementById('lineChart').getContext('2d');
    new Chart(lineCtx, {
      type: 'line',
      data: {
        labels: {!! json_encode(array_column($stats, 'classe')) !!},
        datasets: [{
          label: 'Moyenne des Absences',
          data: {!! json_encode(array_column($stats, 'moyenne_absences')) !!},
          backgroundColor: 'rgba(244, 67, 54, 0.2)',
          borderColor: 'rgba(244, 67, 54, 1)',
          borderWidth: 2,
          tension: 0.3,
          fill: true
        }]
      },
      options: {
        ...chartOptions,
        plugins: {
          ...chartOptions.plugins,
          title: {
            display: true,
            text: 'Taux d\'absence par classe',
            font: {
              size: 16
            }
          }
        }
      }
    });

    </script>
@endsection