@extends('layouts.dashboard')

@section('title', 'Ajouter une note')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/notes.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <div class="notes-container">
        <div class="notes-form-card">
            <h2 class="notes-form-title">
                <i class="bi bi-journal-plus me-2"></i>Ajouter une note
            </h2>
            <p class="notes-form-subtitle">Pour {{ $etudiant->nom }} {{ $etudiant->prenom }}</p>

            <form action="{{ route('notes.store') }}" method="POST" class="notes-form">
                @csrf
                <input type="hidden" name="etudiant_id" value="{{ $etudiant->id }}">

                <div class="notes-form-group">
                    <label class="notes-form-label">Matière</label>
                    <select name="matiere_id" class="notes-form-control" required>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="notes-form-row">
                    <div class="notes-form-group">
                        <label class="notes-form-label">Note (/20)</label>
                        <input type="number" name="note" class="notes-form-control" 
                               step="0.1" min="0" max="20" placeholder="Ex: 15.5" required>
                    </div>

                    <div class="notes-form-group">
                        <label class="notes-form-label">Coefficient</label>
                        <input type="number" name="coefficient" class="notes-form-control" 
                               step="0.1" min="0.1" value="1" required>
                    </div>
                </div>

                <div class="notes-form-group">
                    <label class="notes-form-label">Date</label>
                    <input type="date" name="date" class="notes-form-control" required>
                </div>

                <div class="notes-form-group">
                    <label class="notes-form-label">Description</label>
                    <textarea name="description" class="notes-form-control" rows="3" 
                              placeholder="Ex: Contrôle chapitre 3"></textarea>
                </div>

                <div class="notes-form-actions">
                    <button type="submit" class="notes-btn notes-btn-success">
                        <i class="bi bi-check-circle-fill me-1"></i> Ajouter la note
                    </button>
                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="notes-btn notes-btn-secondary">
                        <i class="bi bi-x-circle-fill me-1"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection