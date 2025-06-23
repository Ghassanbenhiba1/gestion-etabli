<table class="table table-bordered">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Classe</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->identifiant }}</td>
                <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->classe->nom }}</td>
                <td>
                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-info btn-sm">Voir les détails</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Aucun étudiant trouvé.</td>
            </tr>
        @endforelse
    </tbody>
</table>
