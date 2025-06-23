@extends('layouts.dashboard')

@section('title', 'Liste des cours - ESIC')

@section('content')
<link rel="stylesheet" href="{{ asset('css/actualites.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div class="actualite-container">
    <div class="actualite-header">
        <h2 class="actualite-title">Liste des cours</h2>
    </div>

    @if(session('success'))
        <div class="actualite-alert actualite-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('cours.create') }}" class="actualite-btn actualite-btn-primary mb-3">
        <i class="fas fa-plus"></i> Ajouter un nouveau cours
    </a>

    <table class="actualite-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Filière</th>
                <th>Année</th>
                <th>Fichier PDF</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cours as $coursItem)
                <tr>
                    <td>{{ $coursItem->titre }}</td>
                    <td>{{ $coursItem->filiere ? $coursItem->filiere->titre : 'Non assignée' }}</td>
                    <td>{{ $coursItem->annee }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $coursItem->pdf_path) }}" target="_blank" class="actualite-link">
                            <i class="fas fa-file-pdf"></i> Voir le PDF
                        </a>
                    </td>
                    <td>
                        <div class="actualite-actions">
                            <a href="{{ route('cours.edit', $coursItem->id) }}" class="actualite-btn actualite-btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('cours.destroy', $coursItem->id) }}" method="POST" class="d-inline">
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