@extends('layouts.dashboard')

@section('title', 'Ajouter un étudiant')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/etudiants.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        /* Styles spécifiques pour le formulaire d'ajout d'étudiant */

    </style>

    <div class="etudiants-container">
        <div class="etudiants-form-container">
            <h2 class="etudiants-form-title">
                <i class="bi bi-person-plus-fill me-2"></i>Ajouter un étudiant
            </h2>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(isset($candidatData) && $candidatData['candidat_id'])
                <div class="alert alert-info">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    <strong>Données du candidat pré-remplies :</strong> Les informations du candidat approuvé ont été automatiquement remplies. Veuillez compléter les champs manquants.
                </div>
            @endif

            <form action="{{ route('etudiants.store') }}" method="POST" class="etudiants-form">
                @csrf

                @if(isset($candidatData) && $candidatData['candidat_id'])
                    <input type="hidden" name="candidat_id" value="{{ $candidatData['candidat_id'] }}">
                @endif

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Identifiant</label>
                    <input type="text" name="identifiant" class="etudiants-form-control" placeholder="Identifiant" 
                           value="{{ $candidatData['cin'] ?? old('identifiant') }}" required>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Nom</label>
                    <input type="text" name="nom" class="etudiants-form-control" placeholder="Nom" 
                           value="{{ $candidatData['nom'] ?? old('nom') }}" required>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Prénom</label>
                    <input type="text" name="prenom" class="etudiants-form-control" placeholder="Prénom" 
                           value="{{ $candidatData['prenom'] ?? old('prenom') }}" required>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Date de naissance</label>
                    <input type="date" name="date_naissance" class="etudiants-form-control" 
                           value="{{ $candidatData['date_naissance'] ?? old('date_naissance') }}" required>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Email</label>
                    <input type="email" name="email" class="etudiants-form-control" placeholder="Email" 
                           value="{{ $candidatData['email'] ?? old('email') }}" required>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Téléphone</label>
                    <input type="text" name="telephone" class="etudiants-form-control" placeholder="Téléphone" 
                           value="{{ $candidatData['telephone'] ?? old('telephone') }}">
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Adresse</label>
                    <input type="text" name="adresse" class="etudiants-form-control" placeholder="Adresse" 
                           value="{{ $candidatData['adresse'] ?? old('adresse') }}">
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Classe</label>
                    <select name="classe_id" class="etudiants-form-control" required>
                        <option value="">-- Sélectionner une classe --</option>
                        @foreach($classes as $classe)
                            <option value="{{ $classe->id }}" {{ old('classe_id') == $classe->id ? 'selected' : '' }}>
                                {{ $classe->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Filière</label>
                    <select name="filiere_id" class="etudiants-form-control" required>
                        <option value="">-- Sélectionner une filière --</option>
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id }}" {{ (old('filiere_id') == $filiere->id || (isset($candidatData['filiere_id']) && $candidatData['filiere_id'] == $filiere->id)) ? 'selected' : '' }}>
                                {{ $filiere->titre }} ({{ $filiere->niveau }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <h4 class="etudiants-section-title">
                    <i class="bi bi-people-fill me-2"></i>Informations du parent
                </h4>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Nom du parent</label>
                    <input type="text" name="parent_nom" class="etudiants-form-control" placeholder="Nom du parent" 
                           value="{{ old('parent_nom') }}">
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Téléphone du parent</label>
                    <input type="text" name="parent_telephone" class="etudiants-form-control" placeholder="Téléphone du parent" 
                           value="{{ old('parent_telephone') }}">
                </div>

                <div class="etudiants-form-group">
                    <label class="etudiants-form-label">Email du parent</label>
                    <input type="email" name="parent_email" class="etudiants-form-control" placeholder="Email du parent" 
                           value="{{ old('parent_email') }}">
                </div>

                <div class="etudiants-form-actions">
                    <button type="submit" class="etudiants-btn etudiants-btn-primary">
                        <i class="bi bi-save-fill me-1"></i> Enregistrer
                    </button>
                    <a href="{{ route('etudiants.index') }}" class="etudiants-btn etudiants-btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Annuler
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