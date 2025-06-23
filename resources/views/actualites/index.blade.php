@extends('layouts.dashboard')

@section('title', 'Liste des Actualités - ESIC')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/actualites.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<div class="actualite-container">
    <div class="actualite-header">
        <h2 class="actualite-title">Liste des Actualités</h2>
    </div>

    @if(session('success'))
        <div class="actualite-alert actualite-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('actualites.create') }}" class="actualite-btn actualite-btn-primary mb-3">
        <i class="fas fa-plus"></i> Ajouter une nouvelle actualité
    </a>

    <table class="actualite-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date de publication</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actualites as $actualite)
                <tr>
                    <td>{{ $actualite->titre }}</td>
                    <td>{{ Str::limit($actualite->description, 50) }}</td>
                    <td>{{ \Carbon\Carbon::parse($actualite->date_publication)->format('d/m/Y') }}</td>
                    <td>
                        <div class="actualite-actions">
                            <a href="{{ route('actualites.edit', $actualite->id) }}" class="actualite-btn actualite-btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('actualites.destroy', $actualite->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="actualite-btn actualite-btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">
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