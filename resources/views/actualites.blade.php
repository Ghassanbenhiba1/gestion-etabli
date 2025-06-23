@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="display-5 fw-bold text-center mb-5" style="color: #2c3e50;">Toutes les Actualités</h1>

    <div class="row">
        @forelse($actualites as $actu)
        <div class="col-12 mb-4">
            <div class="card news-card border-0 shadow-sm h-100">
                <div class="row g-0 h-100">
                    <!-- Image -->
                    @if($actu->image)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $actu->image) }}" 
                             class="img-fluid rounded-start h-100 w-100" 
                             style="object-fit: cover;"
                             alt="{{ $actu->titre }}">
                    </div>
                    @endif

                    <!-- Contenu -->
                    <div class="{{ $actu->image ? 'col-md-8' : 'col-12' }}">
                        <div class="card-body d-flex flex-column h-100 py-3">
                            <!-- Date -->
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ \Carbon\Carbon::parse($actu->created_at)->format('d F Y') }}
                                </small>
                            </div>

                            <!-- Titre -->
                            <h3 class="card-title mb-3" style="color: #2c3e50;">{{ $actu->titre }}</h3>

                            <!-- Aperçu -->
                            <p class="card-text flex-grow-1 mb-3">{{ Str::limit($actu->contenu, 10000, '...') }}</p>

                            <!-- Bouton -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-journal-x text-muted" style="font-size: 3rem;"></i>
            <h4 class="mt-3 text-muted">Aucune actualité disponible pour le moment.</h4>
        </div>
        @endforelse
    </div>

    <!-- Pagination si applicable -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $actualites->links() }}
    </div>
</div>

<style>
    .news-card {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .news-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    }

    .news-card .card-title {
        transition: color 0.3s;
    }

    .news-card:hover .card-title {
        color: #e74c3c !important;
    }
</style>
@endsection
