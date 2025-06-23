{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="contact-page">
        <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

    {{-- Hero Section --}}
    <section class="contact-hero bg-gradient-primary">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 text-white mb-4">Contactez-nous</h1>
                    <p class="lead text-white-80 mb-4">Nous sommes à votre écoute pour répondre à toutes vos questions et vous accompagner.</p>
                    <div class="contact-info">
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-white-10 rounded-circle p-3 me-3">
                                <i class="fas fa-phone-alt text-white"></i>
                            </div>
                            <div>
                                <div class="text-white-60 small">Téléphone</div>
                                <div class="text-white h5 mb-0">+212 6 12 34 56 78</div>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center mb-3">
                            <div class="info-icon bg-white-10 rounded-circle p-3 me-3">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <div class="text-white-60 small">Email</div>
                                <div class="text-white h5 mb-0">contact@votre-ecole.com</div>
                            </div>
                        </div>
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon bg-white-10 rounded-circle p-3 me-3">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <div class="text-white-60 small">Adresse</div>
                                <div class="text-white h5 mb-0">123 Avenue Mohammed VI, Ville, Maroc</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-container">
                        <img src="{{ asset('images/contact-hero.jpg') }}" alt="Contact" class="img-fluid rounded-4 shadow-lg">
                        <div class="shape-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Form --}}
    <section class="contact-form-section py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="contact-card shadow-lg rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div class="form-container p-4 p-md-5">
                                    <h2 class="mb-4">Envoyez-nous un message</h2>
                                    <p class="text-muted mb-4">Remplissez le formulaire et nous vous répondrons dans les plus brefs délais.</p>
                                    
                                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="name" class="form-label">Votre nom complet</label>
        <div class="input-group">
            <span class="input-group-text bg-transparent"><i class="far fa-user"></i></span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" required>
        </div>
    </div>
    <div class="mb-4">
        <label for="email" class="form-label">Votre adresse email</label>
        <div class="input-group">
            <span class="input-group-text bg-transparent"><i class="far fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
        </div>
    </div>
    <div class="mb-4">
        <label for="subject" class="form-label">Sujet du message</label>
        <div class="input-group">
            <span class="input-group-text bg-transparent"><i class="far fa-question-circle"></i></span>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet" required>
        </div>
    </div>
    <div class="mb-4">
        <label for="message" class="form-label">Votre message</label>
        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Dites-nous comment nous pouvons vous aider" required></textarea>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
            <i class="fas fa-paper-plane me-2"></i> Envoyer le message
        </button>
    </div>
</form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="form-side-image h-100" style="background-image: url('{{ asset('images/contact-side.jpg') }}')">
                                    <div class="overlay-content p-5 d-flex flex-column justify-content-end">
                                        <h3 class="text-white mb-3">Nous sommes là pour vous aider</h3>
                                        <p class="text-white-80">Notre équipe est disponible du lundi au vendredi de 8h à 18h pour répondre à vos questions.</p>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-outline-light rounded-pill">
                                                <i class="fas fa-info-circle me-2"></i> En savoir plus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Google Map --}}
    <section class="map-section">
        <div class="container-fluid px-0">
            <div class="map-container position-relative">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13293.38658102752!2d-7.619995434887695!3d33.59624856438463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd4778a113b1%3A0xb06c1d84f310fd3!2sCasablanca!5e0!3m2!1sfr!2sma!4v1623256789016!5m2!1sfr!2sma" 
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <div class="map-overlay d-none d-lg-block">
                    <div class="map-info-card shadow">
                        <h4 class="mb-3">Notre emplacement</h4>
                        <div class="d-flex mb-3">
                            <i class="fas fa-map-marker-alt text-primary mt-1 me-3"></i>
                            <div>
                                <p class="mb-0">123 Avenue Mohammed VI</p>
                                <p class="mb-0">Casablanca, Maroc</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fas fa-clock text-primary mt-1 me-3"></i>
                            <div>
                                <p class="mb-0">Lundi-Vendredi: 8h-18h</p>
                                <p class="mb-0">Samedi: 9h-13h</p>
                            </div>
                        </div>
                        <a href="#" class="btn btn-sm btn-outline-primary">Itinéraire</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact CTA --}}
    <section class="contact-cta py-5 bg-light">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-4">Vous avez encore des questions ?</h2>
                    <p class="lead text-muted mb-5">Consultez notre FAQ ou contactez directement notre service client.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="#" class="btn btn-primary px-4 py-3">
                            <i class="fas fa-question-circle me-2"></i> Voir la FAQ
                        </a>
                        <a href="#" class="btn btn-outline-secondary px-4 py-3">
                            <i class="fas fa-headset me-2"></i> Support en direct
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Animation de soumission
        const btn = this.querySelector('button[type="submit"]');
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Envoi en cours...';
        btn.disabled = true;
        
        // Simulation d'envoi (remplacer par un vrai appel AJAX)
        setTimeout(() => {
            // Afficher une notification de succès
            const toast = document.createElement('div');
            toast.className = 'position-fixed bottom-0 end-0 p-3';
            toast.style.zIndex = '11';
            toast.innerHTML = `
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-success text-white">
                        <strong class="me-auto">Message envoyé</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Merci pour votre message! Nous vous contacterons bientôt.
                    </div>
                </div>
            `;
            document.body.appendChild(toast);
            
            // Réinitialiser le formulaire
            btn.innerHTML = '<i class="fas fa-paper-plane me-2"></i> Envoyer le message';
            btn.disabled = false;
            this.reset();
            
            // Supprimer la notification après 5 secondes
            setTimeout(() => {
                toast.remove();
            }, 5000);
        }, 1500);
    });
</script>
@endpush