@extends('layouts.dashboard')

@section('title', 'Liste des Événements - ESIC')

@section('content')
<link rel="stylesheet" href="{{ asset('css/evenement.css') }}">

<div class="event-container">
    <div class="event-header">
        <h1 class="event-title">Liste des Événements</h1>
        <p class="event-subtitle">Gérez les événements de l'établissement</p>
    </div>

    @if(session('success'))
        <div class="event-alert event-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('evenements.create') }}" class="event-btn event-btn-primary mb-4">
        <i class="fas fa-plus"></i> Ajouter un événement
    </a>

    <table class="event-table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date</th>
                <th>Heure début</th>
                <th>Heure fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evenements as $evenement)
                <tr>
                    <td>{{ $evenement->titre }}</td>
                    <td>{{ \Str::limit($evenement->description, 50) }}</td>
                    <td>{{ $evenement->date_event->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($evenement->heure_debut)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($evenement->heure_fin)->format('H:i') }}</td>
                    <td>
                        <div class="event-actions">
                            <a href="{{ route('evenements.edit', $evenement->id) }}" class="event-btn event-btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="event-btn event-btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                    <i class="fas fa-trash"></i>
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