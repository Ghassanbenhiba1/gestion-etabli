<section class="container my-5">
<div class="container py-5">
    <h2 class="text-center mb-4">Nos Filières</h2>

    <div class="row mb-4">
        @foreach($filieres as $filiere)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    @if($filiere->image_path)
                        <img src="{{ asset('storage/' . $filiere->image_path) }}" class="card-img-top" alt="{{ $filiere->titre }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $filiere->titre }}</h5>
                        <p class="card-text">{{ Str::limit($filiere->description, 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mb-4">
        <p class="lead">
            Notre ecole offre une diversité de filières professionnelles : informatique, gestion,
            marketing, design, finance et bien plus encore. Chaque filière est pensée pour vous préparer 
            à un avenir professionnel prometteur.
        </p>
    </div>

    <div class="text-center">
        <a href="{{ route('filiere.page') }}" class="btn btn-primary">Voir toutes les Filières</a>
    </div>
</div>
</section>
