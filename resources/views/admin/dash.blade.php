@extends('layouts.dashboard') {{-- Utilise ton layout admin --}}

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/candidat-photos.css') }}">

<style>
    /* Dashboard Container */
    #dashboard-container {
        background-color: var(--light);
        padding: 2rem;
        min-height: calc(100vh - var(--topbar-height));
    }

    /* Dashboard Title */
    #dashboard-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 0.75rem;
    }

    #dashboard-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        border-radius: 2px;
    }

    /* Stats Grid */
    #dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    /* Stat Cards */
    #stat-filieres,
    #stat-evenements,
    #stat-actualites,
    #stat-cours {
        background: var(--white);
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        border-left: 4px solid transparent;
    }

    #stat-filieres:hover,
    #stat-evenements:hover,
    #stat-actualites:hover,
    #stat-cours:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-hover-shadow);
    }

    #stat-filieres {
        border-left-color: var(--primary);
    }

    #stat-evenements {
        border-left-color: var(--success);
    }

    #stat-actualites {
        border-left-color: var(--danger);
    }

    #stat-cours {
        border-left-color: var(--warning);
    }

    /* Card Titles */
    #title-filieres,
    #title-evenements,
    #title-actualites,
    #title-cours {
        font-size: 1rem;
        font-weight: 600;
        color: var(--gray);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    /* Count Values */
    #count-filieres,
    #count-evenements,
    #count-actualites,
    #count-cours {
        font-size: 2.25rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    #count-filieres {
        color: var(--primary);
    }

    #count-evenements {
        color: var(--success);
    }

    #count-actualites {
        color: var(--danger);
    }

    #count-cours {
        color: var(--warning);
    }

    /* Info Text */
    #new-filieres-week,
    #upcoming-evenements,
    #month-actualites,
    #new-cours-week {
        font-size: 0.875rem;
        color: var(--gray);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Sections */
    #recent-candidats-section,
    #recent-messages-section {
        margin-top: 2.5rem;
    }

    /* Section Titles */
    #recent-candidats-title,
    #recent-messages-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1.5rem;
        position: relative;
        padding-left: 1rem;
    }

    #recent-candidats-title::before,
    #recent-messages-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 1.25rem;
        background: var(--primary);
        border-radius: 2px;
    }

    /* Lists */
    #recent-candidats-list,
    #recent-messages-list {
        background: var(--white);
        border-radius: 10px;
        box-shadow: var(--card-shadow);
        padding: 1.5rem;
    }

    /* List Items */
    #recent-candidats-list li,
    #recent-messages-list li {
        padding: 1rem 0;
        border-bottom: 1px solid var(--gray-light);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: var(--transition);
    }

    #recent-candidats-list li:last-child,
    #recent-messages-list li:last-child {
        border-bottom: none;
    }

    #recent-candidats-list li:hover,
    #recent-messages-list li:hover {
        background-color: var(--primary-light);
    }

    /* Badge for Messages Count */
    #recent-messages-title span {
        background-color: var(--danger);
        color: white;
        font-size: 0.875rem;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        margin-left: 0.75rem;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #dashboard-stats > div {
        animation: fadeInUp 0.5s ease-out forwards;
    }

    #stat-filieres { animation-delay: 0.1s; }
    #stat-evenements { animation-delay: 0.2s; }
    #stat-actualites { animation-delay: 0.3s; }
    #stat-cours { animation-delay: 0.4s; }

    /* Responsive */
    @media (max-width: 768px) {
        #dashboard-stats {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 576px) {
        #dashboard-container {
            padding: 1.5rem;
        }
        
        #dashboard-stats {
            grid-template-columns: 1fr;
        }
        
        #dashboard-title {
            font-size: 1.5rem;
        }
    }
    .recent-message-list {
    background-color: white;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: var(--card-shadow);
    transition: all 0.3s ease;
}

.recent-message-list:hover {
    box-shadow: var(--card-hover-shadow);
}

.recent-message-item {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    padding-bottom: 0.75rem;
    padding-top: 0.75rem;
    transition: background 0.2s ease;
    font-size: 0.95rem;
    color: var(--dark-color);
}

.recent-message-item:hover {
    background-color: var(--primary-light);
    border-radius: 8px;
    padding-left: 0.5rem;
}

.actions {
    display: flex;
    gap: 0.5rem;
}

