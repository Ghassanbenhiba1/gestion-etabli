@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="display-5 fw-bold text-center mb-5" style="color: #2c3e50;">Nos Événements</h1>

    <div class="row">
        @forelse($evenements as $evenement)
        <div class="col-12 mb-4">
            <div class="card event-card border-0 shadow-sm h-100">
                <div class="row g-0 h-100">
                    <!-- Colonne Image -->
                    @if($evenement->image)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $evenement->image) }}" 
                             class="img-fluid rounded-start h-100 w-100" 
                             style="object-fit: cover;"
                             alt="{{ $evenement->titre }}">
                    </div>
                    @endif
                    
                    <!-- Colonne Contenu -->
                    <div class="{{ $evenement->image ? 'col-md-8' : 'col-12' }}">
                        <div class="card-body d-flex flex-column h-100 py-3">
                            <!-- En-tête avec date -->
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ \Carbon\Carbon::parse($evenement->date)->format('d F Y') }}
                                </small>
                            </div>
                            
                            <!-- Titre -->
                            <h3 class="card-title mb-3" style="color: #3498db;">{{ $evenement->titre }}</h3>
                            
                            <!-- Description -->
                            <p class="card-text flex-grow-1 mb-3">{{ $evenement->description }}</p>
                            
                            <!-- Infos supplémentaires -->
                            @if($evenement->infos)
                            <div class="alert alert-light p-2 mb-3">
                                <small class="text-muted">{{ $evenement->infos }}</small>
                            </div>
                            @endif
                            
                            <!-- Bouton -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
            <h4 class="mt-3 text-muted">Aucun événement disponible</h4>
        </div>
        @endforelse
    </div>
</div>

<style>
    .event-card {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        overflow: hidden;
    }
    
    .event-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    }
    
    .card-title {
        transition: color 0.3s;
    }
    
    .event-card:hover .card-title {
        color: #e74c3c !important;
    }
</style>
@endsection