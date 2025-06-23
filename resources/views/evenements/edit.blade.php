@extends('layouts.dashboard')

@section('title', 'Modifier un événement - ESIC')

@section('content')
<link rel="stylesheet" href="{{ asset('css/evenement.css') }}">

<div class="event-container">
    <div class="event-header">
        <h1 class="event-title">Modifier l'événement</h1>
        <p class="event-subtitle">Mettez à jour les informations de l'événement</p>
    </div>

    @if($errors->any())
        <div class="event-alert event-alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('evenements.update', $evenement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="event-form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="event-form-control" value="{{ old('titre', $evenement->titre) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="event-form-label">Description</label>
            <textarea name="description" id="description" class="event-form-control event-textarea" required>{{ old('description', $evenement->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="infos" class="event-form-label">Informations complémentaires</label>
            <textarea name="infos" id="infos" class="event-form-control event-textarea" required>{{ old('infos', $evenement->infos) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="date_event" class="event-form-label">Date</label>
                <input type="date" name="date_event" id="date_event" class="event-form-control" value="{{ old('date_event', $evenement->date_event) }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="heure_debut" class="event-form-label">Heure de début</label>
                <input type="time" name="heure_debut" id="heure_debut" class="event-form-control" value="{{ old('heure_debut', $evenement->heure_debut) }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="heure_fin" class="event-form-label">Heure de fin</label>
                <input type="time" name="heure_fin" id="heure_fin" class="event-form-control" value="{{ old('heure_fin', $evenement->heure_fin) }}" required>
            </div>
        </div>

        @if($evenement->image)
            <div class="mb-3">
                <label class="event-form-label">Image actuelle :</label>
                <img src="{{ asset('storage/' . $evenement->image) }}" alt="Image de l'événement" class="event-current-image">
            </div>
        @endif

        <div class="event-file-input-container">
            <label for="image" class="event-form-label">Nouvelle image (laisser vide pour ne pas changer)</label>
            <div class="event-file-input-wrapper">
                <label class="event-file-input-button">
                    <i class="fas fa-cloud-upload-alt"></i> Choisir un fichier
                    <input type="file" class="event-file-input" id="image" name="image">
                </label>
            </div>
            <div class="event-file-name" id="event-file-name">Aucun fichier sélectionné</div>
        </div>

        <button type="submit" class="event-btn event-btn-primary">
            <i class="fas fa-save"></i> Mettre à jour
        </button>
    </form>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Aucun fichier sélectionné';
        document.getElementById('event-file-name').textContent = fileName;
    });
</script>
@endsection