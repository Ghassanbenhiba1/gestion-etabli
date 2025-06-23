@extends('layouts.dashboard')

@section('title', 'Modifier l\'actualité - ESIC')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/actualites.css') }}">

<div class="actualite-container">
    <div class="actualite-header">
        <h2 class="actualite-title">Modifier l'Actualité</h2>
    </div>

    @if(session('success'))
        <div class="actualite-alert actualite-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('actualites.update', $actualite->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="actualite-form-group">
            <label for="titre" class="actualite-form-label">Titre</label>
            <input type="text" class="actualite-form-control" id="titre" name="titre" 
                   value="{{ old('titre', $actualite->titre) }}" required>
        </div>

        <div class="actualite-form-group">
            <label for="description" class="actualite-form-label">Description</label>
            <textarea class="actualite-form-control actualite-textarea" id="description" 
                      name="description" rows="3" required>{{ old('description', $actualite->description) }}</textarea>
        </div>

        <div class="actualite-form-group">
            <label for="contenu" class="actualite-form-label">Contenu</label>
            <textarea class="actualite-form-control actualite-textarea" id="contenu" 
                      name="contenu" rows="5" required>{{ old('contenu', $actualite->contenu) }}</textarea>
        </div>

        <div class="actualite-form-group">
            <label for="date_publication" class="actualite-form-label">Date de Publication</label>
            <input type="date" class="actualite-form-control" id="date_publication" 
                   name="date_publication" value="{{ old('date_publication', $actualite->date_publication) }}" required>
        </div>

        <div class="actualite-form-group">
            <label for="image" class="actualite-form-label">Image</label>
            <div class="actualite-file-input-container">
                <div class="actualite-file-input-wrapper">
                    <button type="button" class="actualite-file-input-button">
                        <i class="fas fa-upload"></i> Changer l'image
                    </button>
                    <input type="file" class="actualite-file-input" id="image" name="image">
                </div>
                <div id="actualite-file-name" class="actualite-file-name">Aucun fichier sélectionné</div>
            </div>
            @if($actualite->image)
                <p class="actualite-current-image-info">
                    Image actuelle : 
                    <a href="{{ asset('storage/' . $actualite->image) }}" target="_blank" class="actualite-image-link">
                        <i class="fas fa-eye"></i> Voir l'image
                    </a>
                </p>
                <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image actuelle" class="actualite-current-image">
            @endif
        </div>

        <button type="submit" class="actualite-btn actualite-btn-primary">
            <i class="fas fa-save"></i> Mettre à jour
        </button>
    </form>
</div>

@section('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('actualite-file-name').textContent = fileName;
    });
</script>
@endsection
@endsection