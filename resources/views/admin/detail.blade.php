@extends('layouts.dashboard')

@section('title', 'Détails de la classe')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/classe-details.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <div class="classe-details-container">
        <div class="classe-header">
            <h1 class="classe-title">
                <i class="bi bi-building me-2"></i>Détails de la classe {{ $classe->nom }}
            </h1>
        </div>

        <div class="classe-stats-grid">
            <!-- Section Moyennes par Matière -->
            <div class="classe-stat-card">
                <div class="classe-stat-header">
                    <i class="bi bi-journal-check classe-stat-icon"></i>
                    <h3>Moyenne par Matière</h3>
                </div>
                <ul class="classe-stat-list">
                    @foreach($matieres as $matiere => $moyenne)
                        <li class="classe-stat-item">
                            <span class="classe-stat-label">{{ $matiere }}</span>
                            <span class="classe-stat-value {{ $moyenne >= 10 ? 'text-success' : 'text-danger' }}">
                                {{ number_format($moyenne, 2) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Section Top 3 Étudiants -->
            <div class="classe-stat-card">
                <div class="classe-stat-header">
                    <i class="bi bi-trophy classe-stat-icon"></i>
                    <h3>Top 3 Étudiants</h3>
                </div>
                <ol class="classe-top-list">
                    @foreach($topEtudiants as $etudiant)
                        <li class="classe-top-item">
                            <span class="classe-top-rank">{{ $loop->iteration }}</span>
                            <div class="classe-top-content">
                                <span class="classe-top-name">{{ $etudiant['nom'] }}</span>
                                <span class="classe-top-score">{{ number_format($etudiant['moyenne'], 2) }}</span>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>

            <!-- Section Top 3 Absents -->
            <div class="classe-stat-card">
                <div class="classe-stat-header">
                    <i class="bi bi-clock-history classe-stat-icon"></i>
                    <h3>Top 3 Absents</h3>
                </div>
                <ol class="classe-top-list">
                    @foreach($absents as $etudiant)
                        <li class="classe-top-item">
                            <span class="classe-top-rank">{{ $loop->iteration }}</span>
                            <div class="classe-top-content">
                                <span class="classe-top-name">{{ $etudiant['nom'] }}</span>
                                <span class="classe-top-score">{{ $etudiant['absences'] }} absences</span>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection