<section class="container my-5">
    <h2 class="mb-4 text-center">Dernières Actualités</h2>
    <div class="row">
        @foreach($actualites->take(3) as $news)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($news->image)
                        <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->titre }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $news->titre }}</h5>
                        <p class="card-text">{{ Str::limit($news->contenu, 100) }}</p>
                        <p class="text-muted">
                            <i class="bi bi-clock"></i> {{ $news->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('actualites.page') }}" class="btn btn-outline-info">Voir toutes les actualités</a>
    </div>
</section>
