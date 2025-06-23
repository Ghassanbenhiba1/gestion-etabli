@extends('layouts.dashboard')

@section('title', 'Modifier les cours - ESIC')

@section('content')
<link rel="stylesheet" href="{{ asset('css/actualites.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div class="actualite-container">
    <div class="actualite-header">
        <h2 class="actualite-title">Modifier un cours</h2>
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

    <form action="{{ route('cours.update', $cours->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="actualite-form-group">
            <label for="titre" class="actualite-form-label">Titre du cours</label>
            <input type="text" name="titre" id="titre" class="actualite-form-control" 
                   value="{{ old('titre', $cours->titre) }}" required>
        </div>

        <div class="actualite-form-group">
            <label for="filiere_id" class="actualite-form-label">Filière</label>
            <select name="filiere_id" id="filiere_id" class="actualite-form-control" required>
                <option value="">-- Choisir une filière --</option>
                @foreach($filieres as $filiere)
                    <option value="{{ $filiere->id }}" {{ old('filiere_id', $cours->filiere_id) == $filiere->id ? 'selected' : '' }}>
                        {{ $filiere->titre }} ({{ $filiere->niveau }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="actualite-form-group">
            <label for="annee" class="actualite-form-label">Année</label>
            <select name="annee" id="annee" class="actualite-form-control" required>
                <option value="1ere" {{ old('annee', $cours->annee) == '1ere' ? 'selected' : '' }}>1ère année</option>
                <option value="2eme" {{ old('annee', $cours->annee) == '2eme' ? 'selected' : '' }}>2ème année</option>
            </select>
        </div>

        <div class="actualite-form-group">
            <label for="pdf" class="actualite-form-label">Fichier PDF</label>
            <div class="actualite-file-input-container">
                <div class="actualite-file-input-wrapper">
                    <button type="button" class="actualite-file-input-button">
                        <i class="fas fa-upload"></i> Changer le fichier PDF
                    </button>
                    <input type="file" name="pdf" id="pdf" class="actualite-file-input" accept="application/pdf">
                </div>
                <div id="actualite-file-name" class="actualite-file-name">Aucun fichier sélectionné</div>
            </div>
            @if($cours->pdf_path)
                <p class="actualite-current-file mt-2">
                    Fichier actuel : 
                    <a href="{{ asset('storage/' . $cours->pdf_path) }}" target="_blank" class="actualite-link pdf">
                        <i class="fas fa-file-pdf"></i> Voir le PDF actuel
                    </a>
                </p>
            @endif
        </div>

        <div class="actualite-form-actions">
            <button type="submit" class="actualite-btn actualite-btn-primary">
                <i class="fas fa-save"></i> Mettre à jour
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