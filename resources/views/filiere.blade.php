@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="display-5 fw-bold text-center mb-5" style="color: #2c3e50;">Nos Filières de Formation</h1>

    <div class="row">
        @forelse($filieres as $filiere)
        <div class="col-12 mb-4">
            <div class="card filiere-card border-0 shadow-sm h-100">
                <div class="row g-0 h-100">
                    <!-- Image -->
                    @if($filiere->image_path)
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $filiere->image_path) }}" 
                             class="img-fluid rounded-start h-100 w-100 object-fit-cover" 
                             style="object-fit: cover;"
                             alt="{{ $filiere->titre }}">
                    </div>
                    @endif

                    <!-- Contenu -->
                    <div class="{{ $filiere->image_path ? 'col-md-8' : 'col-12' }}">
                        <div class="card-body d-flex flex-column h-100 py-3">
                            <!-- Niveau + durée -->
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge bg-gradient-{{ $filiere->niveau == 'Licence' ? 'info' : ($filiere->niveau == 'Master' ? 'success' : 'warning') }} rounded-pill px-3 py-2">
                                    {{ $filiere->niveau }}
                                </span>
                                <small class="text-muted">Durée : 2 ans</small>
                            </div>

                            <!-- Titre -->
                            <h3 class="card-title mb-3" style="color: #3498db;">{{ $filiere->titre }}</h3>

                            <!-- Description -->
                            <p class="card-text flex-grow-1 mb-3 text-muted">{{ Str::limit($filiere->description, 10000000) }}</p>
                            <p class="card-text flex-grow-1 mb-3 text-muted">{{ Str::limit($filiere->info, 10000000) }}</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-journal-x text-muted" style="font-size: 3rem;"></i>
            <h4 class="mt-3 text-muted">Aucune filière disponible pour le moment.</h4>
        </div>
        @endforelse
    </div>
</div>

<style>
    .filiere-card {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .filiere-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    }

    .filiere-card .card-title {
        transition: color 0.3s;
    }

    .filiere-card:hover .card-title {
        color: #e74c3c !important;
    }

    .bg-gradient-info {
        background: linear-gradient(45deg, #17a2b8, #5bc0de);
        color: white;
    }

    .bg-gradient-success {
        background: linear-gradient(45deg, #28a745, #5cb85c);
        color: white;
    }

    .bg-gradient-warning {
        background: linear-gradient(45deg, #ffc107, #f0ad4e);
        color: white;
    }

    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endsection
