@extends('layouts.dashboard')

@section('title', 'Ajouter une Filière - ESIC')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/filiere.css') }}">

    <div class="filiere-container">
        <div class="filiere-header">
            <h1 class="filiere-title">Ajouter une nouvelle filière</h1>
            <p class="filiere-subtitle">Remplissez le formulaire pour créer une nouvelle filière</p>
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

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('filieres.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre de la filière</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
                @error('titre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="info" class="form-label">Informations détaillées</label>
                <textarea class="form-control" id="info" name="info" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="niveau" class="form-label">Niveau requis</label>
                <select class="form-select" id="niveau" name="niveau" required>
                    <option value="">Sélectionnez un niveau</option>
                    @foreach($niveaux as $niveau)
                        <option value="{{ $niveau }}">{{ $niveau }}</option>
                    @endforeach
                </select>
            </div>

            <div class="file-input-container">
                <label for="image_path" class="form-label">Image de la filière</label>
                <div class="file-input-wrapper">
                    <label class="file-input-button">
                        <i class="fas fa-cloud-upload-alt"></i> Choisir un fichier
                        <input type="file" class="file-input" id="image_path" name="image_path">
                    </label>
                </div>
                <div class="file-name" id="file-name">Aucun fichier sélectionné</div>
            </div>

            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Enregistrer
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