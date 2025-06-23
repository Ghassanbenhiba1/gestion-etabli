@extends('layouts.dashboard')

@section('title', 'Détails de l\'étudiant')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/etudiants.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <div class="etudiants-container">
        <div class="etudiants-detail-card">
            <div class="etudiants-detail-header">
                <h2 class="etudiants-detail-title">
                    <i class="bi bi-person-badge me-2"></i>Détails de l'étudiant
                </h2>
                <div class="etudiants-detail-actions">
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="etudiants-btn etudiants-btn-secondary">
                        <i class="bi bi-pencil-fill me-1"></i> Modifier
                    </a>
                    <a href="{{ route('absences.create', $etudiant->id) }}" class="etudiants-btn etudiants-btn-warning">
                        <i class="bi bi-clock-history me-1"></i> Ajouter absence
                    </a>
                    <a href="{{ route('notes.create', $etudiant->id) }}" class="etudiants-btn etudiants-btn-success">
                        <i class="bi bi-journal-plus me-1"></i> Ajouter note
                    </a>
                </div>
            </div>

            <div class="etudiants-detail-body">
                <div class="etudiants-info-grid">
                    <div class="etudiants-info-group">
                        <h4 class="etudiants-info-label">Informations personnelles</h4>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Nom complet</span>
                            <span class="etudiants-info-value">{{ $etudiant->nom }} {{ $etudiant->prenom }}</span>
                        </div>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Identifiant</span>
                            <span class="etudiants-info-value">{{ $etudiant->identifiant }}</span>
                        </div>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Date de naissance</span>
                            <span class="etudiants-info-value">{{ $etudiant->date_naissance }}</span>
                        </div>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Classe</span>
                            <span class="etudiants-info-value">{{ $etudiant->classe->nom }}</span>
                        </div>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Filière</span>
                            <span class="etudiants-info-value">{{ $etudiant->filiere ? $etudiant->filiere->titre : 'Non assignée' }}</span>
                        </div>
                    </div>

                    <div class="etudiants-info-group">
                        <h4 class="etudiants-info-label">Coordonnées</h4>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Email</span>
                            <span class="etudiants-info-value">{{ $etudiant->email }}</span>
                        </div>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Téléphone</span>
                            <span class="etudiants-info-value">{{ $etudiant->telephone }}</span>
                        </div>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Adresse</span>
                            <span class="etudiants-info-value">{{ $etudiant->adresse }}</span>
                        </div>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Mot de passe</span>
                            <span class="etudiants-info-value">{{ $etudiant->password_plain }}</span>
                        </div>
                    </div>

                    <div class="etudiants-info-group">
                        <h4 class="etudiants-info-label">Informations du parent</h4>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Nom</span>
                            <span class="etudiants-info-value">{{ $etudiant->parentEtudiant->nom ?? 'N/A' }}</span>
                        </div>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Téléphone</span>
                            <span class="etudiants-info-value">{{ $etudiant->parentEtudiant->telephone ?? 'N/A' }}</span>
                        </div>
                        <div class="etudiants-info-item">
                            <span class="etudiants-info-key">Email</span>
                            <span class="etudiants-info-value">{{ $etudiant->parentEtudiant->email ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <div class="etudiants-detail-section">
                    <h4 class="etudiants-section-title">
                        <i class="bi bi-journal-check me-2"></i>Notes
                    </h4>
                    
                    @if($etudiant->notes->isEmpty())
                        <div class="etudiants-empty-state">
                            <i class="bi bi-journal-x"></i>
                            <p>Aucune note enregistrée</p>
                        </div>
                    @else
                        <div class="etudiants-table-container">
                            <table class="etudiants-table">
                                <thead>
                                    <tr>
                                        <th>Matière</th>
                                        <th>Note (/20)</th>
                                        <th>Coefficient</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($etudiant->notes as $note)
                                        <tr>
                                            <td>{{ $note->matiere->nom ?? 'N/A' }}</td>
                                            <td>{{ $note->note }}</td>
                                            <td>{{ $note->coefficient }}</td>
                                            <td>{{ $note->date }}</td>
                                            <td>{{ $note->description }}</td>
                                            <td>
                                                <div class="etudiants-action-btns">
                                                    <a href="{{ route('notes.edit', $note->id) }}" class="etudiants-btn etudiants-btn-sm etudiants-btn-primary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Supprimer cette note ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="etudiants-btn etudiants-btn-sm etudiants-btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <div class="etudiants-detail-section">
                    <h4 class="etudiants-section-title">
                        <i class="bi bi-clock-history me-2"></i>Absences
                    </h4>
                    
                    @if($etudiant->absences->isEmpty())
                        <div class="etudiants-empty-state">
                            <i class="bi bi-check-circle"></i>
                            <p>Aucune absence enregistrée</p>
                        </div>
                    @else
                        <div class="etudiants-table-container">
                            <table class="etudiants-table">
                                <thead>
                                    <tr>
                                        <th>Matière</th>
                                        <th>Date</th>
                                        <th>Durée (heures)</th>
                                        <th>Justifiée</th>
                                        <th>Motif</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($etudiant->absences as $absence)
                                        <tr>
                                            <td>{{ $absence->matiere->nom ?? 'N/A' }}</td>
                                            <td>{{ $absence->date }}</td>
                                            <td>{{ $absence->duree }}</td>
                                            <td>
                                                <span class="etudiants-badge {{ $absence->justifiee ? 'etudiants-badge-success' : 'etudiants-badge-danger' }}">
                                                    {{ $absence->justifiee ? 'Oui' : 'Non' }}
                                                </span>
                                            </td>
                                            <td>{{ $absence->motif }}</td>
                                            <td>
                                                <div class="etudiants-action-btns">
                                                    <a href="{{ route('absences.edit', $absence->id) }}" class="etudiants-btn etudiants-btn-sm etudiants-btn-primary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('absences.destroy', $absence->id) }}" method="POST" onsubmit="return confirm('Supprimer cette absence ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="etudiants-btn etudiants-btn-sm etudiants-btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete(form) {
            return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');
        }
    </script>
@endsection