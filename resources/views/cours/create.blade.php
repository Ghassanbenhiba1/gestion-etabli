@extends('layouts.dashboard')

@section('title', 'Ajouter un cours - ESIC')

@section('content')
<link rel="stylesheet" href="{{ asset('css/actualites.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div class="actualite-container">
    <div class="actualite-header">
        <h2 class="actualite-title">Ajouter un cours</h2>
    </div>

    @if(session('success'))
        <div class="actualite-alert actualite-alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="actualite-alert actualite-alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cours.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="actualite-form-group">
            <label for="titre" class="actualite-form-label">Titre du cours</label>
            <input type="text" name="titre" id="titre" class="actualite-form-control" 
                   value="{{ old('titre') }}" required>
        </div>

        <div class="actualite-form-group">
            <label for="filiere_id" class="actualite-form-label">Filière</label>
            <select name="filiere_id" id="filiere_id" class="actualite-form-control" required>
                <option value="">-- Choisir une filière --</option>
                @foreach($filieres as $filiere)
                    <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
                        {{ $filiere->titre }} ({{ $filiere->niveau }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="actualite-form-group">
            <label for="annee" class="actualite-form-label">Année</label>
            <select name="annee" id="annee" class="actualite-form-control" required>
                <option value="">-- Choisir --</option>
                <option value="1ere" {{ old('annee') == '1ere' ? 'selected' : '' }}>1ère année</option>
                <option value="2eme" {{ old('annee') == '2eme' ? 'selected' : '' }}>2ème année</option>
            </select>
        </div>

        <div class="actualite-form-group">
            <label for="pdf" class="actualite-form-label">Fichier PDF</label>
            <div class="actualite-file-input-container">
                <div class="actualite-file-input-wrapper">
                    <button type="button" class="actualite-file-input-button">
                        <i class="fas fa-upload"></i> Sélectionner un fichier PDF
                    </button>
                    <input type="file" name="pdf" id="pdf" class="actualite-file-input" 
                           accept="application/pdf" required>
                </div>
                <div id="actualite-file-name" class="actualite-file-name">Aucun fichier sélectionné</div>
            </div>
            <small class="actualite-form-text">Format accepté : PDF (max: 100MB)</small>
        </div>

        <div class="actualite-form-actions">
            <button type="submit" class="actualite-btn actualite-btn-primary">
                <i class="fas fa-save"></i> Ajouter le cours
            </button>
            <a href="{{ route('cours.index') }}" class="actualite-btn actualite-btn-secondary">
                <i class="fas fa-times"></i> Annuler
            </a>
        </div>
    </form>
</div>

@section('scripts')
<script>
    document.getElementById('pdf').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('actualite-file-name').textContent = fileName;
    });
</script>
@endsection
@endsection