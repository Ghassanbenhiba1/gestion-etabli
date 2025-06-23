@component('mail::message')
# Félicitations {{ $candidat->prenom }} {{ $candidat->nom }}

Nous sommes heureux de vous informer que votre candidature a été approuvée avec succès.

Bienvenue à la formation CMFP ! 🎓

@component('mail::button', ['url' => url('/')])
Accéder au site
@endcomponent

Merci,<br>
L'équipe CMFP
@endcomponent
