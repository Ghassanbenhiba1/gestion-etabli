@extends('layouts.dashboard')

@section('title', 'Ajouter une matière - ESIC')

@section('content')
<link rel="stylesheet" href="{{ asset('css/actualites.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div class="actualite-container">
    <div class="actualite-header">
        <h2 class="actualite-title">Ajouter une nouvelle matière</h2>
    </div>

    @if($errors->any())
        <div class="actualite-alert actualite-alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('matieres.store') }}" method="POST" class="actualite-form">
        @csrf

        <div class="actualite-form-group">
            <label for="nom" class="actualite-form-label">Nom de la matière</label>
            <input type="text" name="nom" id="nom" class="actualite-form-control" 
                   value="{{ old('nom') }}" required>
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

        <div class="actualite-form-actions">
            <button type="submit" class="actualite-btn actualite-btn-primary">
                <i class="fas fa-save"></i> Enregistrer
            </button>
            <a href="{{ route('matieres.index') }}" class="actualite-btn actualite-btn-secondary">
                <i class="fas fa-arrow-left"></i> Annuler
            </a>
        </div>
    </form>
</div>
@endsection 