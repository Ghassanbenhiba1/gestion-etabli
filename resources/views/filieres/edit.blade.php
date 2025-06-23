@extends('layouts.dashboard')

@section('title', 'Modifier Filière - ESIC')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/filiere.css') }}">

    <div class="filiere-edit-container">
        <div class="filiere-edit-header">
            <h1 class="filiere-edit-title">Modifier la filière</h1>
            <p class="filiere-edit-subtitle">Mettez à jour les informations de la filière</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('filieres.update', $filiere->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $filiere->titre) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $filiere->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="info" class="form-label">Informations détaillées</label>
                <textarea name="info" id="info" class="form-control" required>{{ old('info', $filiere->info) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="niveau" class="form-label">Niveau</label>
                <select name="niveau" id="niveau" class="form-control" required>
                    @foreach($niveaux as $niveau)
                        <option value="{{ $niveau }}" {{ old('niveau', $filiere->niveau) === $niveau ? 'selected' : '' }}>{{ $niveau }}</option>
                    @endforeach
                </select>
            </div>

            @if($filiere->image_path)
                <div class="current-image-container">
                    <span class="current-image-label">Image actuelle :</span>
                    <img src="{{ asset('storage/' . $filiere->image_path) }}" alt="Image de la filière" class="current-image">
                </div>
            @endif

            <div class="file-input-container">
                <label for="image_path" class="form-label">Nouvelle image (laisser vide pour ne pas changer)</label>
                <div class="file-input-wrapper">
                    <label class="file-input-button">
                        <i class="fas fa-cloud-upload-alt"></i> Choisir un fichier
                        <input type="file" class="file-input" id="image_path" name="image_path">
                    </label>
                </div>
                <div class="file-name" id="file-name">Aucun fichier sélectionné</div>
            </div>

            <button type="submit" class="btn-update">
                <i class="fas fa-save"></i> Mettre à jour
            </button>
        </form>
    </div>

    <script>
        // Script pour afficher le nom du fichier sélectionné
        document.getElementById('image_path').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
@endsection