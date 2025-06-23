<nav class="topbar">
    <div class="search-bar">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Rechercher...">
    </div>

    <div class="user-profile">
        <img src="https://img.freepik.com/vecteurs-libre/cercle-bleu-utilisateur-blanc_78370-4707.jpg?semt=ais_hybrid&w=740" alt="Admin">
        <div class="user-info">
            <span class="user-name">{{ Auth::user()->nom ?? 'Admin' }}</span>
            <span class="user-role">Administrateur</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-logout" style="background: none; border: none; cursor: pointer;">
        <i class="bi bi-box-arrow-right me-1"></i> Déconnexion
    </button>
</form>

        </div>
    </div>
</nav>
