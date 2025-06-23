<style>
    
#navbar-brand {
    font-size: 1.7rem;
    font-weight: bold;
    color: #004080;
    letter-spacing: 1px;
}
#navbar-brand:hover {
    color: #0066cc;
    text-decoration: none;
}

</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}" id="navbar-brand">
        <img src="{{ asset('images/logo.svg') }}" alt="logo" class="img-fluid" style="width: 50px; height: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('filiere.page') }}">Filières</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('evenements.page') }}">Événements</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('actualites.page') }}">Actualités</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('contact.create') }}">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('inscription.create') }}">Je me candidate</a></li>
            <li class="nav-item"><a href="{{ route('auth.connexion') }}" class="btn">Se connecter</a></li>
            <li class="nav-item"><a href="{{ route('etudiantlogin') }}" class="btn">Je suis un étudiant</a></li>
        </ul>
    </div>
</nav>
