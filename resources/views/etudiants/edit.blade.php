@extends('layouts.dashboard')

@section('title', 'Modifier un étudiant')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/etudiants.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <div class="etudiants-container">
        <div class="etudiants-form-container">
            <h2 class="etudiants-form-title">
                <i class="bi bi-person-gear me-2"></i>Modifier l'étudiant
            </h2>

            <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST" class="etudiants-form">
                @csrf
                @method('PUT')

                <div class="etudiants-form-row">
                    <div class="etudiants-form-group">
                        <label class="etudiants-form-label">Nom</label>
                        <input type="text" name="nom" class="etudiants-form-control" 
                               value="{{ $etudiant->nom }}" required>
                    </div>

                    <div class="etudiants-form-group">
                        <label class="etudiants-form-label">Prénom</label>
                        <input type="text" name="prenom" class="etudiants-form-control" 
                               value="{{ $etudiant->prenom }}" required>
                    </div>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Identifiant</label>
                    <input type="text" name="identifiant" class="etudiants-form-control" 
                           value="{{ $etudiant->identifiant }}" required>
                </div>

                <div class="etudiants-form-row">
                    <div class="etudiants-form-group">
                        <label class="etudiants-form-label">Date de naissance</label>
                        <input type="date" name="date_naissance" class="etudiants-form-control" 
                               value="{{ $etudiant->date_naissance }}">
                    </div>

                    <div class="etudiants-form-group">
                        <label class="etudiants-form-label">Classe</label>
                        <select name="classe_id" class="etudiants-form-control" required>
                            @foreach($classes as $classe)
                                <option value="{{ $classe->id }}" {{ $etudiant->classe_id == $classe->id ? 'selected' : '' }}>
                                    {{ $classe->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Filière</label>
                    <select name="filiere_id" class="etudiants-form-control" required>
                        <option value="">-- Sélectionner une filière --</option>
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id }}" {{ $etudiant->filiere_id == $filiere->id ? 'selected' : '' }}>
                                {{ $filiere->titre }} ({{ $filiere->niveau }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="etudiants-form-row">
                    <div class="etudiants-form-group">
                        <label class="etudiants-form-label">Email</label>
                        <input type="email" name="email" class="etudiants-form-control" 
                               value="{{ $etudiant->email }}">
                    </div>

                    <div class="etudiants-form-group">
                        <label class="etudiants-form-label">Téléphone</label>
                        <input type="text" name="telephone" class="etudiants-form-control" 
                               value="{{ $etudiant->telephone }}">
                    </div>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Adresse</label>
                    <input type="text" name="adresse" class="etudiants-form-control" 
                           value="{{ $etudiant->adresse }}">
                </div>

                <h4 class="etudiants-section-title">
                    <i class="bi bi-people-fill me-2"></i>Informations du parent
                </h4>

                <div class="etudiants-form-row">
                    <div class="etudiants-form-group">
                        <label class="etudiants-form-label">Nom du parent</label>
                        <input type="text" name="parent_nom" class="etudiants-form-control" 
                               value="{{ $etudiant->parentEtudiant->nom }}">
                    </div>

                    <div class="etudiants-form-group">
                        <label class="etudiants-form-label">Téléphone du parent</label>
                        <input type="text" name="parent_telephone" class="etudiants-form-control" 
                               value="{{ $etudiant->parentEtudiant->telephone }}">
                    </div>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Email du parent</label>
                    <input type="email" name="parent_email" class="etudiants-form-control" 
                           value="{{ $etudiant->parentEtudiant->email }}">
                </div>

                <div class="etudiants-form-actions">
                    <button type="submit" class="etudiants-btn etudiants-btn-success">
                        <i class="bi bi-check-circle-fill me-1"></i> Enregistrer
                    </button>
                    <a href="{{ route('etudiants.index') }}" class="etudiants-btn etudiants-btn-secondary">
                        <i class="bi bi-x-circle-fill me-1"></i> Annuler
                    </a>
                </div>
            </form>

            @if($errors->any())
                <div class="etudiants-alert etudiants-alert-danger">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <ul class="etudiants-error-list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection