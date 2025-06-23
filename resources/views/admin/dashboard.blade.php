<!-- resources/views/layouts/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin | ESIC')</title>

    <!-- Liens CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
                <i class="fas fa-university"></i>
                <span>ESIC Admin</span>
            </a>
        </div>

        <div class="sidebar-menu">
            <div class="menu-title">Menu Principal</div>
            <a href="{{ route('admin.dashboard') }}" class="menu-item active">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>

            <div class="menu-title">Gestion</div>
            <a href="{{ route('filieres.index') }}" class="menu-item">
                <i class="fas fa-graduation-cap"></i>
                <span>Filières</span>
            </a>
            <a href="{{ route('evenements.index') }}" class="menu-item">
                <i class="fas fa-calendar-alt"></i>
                <span>Événements</span>
            </a>
            <a href="{{ route('actualites.index') }}" class="menu-item">
                <i class="fas fa-newspaper"></i>
                <span>Actualités</span>
            </a>
            <a href="{{ route('cours.index') }}" class="menu-item">
                <i class="fas fa-book"></i>
                <span>Cours</span>
            </a>

            <div class="menu-title">Administration</div>
            <a href="#" class="menu-item">
                <i class="fas fa-users"></i>
                <span>Utilisateurs</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
            <a href="{{ route('contact.index') }}" class="menu-item">
                <i class="fas fa-envelope"></i>
                <span>Messages</span>
            </a>
            <a href="{{ route('etudiants.index') }}" class="menu-item">
                <i class="fas fa-user-graduate"></i>
                <span>Étudiants</span>
            </a>
            <a href="{{ route('dashboard.statistiques') }}" class="menu-item">
                <i class="fas fa-user-graduate"></i>
                <span>Statistics</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Topbar -->
        <nav class="topbar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Rechercher...">
            </div>

            <div class="user-profile">
                <img src="https://img.freepik.com/vecteurs-libre/cercle-bleu-utilisateur-blanc_78370-4707.jpg?semt=ais_hybrid&w=740" alt="Admin">
                <div class="user-info">
                    <span class="user-name">{{ Auth::user()->nom }}</span>
                    <span class="user-role">Administrateur</span>
                </div>
            </div>
        </nav>

        <!-- Page content -->
        <div class="content">
            @yield('content')
        </div>
    </main>

    <!-- JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card, .module-card, .candidate-card, .message-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>
