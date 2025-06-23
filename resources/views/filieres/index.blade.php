@extends('layouts.dashboard')

@section('title', 'Filières - ESIC')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/filiere.css') }}">

    <div class="filieres-container">
        <div class="filieres-header">
            <div class="filieres-title">
                <h1>Liste des Filières</h1>
                <p>Gérez les différentes filières de l'établissement</p>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <a href="{{ route('filieres.create') }}" class="create-btn">
                <i class="fas fa-plus"></i> Créer une filière
            </a>
        </div>

        <table class="filieres-table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Niveau</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($filieres as $filiere)
                    <tr>
                        <td>{{ $filiere->titre }}</td>
                        <td>{{ $filiere->niveau }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('filieres.edit', $filiere->id) }}" class="edit-btn">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn" onclick="return confirm('Supprimer cette filière ?')">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Aucune filière disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
