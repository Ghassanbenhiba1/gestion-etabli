@extends('layouts.dashboard')

@section('title', 'Ajouter une absence')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/absences.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <div class="absences-container">
        <div class="absences-form-card">
            <h2 class="absences-form-title">
                <i class="bi bi-clock-history me-2"></i>Ajouter une absence
            </h2>
            <p class="absences-form-subtitle">Pour {{ $etudiant->nom }} {{ $etudiant->prenom }}</p>

            <form action="{{ route('absences.store') }}" method="POST" class="absences-form">
                @csrf
                <input type="hidden" name="etudiant_id" value="{{ $etudiant->id }}">

                <div class="absences-form-group">
                    <label class="absences-form-label">Matière</label>
                    <select name="matiere_id" class="absences-form-control" required>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="absences-form-row">
                    <div class="absences-form-group">
                        <label class="absences-form-label">Date</label>
                        <input type="date" name="date" class="absences-form-control" required>
                    </div>

                    <div class="absences-form-group">
                        <label class="absences-form-label">Durée (heures)</label>
                        <input type="number" name="duree" class="absences-form-control" placeholder="Ex: 2" required>
                    </div>
                </div>

                <div class="absences-form-group">
                    <label class="absences-form-label">Statut</label>
                    <select name="justifiee" class="absences-form-control" required>
                        <option value="0">Non justifiée</option>
                        <option value="1">Justifiée</option>
                    </select>
                </div>

                <div class="absences-form-group">
                    <label class="absences-form-label">Motif (facultatif)</label>
                    <textarea name="motif" class="absences-form-control" rows="3" placeholder="Raison de l'absence..."></textarea>
                </div>

                <div class="absences-form-actions">
                    <button type="submit" class="absences-btn absences-btn-warning">
                        <i class="bi bi-plus-circle me-1"></i> Ajouter l'absence
                    </button>
                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="absences-btn absences-btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection