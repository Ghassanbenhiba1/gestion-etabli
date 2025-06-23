<section class="container my-5">
    <h2 class="mb-4 text-center">Événements à venir</h2>
    <div class="row">
        @foreach($evenements->take(3) as $event)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
@if($event->image)
    <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->titre }}">
@endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $event->titre }}</h5>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                        <p class="text-muted"><i class="bi bi-calendar-event"></i> {{ $event->date_event->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('evenements.page') }}" class="btn btn-outline-success">Voir tous les événements</a>
    </div>
</section>
