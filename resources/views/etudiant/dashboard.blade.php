<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Étudiant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #ebefff;
            --secondary-color: #3a0ca3;
            --accent-color: #f72585;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #ef233c;
            --dark-color: #2b2d42;
            --light-bg: #f8f9fa;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --card-hover-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            color: #4a5568;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2.5rem 0;
            margin-bottom: 2.5rem;
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
        }
        
        .dashboard-header::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 150px;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.05)" d="M0,0 L100,0 L100,100 Q50,50 0,100 Z"></path></svg>');
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .welcome-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 2rem;
            margin-bottom: 2rem;
            border: none;
            transition: all 0.3s ease;
        }
        
        .welcome-card:hover {
            box-shadow: var(--card-hover-shadow);
        }
        
        .info-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 2rem;
            margin-bottom: 2rem;
            border: none;
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }
        
        .card-title {
            color: var(--dark-color);
            font-weight: 600;
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .card-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
        }
        
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .table {
            margin-bottom: 0;
            font-size: 0.9rem;
        }
        
        .table thead {
            background-color: var(--primary-color);
            color: white;
        }
        
        .table th {
            font-weight: 500;
            padding: 1rem;
        }
        
        .table td {
            padding: 1rem;
            vertical-align: middle;
        }
        
        .table-hover tbody tr:hover {
            background-color: var(--primary-light);
        }
        
        .list-group-item {
            border-left: 4px solid var(--primary-color);
            margin-bottom: 0.5rem;
            border-radius: 8px;
            padding: 1rem 1.5rem;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease;
        }
        
        .list-group-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }
        
        .btn-logout {
            background-color: var(--danger-color);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(239, 35, 60, 0.2);
        }
        
        .btn-logout:hover {
            background-color: #d90429;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(239, 35, 60, 0.3);
        }
        
        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
            font-size: 0.85em;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #6c757d;
            background-color: #f8fafc;
            border-radius: 10px;
            margin: 1rem 0;
        }
        
        .empty-state i {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            color: #e2e8f0;
            background: linear-gradient(135deg, #edf2f7, #e2e8f0);
            width: 80px;
            height: 80px;
            line-height: 80px;
            border-radius: 50%;
            display: inline-block;
        }
        
        .empty-state h5 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #4a5568;
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        .course-card {
            border: none;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
        }
        
        .course-card .card-footer {
            background-color: transparent;
            border-top: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        
        .note-badge {
            min-width: 70px;
            display: inline-block;
            text-align: center;
        }
        
        .progress-thin {
            height: 6px;
            border-radius: 3px;
        }
        
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-weight: 600;
            margin-right: 10px;
            overflow: hidden;
        }
        
        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        
        @media (max-width: 768px) {
            .dashboard-header {
                padding: 1.5rem 0;
            }
            
            .card-title {
                font-size: 1.25rem;
            }
            
            .info-card, .welcome-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-2"><i class="bi bi-person-circle me-2"></i> Tableau de Bord <span class="text-gradient">Étudiant</span></h1>
                    <p class="lead mb-0 text-white-80">Accédez à toutes vos informations académiques en un seul endroit</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <!-- Déconnexion sécurisée -->
                     <form method="POST" action="{{ route('etudiantlogout') }}">
    @csrf
<button type="submit" class="btn-logout">
    <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i> Se déconnecter
</button>
                     </form>




                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <!-- Section Bienvenue -->
        <div class="welcome-card">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-3">Bonjour, <span class="text-primary">{{ $etudiant->prenom }} {{ $etudiant->nom }}</span></h3>
                    <p class="text-muted mb-4">Voici un résumé de vos activités et performances académiques.</p>
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            @if($etudiant->photo)
                                <img src="{{ asset('storage/' . $etudiant->photo) }}" alt="Photo de {{ $etudiant->prenom }} {{ $etudiant->nom }}" class="avatar-img">
                            @else
                                {{ substr($etudiant->prenom, 0, 1) }}{{ substr($etudiant->nom, 0, 1) }}
                            @endif
                        </div>
                        <div>
                            <h6 class="mb-0">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h6>
                            <small class="text-muted">{{ $etudiant->email }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-person-badge me-2 text-primary"></i> Identifiant</span>
                            <span class="badge bg-primary rounded-pill">{{ $etudiant->identifiant }}</span>
                        </li>
                        @if($etudiant->classe)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-people me-2 text-primary"></i> Classe</span>
                            <span class="badge bg-secondary rounded-pill">{{ $etudiant->classe->nom }}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-journal-check me-2 text-primary"></i> Notes enregistrées</span>
                            <span class="badge bg-success rounded-pill">{{ $etudiant->notes->count() }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Colonne de gauche - Informations Personnelles -->
            <div class="col-lg-4">
                <!-- Informations Complètes Étudiant -->
                <div class="info-card">
                    <h4 class="card-title"><i class="bi bi-person-vcard me-2"></i> Informations Personnelles</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <strong>Email :</strong>
                                <span>{{ $etudiant->email }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <strong>Téléphone :</strong>
                                <span>{{ $etudiant->telephone ?? 'Non renseigné' }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <strong>Date de Naissance :</strong>
                                <span>{{ $etudiant->date_naissance ?? 'Non renseignée' }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <strong>Adresse :</strong>
                                <span>{{ $etudiant->adresse ?? 'Non renseignée' }}</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Formulaire de mise à jour de la photo de profil -->
                <div class="info-card">
                    <h4 class="card-title"><i class="bi bi-camera me-2"></i> Photo de Profil</h4>
                    <form action="{{ route('etudiant.update-photo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="photo" class="form-label">Choisir une nouvelle photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                            <div class="form-text">Formats acceptés : JPEG, PNG, JPG, GIF (max 2MB)</div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload me-2"></i>Mettre à jour la photo
                        </button>
                    </form>
                </div>

                <!-- Informations Parents -->
                @if($etudiant->parentEtudiant)
                <div class="info-card">
                    <h4 class="card-title"><i class="bi bi-people-fill me-2"></i> Responsable Légal</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <strong>Nom :</strong>
                                <span>{{ $etudiant->parentEtudiant->nom }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <strong>Téléphone :</strong>
                                <span>{{ $etudiant->parentEtudiant->telephone }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <strong>Email :</strong>
                                <span>{{ $etudiant->parentEtudiant->email }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                @else
                <div class="empty-state">
                    <i class="bi bi-person-x"></i>
                    <h5>Aucun responsable enregistré</h5>
                    <p class="text-muted">Les informations du responsable légal ne sont pas disponibles.</p>
                </div>
                @endif
            </div>

            <!-- Colonne de droite - Contenu principal -->
            <div class="col-lg-8">
                <!-- Section Notes -->
                <div class="info-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0"><i class="bi bi-graph-up me-2"></i> Performances Académiques</h4>
                        <span class="badge bg-primary">Moyenne: {{ $etudiant->notes->avg('note') ?? 'N/A' }}/20</span>
                    </div>
                    
                    @if($etudiant->notes->count())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Matière</th>
                                    <th>Note</th>
                                    <th>Appréciation</th>
                                    <th class="text-end">Progression</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($etudiant->notes as $note)
                                <tr>
                                    <td>
                                        <strong>{{ $note->matiere->nom }}</strong>
                                        <div class="text-muted small">Coeff. {{ $note->coefficient ?? 1 }}</div>
                                    </td>
                                    <td>
                                        <span class="badge note-badge rounded-pill 
                                            {{ $note->note >= 16 ? 'bg-success' : '' }}
                                            {{ $note->note >= 14 && $note->note < 16 ? 'bg-primary' : '' }}
                                            {{ $note->note >= 12 && $note->note < 14 ? 'bg-info' : '' }}
                                            {{ $note->note >= 10 && $note->note < 12 ? 'bg-warning text-dark' : '' }}
                                            {{ $note->note < 10 ? 'bg-danger' : '' }}">
                                            {{ $note->note }}/20
                                        </span>
                                    </td>
                                    <td>
                                        @if($note->note >= 16)
                                            <span class="text-success fw-medium">Excellent</span>
                                        @elseif($note->note >= 14)
                                            <span class="text-primary fw-medium">Très bien</span>
                                        @elseif($note->note >= 12)
                                            <span class="text-info fw-medium">Bien</span>
                                        @elseif($note->note >= 10)
                                            <span class="text-warning fw-medium">Satisfaisant</span>
                                        @else
                                            <span class="text-danger fw-medium">Insuffisant</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="progress progress-thin">
                                            <div class="progress-bar 
                                                {{ $note->note >= 10 ? 'bg-success' : 'bg-danger' }}" 
                                                role="progressbar" 
                                                style="width: {{ ($note->note / 20) * 100 }}%" 
                                                aria-valuenow="{{ $note->note }}" 
                                                aria-valuemin="0" 
                                                aria-valuemax="20">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="empty-state">
                        <i class="bi bi-journal-x"></i>
                        <h5>Aucune note disponible</h5>
                        <p class="text-muted">Vos notes apparaîtront ici une fois publiées par vos enseignants.</p>
                    </div>
                    @endif
                </div>

                <!-- Section Absences -->
                <div class="info-card">
                    <h4 class="card-title"><i class="bi bi-calendar-event me-2"></i> Historique des Absences</h4>
                    @if($etudiant->absences->count())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Matière</th>
                                    <th>Durée</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($etudiant->absences as $absence)
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($absence->date)) }}</td>
                                    <td>{{ $absence->matiere->nom ?? 'Générale' }}</td>
                                    <td>{{ $absence->duree }} heure(s)</td>
                                    <td>
                                        @if($absence->justifiee)
                                            <span class="badge bg-success">Justifiée</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Non justifiée</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="empty-state">
                        <i class="bi bi-calendar-check"></i>
                        <h5>Aucune absence enregistrée</h5>
                        <p class="text-muted">Vous n'avez aucune absence à votre actif.</p>
                    </div>
                    @endif
                </div>

                <!-- Section Cours -->
                <div class="info-card">
                    <h4 class="card-title"><i class="bi bi-journal-bookmark me-2"></i> Ressources Pédagogiques</h4>
                    @if($etudiant->filiere && $etudiant->filiere->cours->count())
                    <div class="row g-3">
                        @foreach($etudiant->filiere->cours as $cours)
                        <div class="col-md-6">
                            <div class="card course-card h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title mb-0">{{ $cours->titre }}</h5>
                                        <span class="badge bg-light text-dark">{{ $cours->filiere->titre ?? '' }}</span>
                                    </div>
                                    <h6 class="card-subtitle mb-3 text-muted small">{{ $cours->annee }}</h6>
                                    <p class="card-text text-muted small">{{ Str::limit($cours->description ?? 'Aucune description disponible', 100) }}</p>
                                </div>
                                <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Publié le {{ date('d/m/Y', strtotime($cours->created_at)) }}</small>
                                    <a href="{{ asset('storage/' . $cours->pdf_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                        <i class="bi bi-download me-1"></i> PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="empty-state">
                        <i class="bi bi-journal"></i>
                        <h5>Aucune ressource disponible</h5>
                        <p class="text-muted">Les ressources de votre filière seront affichées ici une fois publiées.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-white mb-3"><i class="bi bi-building me-2"></i> Établissement Scolaire</h5>
                    <p class="text-white-50 small">Plateforme de suivi académique des étudiants.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-white-50 mb-0 small">© {{ date('Y') }} Tous droits réservés</p>
                    <p class="text-white-50 small">Version 1.0.0</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.info-card, .welcome-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Prévisualisation de l'image
            const photoInput = document.getElementById('photo');
            if (photoInput) {
                photoInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        // Vérification de la taille du fichier (2MB max)
                        if (file.size > 2 * 1024 * 1024) {
                            alert('Le fichier est trop volumineux. Taille maximum : 2MB');
                            this.value = '';
                            return;
                        }

                        // Vérification du type de fichier
                        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                        if (!allowedTypes.includes(file.type)) {
                            alert('Type de fichier non autorisé. Formats acceptés : JPEG, PNG, JPG, GIF');
                            this.value = '';
                            return;
                        }

                        // Prévisualisation
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            // Créer une prévisualisation temporaire
                            const preview = document.createElement('div');
                            preview.className = 'mt-2 p-2 border rounded';
                            preview.innerHTML = `
                                <small class="text-muted">Aperçu :</small><br>
                                <img src="${e.target.result}" alt="Aperçu" style="max-width: 100px; max-height: 100px; border-radius: 50%; object-fit: cover;">
                            `;
                            
                            // Supprimer l'ancienne prévisualisation si elle existe
                            const oldPreview = photoInput.parentNode.querySelector('.mt-2');
                            if (oldPreview) {
                                oldPreview.remove();
                            }
                            
                            photoInput.parentNode.appendChild(preview);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
</body>
</html>