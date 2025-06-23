@extends('layouts.dashboard')

@section('title', 'Ajouter une actualité - ESIC')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/actualites.css') }}">

<div class="actualite-container">
    <div class="actualite-header">
        <h2 class="actualite-title">Ajouter une actualité</h2>
    </div>

    @if(session('success'))
        <div class="actualite-alert actualite-alert-success">{{ session('success') }}</div>
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

    <form action="{{ route('actualites.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="actualite-form-group">
            <label for="titre" class="actualite-form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="actualite-form-control" value="{{ old('titre') }}" required>
        </div>

        <div class="actualite-form-group">
            <label for="description" class="actualite-form-label">Description courte</label>
            <textarea name="description" id="description" class="actualite-form-control actualite-textarea" rows="2" required>{{ old('description') }}</textarea>
        </div>

        <div class="actualite-form-group">
            <label for="contenu" class="actualite-form-label">Contenu</label>
            <textarea name="contenu" id="contenu" class="actualite-form-control actualite-textarea" rows="5" required>{{ old('contenu') }}</textarea>
        </div>

        <div class="actualite-form-group">
            <label for="date_publication" class="actualite-form-label">Date de publication</label>
            <input type="date" name="date_publication" id="date_publication" class="actualite-form-control"
                   value="{{ old('date_publication', now()->toDateString()) }}">
        </div>

        <div class="actualite-form-group">
            <label for="image" class="actualite-form-label">Image (optionnelle)</label>
            <div class="actualite-file-input-container">
                <div class="actualite-file-input-wrapper">
                    <button type="button" class="actualite-file-input-button">
                        <i class="fas fa-upload"></i> Choisir un fichier
                    </button>
                    <input type="file" name="image" id="image" class="actualite-file-input">
                </div>
                <div id="actualite-file-name" class="actualite-file-name">Aucun fichier sélectionné</div>
            </div>
        </div>

        <button type="submit" class="actualite-btn actualite-btn-primary">
            <i class="fas fa-save"></i> Ajouter
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