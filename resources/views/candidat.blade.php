@extends('layouts.dashboard')
@section('content')
<link rel="stylesheet" href="{{ asset('css/candidat-photos.css') }}">
<style>
    /* Conteneur principal */
    #candidatsSection {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 16px;
        margin-bottom: 30px;
    }
    
    /* Titre de section */
    #sectionTitle {
        color: #2c3e50;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 10px;
    }
    
    #sectionTitle::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background-color: #3498db;
        border-radius: 2px;
    }
    
    /* Grille des candidats */
    #candidatsGrid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    
    /* Carte de candidat */
    #candidatCard {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }
    
    #candidatCard:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
    }
    
    /* En-tête de carte */
    #candidatHeader {
        padding: 20px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    /* Photo du candidat */
    #candidatPhoto {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #3498db;
        margin-right: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    
    #candidatPhoto:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
    }
    
    /* Conteneur nom et photo */
    #candidatInfo {
        display: flex;
        align-items: center;
        flex: 1;
    }
    
    /* Nom du candidat */
    #candidatName {
        color: #2c3e50;
        font-size: 18px;
        font-weight: 600;
        margin: 0;
    }
    
    /* Statut badge */
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .status-en_attente {
        background-color: #f39c12;
        color: white;
    }
    
    .status-approuvé {
        background-color: #27ae60;
        color: white;
    }
    
    .status-refusé {
        background-color: #e74c3c;
        color: white;
    }
    
    /* Corps de la carte */
    #candidatBody {
        padding: 20px;
    }
    
    /* Détails du candidat */
    #candidatDetails {
        color: #7f8c8d;
        font-size: 14px;
        line-height: 1.6;
    }
    
    #candidatDetails strong {
        color: #34495e;
    }
    
    /* Lien CV */
    #cvLink {
        color: #3498db;
        text-decoration: none;
        transition: color 0.2s;
    }
    
    #cvLink:hover {
        color: #2980b9;
        text-decoration: underline;
    }
    
    /* Pied de carte */
    #candidatFooter {
        padding: 15px 20px;
        background-color: #f8f9fa;
        display: flex;
        justify-content: space-between;
    }
    
    /* Boutons d'action */
    #approveBtn, #declineBtn {
        padding: 8px 15px;
        font-size: 13px;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        border: none;
        cursor: pointer;
    }
    
    #approveBtn {
        background-color: #2ecc71;
        border-color: #2ecc71;
        color: white;
    }
    
    #approveBtn:hover:not(:disabled) {
        background-color: #27ae60;
        transform: translateY(-2px);
    }
    
    #declineBtn {
        background-color: #e74c3c;
        border-color: #e74c3c;
        color: white;
    }
    
    #declineBtn:hover:not(:disabled) {
        background-color: #c0392b;
        transform: translateY(-2px);
    }
    
    /* Icônes */
    #actionIcon {
        font-size: 12px;
    }
    
    /* Message quand pas de candidats */
    #noCandidates {
        text-align: center;
        color: #7f8c8d;
        padding: 40px;
        font-size: 16px;
    }
    
    #approveBtn[disabled], #declineBtn[disabled] {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none !important;
    }
    
    /* Message de statut */
    .status-message {
        text-align: center;
        padding: 10px;
        font-weight: 600;
        font-size: 14px;
    }
    
    .status-message.approuvé {
        color: #27ae60;
    }
    
    .status-message.refusé {
        color: #e74c3c;
    }
    
    /* Modal pour la photo */
    .photo-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(5px);
    }
    
    .photo-modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 90%;
        max-height: 90%;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    
    .photo-modal img {
        width: 100%;
        height: auto;
        display: block;
    }
    
    .photo-modal-close {
        position: absolute;
        top: 15px;
        right: 25px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        z-index: 1001;
        transition: color 0.3s ease;
    }
    
    .photo-modal-close:hover {
        color: #bbb;
    }
</style>

