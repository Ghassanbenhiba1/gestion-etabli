@php
    $activeStyle = 'color: var(--primary); background-color: var(--primary-light); font-weight: bold;';
@endphp

<style>
    .admin-sidebar-toggle {
        display: none;
    }

    @media (max-width: 768px) {
        #adminSidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #fff;
            z-index: 1000;
        }

        #adminSidebar.open {
            transform: translateX(0);
        }

        #adminSidebarOverlay {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .admin-sidebar-toggle {
            display: block;
            position: absolute;
            top: 1rem;
            left: 1rem;
            z-index: 1100;
            background: none;
            border: none;
            font-size: 1.5rem;
        }
    }
</style>

<!-- Toggle Button (mobile only) -->
<button class="admin-sidebar-toggle" id="adminSidebarToggleBtn" onclick="toggleAdminSidebar()">
    <i class="fas fa-bars"></i>
</button>

<!-- Sidebar Overlay (mobile only) -->
<div id="adminSidebarOverlay" style="display: none;" onclick="toggleAdminSidebar()"></div>

<aside id="adminSidebar" class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <i class="fas fa-university"></i>
            <span>Administrateur</span>
        </a>
    </div>

    <div class="sidebar-menu">
        <div class="menu-title">Menu Principal</div>
        <a href="{{ route('admin.dashboard') }}"
           class="menu-item"
           style="{{ request()->is('admin/dashboard') ? $activeStyle : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>

        <div class="menu-title">Gestion</div>
        <a href="{{ route('filieres.index') }}"
           class="menu-item"
           style="{{ request()->is('admin/filieres*') ? $activeStyle : '' }}">
            <i class="fas fa-graduation-cap"></i>
            <span>Filières</span>
        </a>
        <a href="{{ route('evenements.index') }}"
           class="menu-item"
           style="{{ request()->is('evenements*') ? $activeStyle : '' }}">
            <i class="fas fa-calendar-alt"></i>
            <span>Événements</span>
        </a>
        <a href="{{ route('actualites.index') }}"
           class="menu-item"
           style="{{ request()->is('actualites*') ? $activeStyle : '' }}">
            <i class="fas fa-newspaper"></i>
            <span>Actualités</span>
        </a>
        <a href="{{ route('cours.index') }}"
           class="menu-item"
           style="{{ request()->is('admin/cours*') ? $activeStyle : '' }}">
            <i class="fas fa-book"></i>
            <span>Cours</span>
        </a>
        <a href="{{ route('candidat') }}"
           class="menu-item"
           style="{{ request()->is('candidat*') ? $activeStyle : '' }}">
            <i class="fas fa-users"></i>
            <span>Candidats</span>
        </a>
        <a href="{{ route('contact.index') }}"
           class="menu-item"
           style="{{ request()->is('admin/dashboard/messages*') ? $activeStyle : '' }}">
            <i class="fas fa-envelope"></i>
            <span>Messages</span>
        </a>
        <a href="{{ route('etudiants.index') }}"
           class="menu-item"
           style="{{ request()->is('admin/etudiants*') ? $activeStyle : '' }}">
            <i class="fas fa-user-graduate"></i>
            <span>Étudiants</span>
        </a>
        <a href="{{ route('dashboard.statistiques') }}"
           class="menu-item"
           style="{{ request()->is('admin/dashboard/statistiques*') ? $activeStyle : '' }}">
            <i class="fas fa-chart-bar"></i>
            <span>Statistiques</span>
        </a>
    </div>
</aside>

<script>
    function toggleAdminSidebar() {
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('adminSidebarOverlay');

        sidebar.classList.toggle('open');
        overlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none';
    }
</script>
