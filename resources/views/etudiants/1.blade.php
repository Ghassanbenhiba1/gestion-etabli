<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Gestion des Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --danger-color: #e74a3b;
            --warning-color: #f6c23e;
        }
        
        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
            color: white;
            border-radius: 0.35rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem 0 rgba(58, 59, 69, 0.2);
        }
        
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 600;
            padding: 1rem 1.35rem;
        }
        
        .stat-card {
            border-left: 0.25rem solid;
            padding: 1rem;
        }
        
        .stat-card.primary {
            border-left-color: var(--primary-color);
        }
        
        .stat-card.success {
            border-left-color: var(--secondary-color);
        }
        
        .stat-card.danger {
            border-left-color: var(--danger-color);
        }
        
        .stat-card.warning {
            border-left-color: var(--warning-color);
        }
        
        .stat-card .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .stat-card .stat-label {
            font-size: 0.875rem;
            text-transform: uppercase;
            font-weight: 600;
            color: #5a5c69;
        }
        
        .stat-card .stat-icon {
            font-size: 2rem;
            opacity: 0.3;
            position: absolute;
            right: 1rem;
            top: 1rem;
        }
        
        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
        }
        
        .list-group-item {
            border-left: none;
            border-right: none;
            padding: 1rem 1.25rem;
        }
        
        .list-group-item:first-child {
            border-top: none;
        }
        
        .progress {
            height: 1rem;
            border-radius: 0.35rem;
        }
        
        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1rem;
        }
        
        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
        }
        
        .chart-container {
            position: relative;
            height: 300px;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="dashboard-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1><i class="bi bi-people-fill me-2"></i> Gestion des Étudiants</h1>
                    <p class="mb-0">Tableau de bord complet pour le suivi des étudiants</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="periodDropdown" data-bs-toggle="dropdown">
                            Semestre 1 - 2023/2024
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Semestre 2 - 2022/2023</a></li>
                            <li><a class="dropdown-item" href="#">Semestre 1 - 2022/2023</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques principales -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card primary h-100">
                    <div class="card-body">
                        <div class="stat-label">Total Étudiants</div>
                        <div class="stat-value">{{ $data['totalEtudiants'] }}</div>
                        <div class="mt-2">
                            <span class="text-success">
                                <i class="bi bi-arrow-up"></i> {{ $data['evolutionEtudiants'] }}%
                            </span>
                            <span class="text-muted">vs sem. précédent</span>
                        </div>
                    </div>
                    <i class="bi bi-people stat-icon text-primary"></i>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card success h-100">
                    <div class="card-body">
                        <div class="stat-label">Moyenne Générale</div>
                        <div class="stat-value">{{ $data['moyenneGenerale'] }}/20</div>
                        <div class="mt-2">
                            <span class="text-success">
                                <i class="bi bi-arrow-up"></i> +{{ $data['evolutionMoyenne'] }}
                            </span>
                            <span class="text-muted">vs sem. précédent</span>
                        </div>
                    </div>
                    <i class="bi bi-graph-up stat-icon text-success"></i>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card danger h-100">
                    <div class="card-body">
                        <div class="stat-label">Taux d'Absences</div>
                        <div class="stat-value">{{ $data['tauxAbsence'] }}%</div>
                        <div class="mt-2">
                            <span class="text-danger">
                                <i class="bi bi-arrow-up"></i> {{ $data['evolutionAbsence'] }}%
                            </span>
                            <span class="text-muted">vs mois dernier</span>
                        </div>
                    </div>
                    <i class="bi bi-calendar-x stat-icon text-danger"></i>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card warning h-100">
                    <div class="card-body">
                        <div class="stat-label">Taux de Réussite</div>
                        <div class="stat-value">{{ $data['tauxReussite'] }}%</div>
                        <div class="mt-2">
                            <span class="text-success">
                                <i class="bi bi-arrow-up"></i> +{{ $data['evolutionReussite'] }}%
                            </span>
                            <span class="text-muted">vs année précédente</span>
                        </div>
                    </div>
                    <i class="bi bi-award stat-icon text-warning"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Graphique de performance -->
            <div class="col-lg-8 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">Performance des classes</h6>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Par matière
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Toutes matières</a></li>
                                <li><a class="dropdown-item" href="#">Mathématiques</a></li>
                                <li><a class="dropdown-item" href="#">Physique</a></li>
                                <li><a class="dropdown-item" href="#">Informatique</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="performanceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Répartition par filière -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold">Répartition par filière</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="filiereChart"></canvas>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-primary rounded-circle" style="width: 15px; height: 15px;"></div>
                                <span class="ms-2">Informatique - 42%</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-success rounded-circle" style="width: 15px; height: 15px;"></div>
                                <span class="ms-2">Génie Civil - 28%</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-warning rounded-circle" style="width: 15px; height: 15px;"></div>
                                <span class="ms-2">Mécanique - 18%</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="bg-danger rounded-circle" style="width: 15px; height: 15px;"></div>
                                <span class="ms-2">Électrique - 12%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Liste des absences -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">Absences récentes</h6>
                        <button class="btn btn-sm btn-primary">Voir tout</button>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach ($data['absences'] as $absence)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($absence['nom']) }}&background=random" class="student-avatar">
                                    <div>
                                        <h6 class="mb-0">{{ $absence['nom'] }}</h6>
                                        <small class="text-muted">{{ $absence['matiere'] }} • {{ $absence['date'] }}</small>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="badge {{ $absence['justifiee'] ? 'bg-success' : 'bg-danger' }}">
                                        {{ $absence['justifiee'] ? 'Justifiée' : 'Non justifiée' }}
                                    </span>
                                    <div class="text-muted small mt-1">{{ $absence['duree'] }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Meilleurs étudiants -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold">Top étudiants</h6>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Par classe
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Toutes classes</a></li>
                                <li><a class="dropdown-item" href="#">L1</a></li>
                                <li><a class="dropdown-item" href="#">L2</a></li>
                                <li><a class="dropdown-item" href="#">L3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Étudiant</th>
                                        <th>Classe</th>
                                        <th>Moyenne</th>
                                        <th>Progression</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://ui-avatars.com/api/?name=Jean+Dupont&background=4e73df&color=fff" class="student-avatar">
                                                <span>Jean Dupont</span>
                                            </div>
                                        </td>
                                        <td>L3 Info</td>
                                        <td>18.7</td>
                                        <td>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://ui-avatars.com/api/?name=Marie+Martin&background=1cc88a&color=fff" class="student-avatar">
                                                <span>Marie Martin</span>
                                            </div>
                                        </td>
                                        <td>L2 GC</td>
                                        <td>17.9</td>
                                        <td>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 78%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://ui-avatars.com/api/?name=Pierre+Dubois&background=f6c23e&color=000" class="student-avatar">
                                                <span>Pierre Dubois</span>
                                            </div>
                                        </td>
                                        <td>L1 Méca</td>
                                        <td>17.5</td>
                                        <td>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 72%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://ui-avatars.com/api/?name=Sophie+Leroy&background=e74a3b&color=fff" class="student-avatar">
                                                <span>Sophie Leroy</span>
                                            </div>
                                        </td>
                                        <td>L3 Élec</td>
                                        <td>17.2</td>
                                        <td>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 65%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance par classe -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold">Performance détaillée par classe</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($data['performancesParClasse'] as $classe => $note)
                            <div class="col-md-4 mb-4">
                                <div class="card border-left-primary h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="font-weight-bold">{{ $classe }}</h5>
                                                <p class="mb-0 text-muted">Moyenne de classe</p>
                                            </div>
                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <span class="text-white font-weight-bold">{{ $note }}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <div class="text-center">
                                                <h6 class="font-weight-bold text-success">85%</h6>
                                                <p class="small text-muted mb-0">Réussite</p>
                                            </div>
                                            <div class="text-center">
                                                <h6 class="font-weight-bold text-danger">12%</h6>
                                                <p class="small text-muted mb-0">Échec</p>
                                            </div>
                                            <div class="text-center">
                                                <h6 class="font-weight-bold text-warning">3%</h6>
                                                <p class="small text-muted mb-0">Absentéisme</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
        // Performance Chart
        const performanceCtx = document.getElementById('performanceChart').getContext('2d');
        const performanceChart = new Chart(performanceCtx, {
            type: 'bar',
            data: {
                labels: Object.keys({{ json_encode($data['performancesParClasse']) }}),
                datasets: [{
                    label: 'Moyenne de classe',
                    data: Object.values({{ json_encode($data['performancesParClasse']) }}),
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.8)',
                        'rgba(28, 200, 138, 0.8)',
                        'rgba(246, 194, 62, 0.8)',
                        'rgba(231, 74, 59, 0.8)'
                    ],
                    borderColor: [
                        'rgba(78, 115, 223, 1)',
                        'rgba(28, 200, 138, 1)',
                        'rgba(246, 194, 62, 1)',
                        'rgba(231, 74, 59, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 20,
                        ticks: {
                            stepSize: 2
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + '/20';
                            }
                        }
                    }
                }
            }
        });

        // Filiere Chart
        const filiereCtx = document.getElementById('filiereChart').getContext('2d');
        const filiereChart = new Chart(filiereCtx, {
            type: 'doughnut',
            data: {
                labels: ['Informatique', 'Génie Civil', 'Mécanique', 'Électrique'],
                datasets: [{
                    data: [42, 28, 18, 12],
                    backgroundColor: [
                        'rgba(78, 115, 223, 0.8)',
                        'rgba(28, 200, 138, 0.8)',
                        'rgba(246, 194, 62, 0.8)',
                        'rgba(231, 74, 59, 0.8)'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>