@extends('layouts.dashboard')

@section('title', 'Liste des matières - ESIC')

@section('content')
<link rel="stylesheet" href="{{ asset('css/actualites.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div class="actualite-container">
    <div class="actualite-header">
        <h2 class="actualite-title">Liste des matières</h2>
    </div>

    @if(session('success'))
        <div class="actualite-alert actualite-alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="actualite-alert actualite-alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('matieres.create') }}" class="actualite-btn actualite-btn-primary mb-3">
        <i class="fas fa-plus"></i> Ajouter une nouvelle matière
    </a>

    <table class="actualite-table">
        <thead>
            <tr>
                <th>Nom de la matière</th>
                <th>Filière</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matieres as $matiere)
                <tr>
                    <td>{{ $matiere->nom }}</td>
                    <td>{{ $matiere->filiere ? $matiere->filiere->titre : 'Non assignée' }}</td>
                    <td>
                        <div class="actualite-actions">
                            <a href="{{ route('matieres.edit', $matiere->id) }}" class="actualite-btn actualite-btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('matieres.destroy', $matiere->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="actualite-btn actualite-btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 