<div id="candidatsSection">
    <h2 id="sectionTitle">Gestion des candidatures</h2>
    
    @if($candidats->count() > 0)
        <div id="candidatsGrid">
            @foreach ($candidats as $candidat)
                <div id="candidatCard">
                    <div id="candidatHeader">
                        <div id="candidatInfo">
                            <img class="candidate-card-photo" src="{{ $candidat->photo ? asset('storage/'.$candidat->photo) : asset('images/default-profile.png') }}" alt="Photo du candidat" onclick="openPhotoModal(this.src, '{{ $candidat->nom }} {{ $candidat->prenom }}')">
                            <h3 id="candidatName">{{ $candidat->nom }} {{ $candidat->prenom }}</h3>
                        </div>
                        <span class="status-badge status-{{ $candidat->statut ?? 'en_attente' }}">
                            {{ ucfirst($candidat->statut ?? 'en_attente') }}
                        </span>
                    </div>
                    
                    <div id="candidatBody">
                        <div id="candidatDetails">
                            <strong>Email:</strong> {{ $candidat->email }}<br>
                            <strong>Filière:</strong> {{ $candidat->filiere ? $candidat->filiere->titre : 'Non spécifiée' }}<br>
                            <strong>CV:</strong> 
                            @if($candidat->document)
                                <a id="cvLink" href="{{ asset('storage/'.$candidat->document) }}" target="_blank">Voir le CV</a>
                            @else
                                Non fourni
                            @endif
                        </div>
                    </div>
                    
                    <div id="candidatFooter">
                        @if(($candidat->statut ?? 'en_attente') === 'en_attente')
                            <form action="{{ route('candidats.approuver', $candidat->id) }}" method="POST">
                                @csrf
                                <button type="submit" id="approveBtn">
                                    <i id="actionIcon" class="fas fa-check"></i> Approuver
                                </button>
                            </form>
                            
                            <form action="{{ route('candidats.decliner', $candidat->id) }}" method="POST">
                                @csrf
                                <button type="submit" id="declineBtn">
                                    <i id="actionIcon" class="fas fa-times"></i> Décliner
                                </button>
                            </form>
                        @else
                            <div class="status-message {{ $candidat->statut }}">
                                @if($candidat->statut === 'approuvé')
                                    <i class="fas fa-check-circle"></i> Candidature approuvée
                                @elseif($candidat->statut === 'refusé')
                                    <i class="fas fa-times-circle"></i> Candidature refusée
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div id="noCandidates">
            <p>Aucun candidat à afficher pour le moment.</p>
        </div>
    @endif
</div>

<!-- Modal pour afficher la photo en grand -->
<div id="photoModal" class="photo-modal">
    <span class="photo-modal-close" onclick="closePhotoModal()">&times;</span>
    <div class="photo-modal-content">
        <img id="modalPhoto" src="" alt="Photo du candidat">
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success" style="margin: 20px; padding: 15px; background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; color: #155724;">
        {{ session('success') }}
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const handleAction = (form, actionType) => {
        const confirmMessage = actionType === 'approve'
            ? "Êtes-vous sûr de vouloir approuver ce candidat ?"
            : "Êtes-vous sûr de vouloir décliner ce candidat ?";

        if (!confirm(confirmMessage)) {
            return;
        }

        const card = form.closest('#candidatCard');
        const approveBtn = card.querySelector('#approveBtn');
        const declineBtn = card.querySelector('#declineBtn');

        // Désactiver les deux boutons
        if (approveBtn) approveBtn.disabled = true;
        if (declineBtn) declineBtn.disabled = true;

        // Changer le texte et l'icône du bouton cliqué
        if (actionType === 'approve' && approveBtn) {
            approveBtn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Approbation...`;
        } else if (actionType === 'decline' && declineBtn) {
            declineBtn.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Rejet...`;
        }

        // Soumettre le formulaire après un petit délai (UX)
        setTimeout(() => form.submit(), 300);
    };

    document.querySelectorAll('form[action*="approuver"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            handleAction(this, 'approve');
        });
    });

    document.querySelectorAll('form[action*="decliner"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            handleAction(this, 'decline');
        });
    });
});

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

@endsection