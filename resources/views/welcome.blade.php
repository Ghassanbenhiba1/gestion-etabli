<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
    <title>Centre de Formation Professionnelle</title>
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #66ccff;
            --accent-color: #ff6b6b;
            --text-light: #ffffff;
            --text-dark: #333333;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Navbar Styles */
        .custom-navbar {
            background-color: var(--primary-color);
            color: var(--text-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 5%;
            flex-wrap: wrap;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1000;
        }

        .custom-navbar.scrolled {
            padding: 5px 5%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }

        .custom-navbar.scrolled .left-section img {
            height: 50px;
        }

        .left-section {
            display: flex;
            align-items: center;
            transition: transform var(--transition-speed) ease;
        }

        .left-section:hover {
            transform: scale(1.02);
        }

        .left-section img {
            height: 70px;
            margin-right: 20px;
            border-radius: 50%;
            border: 2px solid var(--secondary-color);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: all var(--transition-speed) ease;
        }

        .left-section img:hover {
            transform: rotate(5deg);
            box-shadow: 0 4px 12px rgba(102, 204, 255, 0.4);
        }

        .left-section .titles h5 {
            margin: 0;
            font-size: 0.9rem;
            line-height: 1.3;
            color: var(--text-light);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            transition: all var(--transition-speed) ease;
        }

        .left-section .titles h5:hover {
            color: var(--secondary-color);
            transform: translateX(5px);
        }

        .left-section .titles {
            display: flex;
            flex-direction: column;
        }

        .right-section ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .right-section ul li {
            position: relative;
            margin-left: 20px;
        }

        .right-section ul li a {
            color: var(--text-light);
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all var(--transition-speed) ease;
            display: flex;
            align-items: center;
        }

        .right-section ul li a i {
            margin-right: 8px;
            font-size: 0.9rem;
        }

        .right-section ul li a:hover {
            color: var(--secondary-color);
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .right-section ul li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: var(--secondary-color);
            transition: all var(--transition-speed) ease;
            transform: translateX(-50%);
        }

        .right-section ul li a:hover::after {
            width: 80%;
        }

        .right-section ul li.active a {
            color: var(--secondary-color);
            background-color: rgba(255, 255, 255, 0.15);
        }

        .right-section ul li.active a::after {
            width: 80%;
        }

        /* Mobile Menu Button */
        .menu-toggle {
            display: none;
            cursor: pointer;
            padding: 10px;
            z-index: 1001;
        }

        .menu-toggle i {
            font-size: 1.5rem;
            color: var(--text-light);
            transition: all var(--transition-speed) ease;
        }

        .menu-toggle:hover i {
            color: var(--secondary-color);
            transform: rotate(90deg);
        }

        /* Language switcher */
        .language-switcher {
            margin-left: 20px;
            position: relative;
        }

        .language-switcher button {
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .language-switcher button i {
            margin-left: 5px;
            transition: transform var(--transition-speed) ease;
        }

        .language-switcher button:hover {
            color: var(--secondary-color);
        }

        .language-switcher .dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: none;
            min-width: 120px;
            z-index: 1000;
        }

        .language-switcher.active .dropdown {
            display: block;
        }

        .language-switcher.active button i {
            transform: rotate(180deg);
        }

        .language-switcher .dropdown a {
            display: block;
            padding: 8px 15px;
            color: var(--text-dark);
            text-decoration: none;
            transition: all var(--transition-speed) ease;
        }

        .language-switcher .dropdown a:hover {
            background-color: #f0f0f0;
            color: var(--primary-color);
        }

        /* Dropdown for mobile */
        @media screen and (max-width: 992px) {
            .custom-navbar {
                padding: 10px 20px;
            }

            .menu-toggle {
                display: block;
            }

            .right-section {
                width: 100%;
                max-height: 0;
                overflow: hidden;
                transition: max-height var(--transition-speed) ease-out;
            }

            .right-section.active {
                max-height: 500px;
                padding: 15px 0;
            }

            .right-section ul {
                flex-direction: column;
                width: 100%;
            }

            .right-section ul li {
                margin: 8px 0;
                text-align: center;
            }

            .right-section ul li a {
                justify-content: center;
                padding: 10px;
            }
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 30px;
        }

        .btn-hero {
            background-color: var(--accent-color);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s;
            color: white;
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        /* Sections Common Styles */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--secondary-color);
        }

        .section-header p {
            color: #666;
            max-width: 700px;
            margin: 15px auto 0;
        }

        .events-section .section-header h2::after {
            background: var(--accent-color);
        }

        /* Cards Styles */
        .card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform var(--transition-speed);
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .formation-card .card-img-top {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(rgba(0, 51, 102, 0.7), rgba(0, 51, 102, 0.7));
        }

        .formation-card i {
            font-size: 60px;
            color: white;
        }

        .card-title {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .card-text {
            color: #666;
            margin-bottom: 20px;
        }

        .btn-card {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 600;
        }

        .btn-card:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-outline-primary-custom {
            border-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
            padding: 10px 30px;
        }

        .btn-outline-primary-custom:hover {
            background-color: var(--primary-color);
            color: white;
        }

        /* Events Section */
        .event-date {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--accent-color);
            color: white;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            width: 60px;
        }

        .event-date div:first-child {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .event-date div:last-child {
            font-size: 0.8rem;
        }

        .btn-event {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 600;
        }

        .btn-event:hover {
            background-color: #e05555;
            color: white;
        }

        /* News Section */
        .news-meta {
            font-size: 0.8rem;
            color: var(--accent-color);
            margin-bottom: 10px;
        }

        .news-meta span {
            margin-right: 15px;
        }

        .btn-news {
            color: var(--primary-color);
            font-weight: 600;
            padding: 0;
            text-decoration: none;
        }

        .btn-news:hover {
            color: var(--secondary-color);
            text-decoration: none;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(rgba(0, 51, 102, 0.9), rgba(0, 51, 102, 0.9)), url('https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            color: white;
            padding: 80px 0;
        }

        .counter {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .counter-label {
            font-size: 1.1rem;
        }

        /* Footer Styles */
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 40px 0 20px;
            margin-top: 50px;
        }

        footer h5 {
            color: var(--secondary-color);
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 10px;
            display: inline-block;
            margin-bottom: 20px;
        }

        footer a {
            color: white;
            text-decoration: none;
            transition: all var(--transition-speed);
        }

        footer a:hover {
            color: var(--secondary-color);
            text-decoration: none;
        }

        .social-icons a {
            font-size: 24px;
            margin-right: 15px;
            color: white;
        }

        .social-icons a:hover {
            color: var(--secondary-color);
            transform: translateY(-3px);
        }

        .footer-links li {
            margin-bottom: 8px;
        }

        .footer-links a i {
            margin-right: 5px;
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 20px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.2rem;
            }
            
            .hero-section p {
                font-size: 1rem;
            }
            
            .section-header h2 {
                font-size: 1.8rem;
            }
            
            .counter {
                font-size: 2rem;
            }
        }
        .auth-links {
    display: flex;
    align-items: center;
}

.auth-links .btn {
    font-weight: 600;
    padding: 8px 15px;
    border-radius: 5px;
    transition: all var(--transition-speed) ease;
}

.auth-links .btn-outline-light {
    color: var(--text-light);
    border: 1px solid var(--text-light);
}

.auth-links .btn-light {
    background-color: var(--secondary-color);
    color: white;
}

.auth-links .btn:hover {
    transform: translateY(-2px);
}

    </style>
</head>
<body>
<nav class="custom-navbar">
    <div class="left-section">
        <a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSd5Tzjquob9sVApo0jb5QwPgYIb0zUduSigg&s" alt="logo"></a>
        <div class="titles">
            <h5>المركز المختلط للتكوين المهني</h5>
            <h5>ⵜⴰⵙⵉⴼⵜ ⴰⵎⵎⴰⵙⴷ ⵏ ⵜⵙⵎⴷⵉⴷⵉⵏ ⵓⵙⴻⵏⴻⵔⵏ</h5>
            <h5>Centre Mixte de Formation Professionnelle</h5>
        </div>
    </div>

    <div class="menu-toggle">
        <i class="fas fa-bars"></i>
    </div>

    <div class="auth-links">
        <a href="{{route('auth.connexion')}}" class="btn btn-outline-light">Se connecter</a>
        <a href="{{route('auth.inscription')}}" class="btn btn-light ml-2">S'inscrire</a>
    </div>

    <div class="right-section">
        <ul>
            <li class="active"><a href="#"><i class="fas fa-home"></i>accueil</a></li>
            <li><a href="#"><i class="fas fa-building"></i>cmfp</a></li>
            <li><a href="#"><i class="fas fa-graduation-cap"></i>formations</a></li>
            <li><a href="#"><i class="fas fa-calendar-alt"></i>evenements</a></li>
            <li><a href="#"><i class="fas fa-newspaper"></i>actualités</a></li>
            <li><a href="#"><i class="fas fa-envelope"></i>contacter nous</a></li>
            <li class="language-switcher"></li>
        </ul>
    </div>
</nav>


    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Formez-vous pour les métiers de demain</h1>
            <p>Découvrez nos formations professionnelles qualifiantes dans divers domaines porteurs</p>
            <a href="#" class="btn btn-hero">S'inscrire maintenant</a>
        </div>
    </section>

    <!-- Filières de Formation -->
    <section class="formations-section">
        <div class="container">
            <div class="section-header">
                <h2>Nos Filières de Formation</h2>
                <p>Choisissez parmi nos différentes filières professionnelles adaptées au marché du travail</p>
            </div>
            
            <div class="row">
                <!-- Filière 1 -->
                <div class="col-md-4">
                    <div class="card formation-card">
                        <div class="card-img-top" style="background-image: url('https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Informatique et Multimédia</h5>
                            <p class="card-text">Formations en développement web, maintenance informatique, infographie et réseaux.</p>
                            <a href="#" class="btn btn-card">Découvrir <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Filière 2 -->
                <div class="col-md-4">
                    <div class="card formation-card">
                        <div class="card-img-top" style="background-image: url('https://images.unsplash.com/photo-1581093450021-4a7360e9a7e0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                            <i class="fas fa-industry"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Industrie et Maintenance</h5>
                            <p class="card-text">Électricité industrielle, mécanique auto, maintenance des équipements industriels.</p>
                            <a href="#" class="btn btn-card">Découvrir <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Filière 3 -->
                <div class="col-md-4">
                    <div class="card formation-card">
                        <div class="card-img-top" style="background-image: url('https://images.unsplash.com/photo-1556911220-bff31c812dba?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80')">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Hôtellerie et Restauration</h5>
                            <p class="card-text">Cuisine professionnelle, service en restauration, gestion hôtelière et pâtisserie.</p>
                            <a href="#" class="btn btn-card">Découvrir <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary-custom">Voir toutes les filières</a>
            </div>
        </div>
    </section>

    <!-- Événements à venir -->
    <section class="events-section">
        <div class="container">
            <div class="section-header">
                <h2>Événements à Venir</h2>
                <p>Découvrez nos prochains événements, journées portes ouvertes et séminaires</p>
            </div>
            
            <div class="row">
                <!-- Événement 1 -->
                <div class="col-md-4">
                    <div class="card event-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Événement">
                            <div class="event-date">
                                <div>15</div>
                                <div>JUIN</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Journée Portes Ouvertes</h5>
                            <p class="card-text text-muted"><i class="far fa-clock mr-2"></i> 09:00 - 17:00</p>
                            <p class="card-text">Découvrez nos installations, rencontrez nos formateurs et explorez nos différentes filières de formation.</p>
                            <a href="#" class="btn btn-event">Plus d'infos</a>
                        </div>
                    </div>
                </div>
                
                <!-- Événement 2 -->
                <div class="col-md-4">
                    <div class="card event-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Événement">
                            <div class="event-date">
                                <div>22</div>
                                <div>JUIN</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Forum de l'Emploi</h5>
                            <p class="card-text text-muted"><i class="far fa-clock mr-2"></i> 10:00 - 18:00</p>
                            <p class="card-text">Rencontrez des employeurs locaux et découvrez les opportunités d'emploi dans votre région.</p>
                            <a href="#" class="btn btn-event">Plus d'infos</a>
                        </div>
                    </div>
                </div>
                
                <!-- Événement 3 -->
                <div class="col-md-4">
                    <div class="card event-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Événement">
                            <div class="event-date">
                                <div>05</div>
                                <div>JUIL</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Atelier CV et Entretien</h5>
                            <p class="card-text text-muted"><i class="far fa-clock mr-2"></i> 14:00 - 17:00</p>
                            <p class="card-text">Apprenez à rédiger un CV efficace et à réussir vos entretiens d'embauche avec nos experts.</p>
                            <a href="#" class="btn btn-event">Plus d'infos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Actualités -->
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <h2>Dernières Actualités</h2>
                <p>Restez informé des dernières nouvelles et annonces du centre</p>
            </div>
            
            <div class="row">
                <!-- Actualité 1 -->
                <div class="col-md-4">
                    <div class="card news-card">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Actualité">
                        <div class="card-body">
                            <div class="news-meta">
                                <span><i class="far fa-calendar-alt mr-1"></i> 10 Juin 2023</span>
                                <span><i class="far fa-user mr-1"></i> Admin</span>
                            </div>
                            <h5 class="card-title">Nouvelle Filière en Développement Web</h5>
                            <p class="card-text">Le CMFP lance une nouvelle formation intensive en développement web full-stack pour répondre aux besoins du marché.</p>
                            <a href="#" class="btn-news">Lire la suite <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Actualité 2 -->
                <div class="col-md-4">
                    <div class="card news-card">
                        <img src="https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Actualité">
                        <div class="card-body">
                            <div class="news-meta">
                                <span><i class="far fa-calendar-alt mr-1"></i> 28 Mai 2023</span>
                                <span><i class="far fa-user mr-1"></i> Admin</span>
                            </div>
                            <h5 class="card-title">Partenariat avec des Entreprises Locales</h5>
                            <p class="card-text">Signature de conventions avec plusieurs entreprises pour faciliter l'insertion professionnelle des stagiaires.</p>
                            <a href="#" class="btn-news">Lire la suite <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Actualité 3 -->
                <div class="col-md-4">
                    <div class="card news-card">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Actualité">
                        <div class="card-body">
                            <div class="news-meta">
                                <span><i class="far fa-calendar-alt mr-1"></i> 15 Mai 2023</span>
                                <span><i class="far fa-user mr-1"></i> Admin</span>
                            </div>
                            <h5 class="card-title">Remise des Diplômes 2023</h5>
                            <p class="card-text">Cérémonie de remise des diplômes pour la promotion 2022-2023 en présence des autorités locales.</p>
                            <a href="#" class="btn-news">Lire la suite <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary-custom">Voir toutes les actualités</a>
            </div>
        </div>
    </section>

    <!-- Statistiques -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4">
                    <div class="counter">15+</div>
                    <div class="counter-label">Filières de Formation</div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="counter">500+</div>
                    <div class="counter-label">Stagiaires Formés</div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="counter">30+</div>
                    <div class="counter-label">Formateurs Experts</div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="counter">80%</div>
                    <div class="counter-label">Taux d'Insertion</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>À propos</h5>
                    <p>Le Centre Mixte de Formation Professionnelle offre des formations qualifiantes pour tous les niveaux dans divers domaines professionnels.</p>
                    <div class="mt-3">
                        <a href="#"><i class="fas fa-phone mr-2"></i> +212 5 00 00 00 00</a><br>
                        <a href="#"><i class="fas fa-envelope mr-2"></i> contact@cmfp-exemple.ma</a>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <h5>Liens rapides</h5>
                    <ul class="footer-links" style="list-style: none; padding-left: 0;">
                        <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Accueil</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Formations</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Inscription</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-md-4 mb-4">
                    <h5>Réseaux sociaux</h5>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                    <div class="mt-4">
                        <h6 style="color: var(--secondary-color);">Newsletter</h6>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Votre email" aria-label="Votre email">
                            <div class="input-group-append">
                                <button class="btn btn-outline-light" type="button"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center copyright">
                <p>&copy; 2023 Centre Mixte de Formation Professionnelle. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const rightSection = document.querySelector('.right-section');

        menuToggle.addEventListener('click', () => {
            rightSection.classList.toggle('active');
            menuToggle.querySelector('i').classList.toggle('fa-times');
            menuToggle.querySelector('i').classList.toggle('fa-bars');
        });

        // Language switcher
        const languageSwitcher = document.querySelector('.language-switcher');
        languageSwitcher.addEventListener('click', () => {
            languageSwitcher.classList.toggle('active');
        });

        // Close language dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.language-switcher')) {
                languageSwitcher.classList.remove('active');
            }
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.custom-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Active link highlighting
        const navLinks = document.querySelectorAll('.right-section ul li a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(l => l.parentElement.classList.remove('active'));
                this.parentElement.classList.add('active');
            });
        });
    </script>
</body>
</html>