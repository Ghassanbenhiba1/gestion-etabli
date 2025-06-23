@extends('layouts.app')

@section('content')
<div class="success-registration">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="success-card text-center p-4 p-md-5 shadow-lg rounded-lg">
                    <div class="success-icon mb-4">
                        <div class="icon-circle bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center">
                            <i class="fas fa-check fa-3x"></i>
                        </div>
                    </div>
                    
                    <h1 class="text-success mb-4">Inscription réussie !</h1>
                    
                    <div class="success-message bg-light-success p-4 rounded mb-5">
                        <p class="lead mb-0">Félicitations, votre inscription a été effectuée avec succès.</p>
                        <p class="mb-0 mt-2">Un email de confirmation vous a été envoyé avec les détails.</p>
                    </div>
                    
                    <div class="next-steps mb-5">
                        <h5 class="mb-3">Prochaines étapes :</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-envelope text-primary mr-2"></i> Vérifiez votre boîte email</li>
                            <li class="mb-2"><i class="fas fa-calendar-check text-primary mr-2"></i> Attendez notre confirmation</li>
                            <li><i class="fas fa-user-graduate text-primary mr-2"></i> Préparez votre rentrée</li>
                        </ul>
                    </div>
                    
                    <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-home mr-2"></i> Retour à la page d'accueil
                    </a>
                    
                    <div class="contact-support mt-4">
                        <p class="small text-muted">Besoin d'aide ? <a href="{{ route('contact.create') }}">Contactez notre support</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .success-registration {
        background-color: #f8f9fa;
        min-height: 100vh;
    }
    
    .success-card {
        background: white;
        border: none;
        transition: all 0.3s ease;
    }
    
    .icon-circle {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #28a745 0%, #5cb85c 100%);
    }
    
    .bg-light-success {
        background-color: rgba(40, 167, 69, 0.1) !important;
        border-left: 4px solid #28a745;
    }
    
    .success-message p {
        font-size: 1.1rem;
        color: #333;
    }
    
    .btn-primary {
        background: linear-gradient(to right, #4e54c8, #8f94fb);
        border: none;
        border-radius: 50px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(78, 84, 200, 0.3);
    }
    
    .next-steps ul li {
        padding: 0.5rem 0;
    }
    
    @media (max-width: 768px) {
        .icon-circle {
            width: 80px;
            height: 80px;
        }
        
        .icon-circle i {
            font-size: 2rem;
        }
        
        h1 {
            font-size: 1.8rem;
        }
        
        .success-message p {
            font-size: 1rem;
        }
    }
</style>
@endpush
@endsection