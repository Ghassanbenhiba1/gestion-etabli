@extends('layouts.dashboard')

@section('title', 'Modifier une note')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/notes.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <div class="notes-container">
        <div class="notes-form-card">
            <h2 class="notes-form-title">
                <i class="bi bi-journal-text me-2"></i>Modifier la note
            </h2>
            <p class="notes-form-subtitle">Pour {{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</p>
            @if($note->etudiant->filiere)
                <p class="notes-form-subtitle text-muted">Filière : {{ $note->etudiant->filiere->titre }}</p>
            @endif

            <form action="{{ route('notes.update', $note->id) }}" method="POST" class="notes-form">
                @csrf
                @method('PUT')

                <div class="notes-form-group">
                    <label class="notes-form-label">Matière</label>
                    <select name="matiere_id" class="notes-form-control" required>
                        <option value="">-- Choisir une matière --</option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}" {{ $note->matiere_id == $matiere->id ? 'selected' : '' }}>
                                {{ $matiere->nom }}
                            </option>
                        @endforeach
                    </select>
                    @if($matieres->isEmpty())
                        <small class="text-warning">Aucune matière disponible pour cette filière.</small>
                    @endif
                </div>

                <div class="notes-form-row">
                    <div class="notes-form-group">
                        <label class="notes-form-label">Note (/20)</label>
                        <input type="number" name="note" class="notes-form-control" 
                               value="{{ $note->note }}" step="0.1" min="0" max="20" required>
                    </div>

                    <div class="notes-form-group">
                        <label class="notes-form-label">Coefficient</label>
                        <input type="number" name="coefficient" class="notes-form-control" 
                               value="{{ $note->coefficient }}" step="0.1" min="0.1" required>
                    </div>
                </div>

                <div class="notes-form-group">
                    <label class="notes-form-label">Date</label>
                    <input type="date" name="date" class="notes-form-control" value="{{ $note->date }}" required>
                </div>

                <div class="notes-form-group">
                    <label class="notes-form-label">Description</label>
                    <textarea name="description" class="notes-form-control" rows="3">{{ $note->description }}</textarea>
                </div>

                <div class="notes-form-actions">
                    <button type="submit" class="notes-btn notes-btn-primary">
                        <i class="bi bi-save-fill me-1"></i> Enregistrer
                    </button>
                    <a href="{{ route('etudiants.show', $note->etudiant_id) }}" class="notes-btn notes-btn-secondary">
                        <i class="bi bi-x-circle-fill me-1"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection