
    <style>
        /* etudiants.css - Style spécifique pour la page de gestion des étudiants */


    </style>
</head>
@extends('layouts.dashboard')

@section('title', 'Liste des etudiants')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/etudiants.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <div class="etudiants-container p-4">
        <div class="etudiants-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1><i class="bi bi-people-fill me-2"></i> Gestion des Étudiants</h1>
                    <p class="mb-0">Liste complète des étudiants enregistrés</p>
                </div>
                <div class="etudiants-header-btn">
                    <a href="{{ route('etudiants.create') }}" class="btn btn-light">
                        <i class="bi bi-plus-circle me-1"></i> Ajouter un étudiant
                    </a>
                    
                </div>
            </div>
        </div>

        <!-- Formulaire de recherche -->
        <div class="etudiants-search-card">
            <form action="{{ route('etudiants.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-5">
                        <input type="text" name="identifiant" class="form-control" placeholder="Rechercher par identifiant..." value="{{ request('identifiant') }}">
                    </div>
                    <div class="col-md-5">
                        <select name="classe_id" class="form-select">
                            <option value="">Toutes les classes</option>
                            @foreach($classes as $classe)
                                <option value="{{ $classe->id }}" {{ request('classe_id') == $classe->id ? 'selected' : '' }}>
                                    {{ $classe->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-funnel me-1"></i> Filtrer
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if(session('success'))
        <div class="alert alert-success etudiants-alert alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="etudiants-table-container">
            @if($etudiants->count())
            <div class="table-responsive">
                <table class="etudiants-table">
                    <thead>
                        <tr>
                            <th>Identifiant</th>
                            <th>Nom Complet</th>
                            <th>Classe</th>
                            <th style="width: 180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudiants as $etudiant)
                        <tr>
                            <td><strong>{{ $etudiant->identifiant }}</strong></td>
                            <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                            <td>
                                <span class="etudiants-badge">{{ $etudiant->classe->nom }}</span>
                            </td>
                            <td>
                                <div class="etudiants-action-btns">
                                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye"></i> Détails
                                    </a>
                                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(this);">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($etudiants->hasPages())
            <div class="etudiants-pagination">
                <div class="text-muted">
                    Affichage de {{ $etudiants->firstItem() }} à {{ $etudiants->lastItem() }} sur {{ $etudiants->total() }} étudiants
                </div>
                <nav>
                    {{ $etudiants->withQueryString()->links() }}
                </nav>
            </div>
            @endif
            
            @else
            <div class="etudiants-empty-state">
                <i class="bi bi-people"></i>
                <h5>Aucun étudiant trouvé</h5>
                <p>Aucun étudiant ne correspond à vos critères de recherche.</p>
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete(form) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet étudiant ? Cette action est irréversible.")) {
                form.submit();
            } else {
                return false;
            }
        }
        
        // Animation pour les lignes du tableau
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                setTimeout(() => {
                    row.style.opacity = '1';
                    row.style.transform = 'translateX(0)';
                }, index * 50);
            });
        });
    </script>
@endsection