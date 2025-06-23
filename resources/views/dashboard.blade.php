<h2>Bienvenue sur votre tableau de bord utilisateur</h2>
<p>Vous êtes connecté en tant qu'utilisateur.</p>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Se déconnecter</button>
</form>
