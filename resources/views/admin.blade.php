<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Administrateur - CMFP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #66ccff;
            --accent-color: #ff6b6b;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        .admin-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .admin-nav {
            background-color: var(--dark-color);
            color: white;
            min-height: 100vh;
            padding: 20px 0;
        }

        .admin-nav .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            margin: 5px 0;
            border-radius: 4px;
            transition: all 0.3s;
        }

        .admin-nav .nav-link:hover, 
        .admin-nav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .admin-nav .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .admin-main {
            padding: 30px;
        }

        .admin-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px 10px 0 0 !important;
        }

        .btn-admin {
            background-color: var(--accent-color);
            border: none;
            padding: 8px 20px;
            font-weight: 500;
        }

        .btn-admin:hover {
            background-color: #e05555;
        }

        .btn-outline-admin {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-admin:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }

        .table th {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .action-btn {
            padding: 5px 10px;
            font-size: 0.9rem;
            margin: 0 3px;
        }

        .badge-admin {
            background-color: var(--secondary-color);
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h4><i class="fas fa-user-shield mr-2"></i>Espace Administrateur</h4>
                <div>
                    <span class="mr-3">Bienvenue, Admin</span>
                    <a href="#" class="btn btn-sm btn-light"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block admin-nav">
                <div class="text-center mb-4">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSd5Tzjquob9sVApo0jb5QwPgYIb0zUduSigg&s" 
                         alt="Logo CMFP" 
                         class="img-fluid rounded-circle" 
                         style="width: 80px; border: 3px solid var(--secondary-color);">
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-target="dashboard">
                            <i class="fas fa-tachometer-alt"></i> Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="filiere-form">
                            <i class="fas fa-graduation-cap"></i> Gérer les filières
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="event-form">
                            <i class="fas fa-calendar-alt"></i> Gérer les événements
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="news-form">
                            <i class="fas fa-newspaper"></i> Gérer les actualités
                        </a>
                    </li>
                </ul>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 admin-main">
                <!-- Tableau de bord -->
                <div id="dashboard" class="form-section active">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card admin-card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Filières</h5>
                                    <h2 class="mb-0">15</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card admin-card text-white bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Événements</h5>
                                    <h2 class="mb-0">8</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card admin-card text-white bg-info">
                                <div class="card-body">
                                    <h5 class="card-title">Actualités</h5>
                                    <h2 class="mb-0">12</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card admin-card">
                        <div class="card-header">
                            <h5 class="mb-0">Dernières activités</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-plus-circle text-success mr-2"></i> Nouvelle filière "Développement Web" ajoutée</span>
                                    <small class="text-muted">Il y a 2 heures</small>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-edit text-primary mr-2"></i> Événement "Journée Portes Ouvertes" modifié</span>
                                    <small class="text-muted">Aujourd'hui, 10:30</small>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-trash-alt text-danger mr-2"></i> Actualité "Remise des diplômes" supprimée</span>
                                    <small class="text-muted">Hier, 16:45</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Formulaire Filière -->
                <div id="filiere-form" class="form-section">
                    <div class="card admin-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-graduation-cap mr-2"></i>Ajouter/Modifier une filière</h5>
                            <button class="btn btn-sm btn-light" id="show-filiere-list">
                                <i class="fas fa-list mr-1"></i> Voir la liste
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="formFiliere">
                                <div class="form-group">
                                    <label for="filiereTitre">Titre de la filière</label>
                                    <input type="text" class="form-control" id="filiereTitre" required>
                                </div>
                                <div class="form-group">
                                    <label for="filiereDescription">Description courte</label>
                                    <textarea class="form-control" id="filiereDescription" rows="2" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="filiereInfo">Informations détaillées</label>
                                    <textarea class="form-control" id="filiereInfo" rows="4" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="filiereNiveau">Niveau requis</label>
                                    <select class="form-control" id="filiereNiveau" required>
                                        <option value="">Sélectionner un niveau</option>
                                        <option value="Certificat du bac">Certificat du bac</option>
                                        <option value="niveau bac">niveau bac</option>
                                        <option value="3ème année collège">3ème année collège</option>
                                        <option value="Certificat du primaire">Certificat du primaire</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="filiereImage">Image illustrative</label>
                                    <input type="file" class="form-control-file" id="filiereImage">
                                </div>
                                <button type="submit" class="btn btn-admin">
                                    <i class="fas fa-save mr-1"></i> Enregistrer
                                </button>
                                <button type="button" class="btn btn-outline-secondary ml-2">
                                    <i class="fas fa-times mr-1"></i> Annuler
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des filières -->
                    <div class="card admin-card mt-4 d-none" id="filiere-list">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-list mr-2"></i>Liste des filières</h5>
                            <button class="btn btn-sm btn-light" id="hide-filiere-list">
                                <i class="fas fa-arrow-left mr-1"></i> Retour
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Niveau</th>
                                            <th>Date création</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Informatique et Multimédia</td>
                                            <td><span class="badge badge-admin">Intermédiaire</span></td>
                                            <td>15/03/2023</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary action-btn">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Industrie et Maintenance</td>
                                            <td><span class="badge badge-admin">Avancé</span></td>
                                            <td>22/02/2023</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary action-btn">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hôtellerie et Restauration</td>
                                            <td><span class="badge badge-admin">Tous niveaux</span></td>
                                            <td>10/01/2023</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary action-btn">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire Événement -->
                <div id="event-form" class="form-section">
                    <div class="card admin-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-calendar-alt mr-2"></i>Ajouter/Modifier un événement</h5>
                            <button class="btn btn-sm btn-light" id="show-event-list">
                                <i class="fas fa-list mr-1"></i> Voir la liste
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="formEvent">
                                <div class="form-group">
                                    <label for="eventTitre">Titre de l'événement</label>
                                    <input type="text" class="form-control" id="eventTitre" required>
                                </div>
                                <div class="form-group">
                                    <label for="eventDescription">Description</label>
                                    <textarea class="form-control" id="eventDescription" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="eventInfo">Informations pratiques</label>
                                    <textarea class="form-control" id="eventInfo" rows="3" required></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="eventDate">Date</label>
                                        <input type="date" class="form-control" id="eventDate" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="eventHeureDebut">Heure début</label>
                                        <input type="time" class="form-control" id="eventHeureDebut" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="eventHeureFin">Heure fin</label>
                                        <input type="time" class="form-control" id="eventHeureFin" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eventImage">Image illustrative</label>
                                    <input type="file" class="form-control-file" id="eventImage">
                                </div>
                                <button type="submit" class="btn btn-admin">
                                    <i class="fas fa-save mr-1"></i> Enregistrer
                                </button>
                                <button type="button" class="btn btn-outline-secondary ml-2">
                                    <i class="fas fa-times mr-1"></i> Annuler
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des événements -->
                    <div class="card admin-card mt-4 d-none" id="event-list">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-list mr-2"></i>Liste des événements</h5>
                            <button class="btn btn-sm btn-light" id="hide-event-list">
                                <i class="fas fa-arrow-left mr-1"></i> Retour
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Journée Portes Ouvertes</td>
                                            <td>15/06/2023</td>
                                            <td>09:00 - 17:00</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary action-btn">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Forum de l'Emploi</td>
                                            <td>22/06/2023</td>
                                            <td>10:00 - 18:00</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary action-btn">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Atelier CV et Entretien</td>
                                            <td>05/07/2023</td>
                                            <td>14:00 - 17:00</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary action-btn">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire Actualité -->
                <div id="news-form" class="form-section">
                    <div class="card admin-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-newspaper mr-2"></i>Ajouter/Modifier une actualité</h5>
                            <button class="btn btn-sm btn-light" id="show-news-list">
                                <i class="fas fa-list mr-1"></i> Voir la liste
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="formNews">
                                <div class="form-group">
                                    <label for="newsTitre">Titre de l'actualité</label>
                                    <input type="text" class="form-control" id="newsTitre" required>
                                </div>
                                <div class="form-group">
                                    <label for="newsDescription">Description courte</label>
                                    <textarea class="form-control" id="newsDescription" rows="2" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="newsContenu">Contenu détaillé</label>
                                    <textarea class="form-control" id="newsContenu" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="newsDate">Date de publication</label>
                                    <input type="date" class="form-control" id="newsDate" required>
                                </div>
                                <div class="form-group">
                                    <label for="newsImage">Image illustrative</label>
                                    <input type="file" class="form-control-file" id="newsImage">
                                </div>
                                <button type="submit" class="btn btn-admin">
                                    <i class="fas fa-save mr-1"></i> Enregistrer
                                </button>
                                <button type="button" class="btn btn-outline-secondary ml-2">
                                    <i class="fas fa-times mr-1"></i> Annuler
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des actualités -->
                    <div class="card admin-card mt-4 d-none" id="news-list">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-list mr-2"></i>Liste des actualités</h5>
                            <button class="btn btn-sm btn-light" id="hide-news-list">
                                <i class="fas fa-arrow-left mr-1"></i> Retour
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Date publication</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nouvelle Filière en Développement Web</td>
                                            <td>10/06/2023</td>
                                            <td><span class="badge badge-success">Publié</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary action-btn">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Partenariat avec des Entreprises Locales</td>
                                            <td>28/05/2023</td>
                                            <td><span class="badge badge-success">Publié</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary action-btn">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Remise des Diplômes 2023</td>
                                            <td>15/05/2023</td>
                                            <td><span class="badge badge-secondary">Archivé</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary action-btn">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger action-btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        // Navigation entre les sections
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Retirer la classe active de tous les liens
                document.querySelectorAll('.nav-link').forEach(el => {
                    el.classList.remove('active');
                });
                
                // Ajouter la classe active au lien cliqué
                this.classList.add('active');
                
                // Masquer toutes les sections
                document.querySelectorAll('.form-section').forEach(section => {
                    section.classList.remove('active');
                });
                
                // Afficher la section correspondante
                const target = this.getAttribute('data-target');
                document.getElementById(target).classList.add('active');
            });
        });

        // Gestion des listes (affichage/masquage)
        // Pour les filières
        document.getElementById('show-filiere-list').addEventListener('click', function() {
            document.getElementById('formFiliere').parentElement.classList.add('d-none');
            document.getElementById('filiere-list').classList.remove('d-none');
        });

        document.getElementById('hide-filiere-list').addEventListener('click', function() {
            document.getElementById('formFiliere').parentElement.classList.remove('d-none');
            document.getElementById('filiere-list').classList.add('d-none');
        });

        // Pour les événements
        document.getElementById('show-event-list').addEventListener('click', function() {
            document.getElementById('formEvent').parentElement.classList.add('d-none');
            document.getElementById('event-list').classList.remove('d-none');
        });

        document.getElementById('hide-event-list').addEventListener('click', function() {
            document.getElementById('formEvent').parentElement.classList.remove('d-none');
            document.getElementById('event-list').classList.add('d-none');
        });

        // Pour les actualités
        document.getElementById('show-news-list').addEventListener('click', function() {
            document.getElementById('formNews').parentElement.classList.add('d-none');
            document.getElementById('news-list').classList.remove('d-none');
        });

        document.getElementById('hide-news-list').addEventListener('click', function() {
            document.getElementById('formNews').parentElement.classList.remove('d-none');
            document.getElementById('news-list').classList.add('d-none');
        });

        // Gestion des formulaires
        document.getElementById('formFiliere').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Filière enregistrée avec succès!');
            // Ici vous ajouteriez le code pour envoyer les données au serveur
        });

        document.getElementById('formEvent').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Événement enregistré avec succès!');
            // Ici vous ajouteriez le code pour envoyer les données au serveur
        });

        document.getElementById('formNews').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Actualité enregistrée avec succès!');
            // Ici vous ajouteriez le code pour envoyer les données au serveur
        });
    </script>
</body>
</html>