.btn-approve, .btn-decline, .btn-delete {
    border: none;
    padding: 0.3rem 0.6rem;
    border-radius: 5px;
    color: white;
    cursor: pointer;
}
.btn-approve { background-color: #28a745; }
.btn-decline { background-color: #dc3545; }
.btn-delete { background-color: #ffc107; }

.btn-delete-msg {
    background: none;
    border: none;
    color: #dc3545;
    cursor: pointer;
}

/* Styles pour les candidats récents */
.candidat-item {
    display: flex;
    align-items: center;
    padding: 0.75rem;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    transition: background 0.2s ease;
}

.candidat-item:hover {
    background-color: var(--primary-light);
    border-radius: 8px;
}

.candidat-photo {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #3498db;
    margin-right: 12px;
    flex-shrink: 0;
}

.candidat-info {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.candidat-name {
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 2px;
}

.candidat-date {
    font-size: 0.8rem;
    color: var(--muted-color);
}

.candidat-actions {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}
</style>
<div id="dashboard-container" class="p-6 bg-gray-100">
    <h1 id="dashboard-title" class="text-2xl font-bold mb-6">Tableau de bord</h1>

    <div id="dashboard-stats" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div id="stat-filieres" class="bg-white p-4 rounded shadow">
            <h2 id="title-filieres" class="text-lg font-semibold">Filières</h2>
            <p id="count-filieres" class="text-3xl font-bold text-blue-600">{{ $nbFilieres }}</p>
            <p id="new-filieres-week" class="text-sm text-gray-500">{{ $filieresSemaine }} nouvelles cette semaine</p>
        </div>

        <div id="stat-evenements" class="bg-white p-4 rounded shadow">
            <h2 id="title-evenements" class="text-lg font-semibold">Événements</h2>
            <p id="count-evenements" class="text-3xl font-bold text-green-600">{{ $nbEvenements }}</p>
            <p id="upcoming-evenements" class="text-sm text-gray-500">{{ $evenementsAVenir }} à venir</p>
        </div>

        <div id="stat-actualites" class="bg-white p-4 rounded shadow">
            <h2 id="title-actualites" class="text-lg font-semibold">Actualités</h2>
            <p id="count-actualites" class="text-3xl font-bold text-red-600">{{ $nbActualites }}</p>
            <p id="month-actualites" class="text-sm text-gray-500">{{ $actualitesMois }} publiées ce mois</p>
        </div>

        <div id="stat-cours" class="bg-white p-4 rounded shadow">
            <h2 id="title-cours" class="text-lg font-semibold">Cours</h2>
            <p id="count-cours" class="text-3xl font-bold text-purple-600">{{ $nbCours }}</p>
            <p id="new-cours-week" class="text-sm text-gray-500">{{ $nouveauxCours }} ajoutés cette semaine</p>
        </div>
    </div>

    <div id="recent-candidats-section" class="mt-10">
        <h2 id="recent-candidats-title" class="text-xl font-bold mb-4">Candidats récents</h2>
        <ul id="recent-candidats-list" class="bg-white p-4 rounded shadow space-y-2">
            @forelse($candidats as $candidat)
                <li id="candidat-{{ $candidat->id }}" class="candidat-item">
                    <img src="{{ $candidat->photo ? asset('storage/'.$candidat->photo) : asset('images/default-profile.png') }}" alt="{{ $candidat->nom }} {{ $candidat->prenom }}" class="dashboard-candidate-photo" onclick="openPhotoModal(this.src, '{{ $candidat->nom }} {{ $candidat->prenom }}')">
                    <div class="candidat-info">
                        <span class="candidat-name">{{ $candidat->nom }} {{ $candidat->prenom }}</span>
                        <span class="candidat-date">{{ $candidat->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="candidat-actions">
                        <span class="badge status-{{ $candidat->statut ?? 'en_attente' }}">{{ $candidat->statut ?? 'En attente' }}</span>
                        @if($candidat->statut == 'en_attente')
                            <form action="{{ route('candidats.approuver', $candidat->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-approve">Approuver</button>
                            </form>
                            <form action="{{ route('candidats.decliner', $candidat->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-decline">Décliner</button>
                            </form>
                        @endif
                        <form action="{{ route('candidats.destroy', $candidat->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette candidature ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Supprimer</button>
                        </form>
                    </div>
                </li>
            @empty
                <li>Aucune nouvelle candidature.</li>
            @endforelse
        </ul>
    </div>

    <div id="recent-messages-section" class="mt-10">
    <h2 id="recent-messages-title" class="text-xl font-bold mb-4 text-gradient">
        <i class="fas fa-envelope-open-text mr-2"></i> Derniers messages ({{ $nbMessages }})
    </h2>
    <ul id="recent-messages-list" class="recent-message-list">
        @forelse($messages as $message)
            <li id="message-{{ $message->id }}" class="recent-message-item">
                <div>
                    <strong>{{ $message->name }}</strong> - <span>{{ $message->created_at->diffForHumans() }}</span>
                    <p>{{ Str::limit($message->message, 50) }}</p>
                </div>
                <form action="{{ route('contacts.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete-msg"><i class="fas fa-trash"></i></button>
                </form>
            </li>
        @empty
            <li>Aucun message récent.</li>
        @endforelse
    </ul>
</div>

</div>

<!-- Modal pour afficher la photo en grand -->
<div id="photoModal" class="photo-modal">
    <span class="photo-modal-close" onclick="closePhotoModal()">&times;</span>
    <div class="photo-modal-content">
        <img id="modalPhoto" src="" alt="Photo du candidat">
    </div>
</div>

</div>
@endsection

<script>
// Fonctions pour la modal de photo
function openPhotoModal(photoSrc, candidatName) {
    const modal = document.getElementById('photoModal');
    const modalPhoto = document.getElementById('modalPhoto');
    
    modalPhoto.src = photoSrc;
    modalPhoto.alt = `Photo de ${candidatName}`;
    modal.style.display = 'block';
    
    // Empêcher le défilement de la page
    document.body.style.overflow = 'hidden';
}

function closePhotoModal() {
    const modal = document.getElementById('photoModal');
    modal.style.display = 'none';
    
    // Restaurer le défilement de la page
    document.body.style.overflow = 'auto';
}

// Fermer la modal en cliquant en dehors de l'image
document.getElementById('photoModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closePhotoModal();
    }
});

// Fermer la modal avec la touche Échap
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closePhotoModal();
    }
});
</script>

