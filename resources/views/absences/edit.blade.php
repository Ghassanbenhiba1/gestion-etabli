@extends('layouts.dashboard')

@section('title', 'Modifier une absence')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/absences.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <div class="absences-container">
        <div class="absences-form-card">
            <h2 class="absences-form-title">
                <i class="bi bi-pencil-square me-2"></i>Modifier l'absence
            </h2>
            <p class="absences-form-subtitle">Pour {{ $absence->etudiant->nom }} {{ $absence->etudiant->prenom }}</p>

            <form action="{{ route('absences.update', $absence->id) }}" method="POST" class="absences-form">
                @csrf
                @method('PUT')

                <div class="absences-form-group">
                    <label class="absences-form-label">Matière</label>
                    <select name="matiere_id" class="absences-form-control" required>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" {{ $absence->matiere_id == $matiere->id ? 'selected' : '' }}>
                                {{ $matiere->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="absences-form-row">
                    <div class="absences-form-group">
                        <label class="absences-form-label">Date</label>
                        <input type="date" name="date" class="absences-form-control" value="{{ $absence->date }}" required>
                    </div>

                    <div class="absences-form-group">
                        <label class="absences-form-label">Durée (heures)</label>
                        <input type="number" name="duree" class="absences-form-control" value="{{ $absence->duree }}" required>
                    </div>
                </div>

                <div class="absences-form-group">
                    <label class="absences-form-label">Statut</label>
                    <select name="justifiee" class="absences-form-control" required>
                        <option value="1" {{ $absence->justifiee ? 'selected' : '' }}>Justifiée</option>
                        <option value="0" {{ !$absence->justifiee ? 'selected' : '' }}>Non justifiée</option>
                    </select>
                </div>

                <div class="absences-form-group">
                    <label class="absences-form-label">Motif</label>
                    <textarea name="motif" class="absences-form-control" rows="3">{{ $absence->motif }}</textarea>
                </div>

                <div class="absences-form-actions">
                    <button type="submit" class="absences-btn absences-btn-primary">
                        <i class="bi bi-save me-1"></i> Enregistrer
                    </button>
                    <a href="{{ route('etudiants.show', $absence->etudiant_id) }}" class="absences-btn absences-btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection