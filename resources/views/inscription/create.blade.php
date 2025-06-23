@extends('layouts.app')

@section('content')
<style>
    /* ===== Advanced Candidate Application Styles ===== */
.candidate-application {
    --primary-color: #4e54c8;
    --primary-light: #6a6fd1;
    --secondary-color: #8f94fb;
    --accent-color: #6a11cb;
    --accent-light: #8a2be2;
    --dark-color: #2c3e50;
    --light-color: #f8f9fa;
    --text-color: #333333;
    --muted-color: #6c757d;
    --white-color: #ffffff;
    --success-color: #28a745;
    --error-color: #dc3545;
    --warning-color: #ffc107;
    --info-color: #17a2b8;
    --border-radius: 12px;
    --box-shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12);
    --box-shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
    --box-shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
    --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    --transition-slow: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
    
    background-color: var(--light-color);
    min-height: calc(100vh - 120px);
    padding: 2rem 0;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%234e54c8' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

/* Card Styling */
.candidate-application .card {
    border: none;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--box-shadow-lg);
    transition: var(--transition-slow);
    background: var(--white-color);
}

.candidate-application .card:hover {
    box-shadow: 0 15px 30px rgba(78, 84, 200, 0.15);
    transform: translateY(-5px);
}

/* Left Column - Information */
.candidate-application .bg-light {
    background-color: var(--light-color) !important;
    position: relative;
    overflow: hidden;
}

.candidate-application .bg-light::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, var(--white-color) 1px, transparent 1px);
    background-size: 30px 30px;
    opacity: 0.1;
    transform: rotate(15deg);
    animation: grain 8s steps(10) infinite;
}

@keyframes grain {
    0%, 100% { transform: translate(0, 0) rotate(15deg); }
    10% { transform: translate(-5%, -10%) rotate(15deg); }
    30% { transform: translate(3%, -15%) rotate(15deg); }
    50% { transform: translate(12%, 9%) rotate(15deg); }
    70% { transform: translate(9%, 4%) rotate(15deg); }
    90% { transform: translate(-1%, 7%) rotate(15deg); }
}

.candidate-application h2 {
    font-weight: 700;
    color: var(--dark-color);
    position: relative;
    padding-bottom: 1rem;
}

.candidate-application h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(to right, var(--primary-color), var(--accent-color));
    border-radius: 3px;
}

.candidate-application .text-muted {
    color: var(--muted-color) !important;
}

/* Requirements Box */
.candidate-application .bg-white {
    background-color: var(--white-color) !important;
    border-radius: var(--border-radius);
    padding: 1.5rem !important;
    box-shadow: var(--box-shadow-sm);
    transition: var(--transition);
    border-left: 4px solid var(--primary-color);
}

.candidate-application .bg-white:hover {
    transform: translateX(5px);
    box-shadow: var(--box-shadow-md);
}

.candidate-application ul.list-unstyled li {
    padding: 0.5rem 0;
    border-bottom: 1px dashed rgba(0, 0, 0, 0.1);
    transition: var(--transition);
    display: flex;
    align-items: center;
}

.candidate-application ul.list-unstyled li:last-child {
    border-bottom: none;
}

.candidate-application ul.list-unstyled li:hover {
    color: var(--primary-color);
    transform: translateX(3px);
}

.candidate-application ul.list-unstyled li i {
    transition: var(--transition);
}

.candidate-application ul.list-unstyled li:hover i {
    transform: scale(1.2);
}

/* Contact Info */
.candidate-application .rounded-circle {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color)) !important;
}

.candidate-application .d-flex.align-items-center {
    padding: 0.75rem;
    border-radius: var(--border-radius);
    transition: var(--transition);
}

.candidate-application .d-flex.align-items-center:hover {
    background-color: rgba(78, 84, 200, 0.05);
    transform: translateX(3px);
}

.candidate-application .d-flex.align-items-center:hover .rounded-circle {
    transform: rotate(10deg) scale(1.1);
}

/* Right Column - Form */
.candidate-application .col-md-7 {
    padding: 2.5rem !important;
}

.candidate-application h3 {
    font-weight: 600;
    color: var(--dark-color);
    position: relative;
    margin-bottom: 2rem;
    text-align: center;
}

.candidate-application h3::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(to right, var(--primary-color), var(--accent-color));
    border-radius: 3px;
}

/* Form Elements */
.candidate-application .form-group {
    margin-bottom: 1.5rem;
    position: relative;
}

.candidate-application label {
    font-weight: 500;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
    display: block;
    transition: var(--transition);
}

.candidate-application .form-control,
.candidate-application .custom-select {
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: var(--border-radius);
    padding: -12.25rem 1rem;
    transition: var(--transition);
    box-shadow: none;
    background-color: var(--white-color);
}

.candidate-application .form-control:focus,
.candidate-application .custom-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(78, 84, 200, 0.15);
}

.candidate-application .form-control.is-invalid,
.candidate-application .custom-select.is-invalid {
    border-color: var(--error-color);
}

.candidate-application .form-control.is-invalid:focus,
.candidate-application .custom-select.is-invalid:focus {
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
}

.candidate-application .invalid-feedback {
    font-size: 0.85rem;
    margin-top: 0.25rem;
    color: var(--error-color);
    opacity: 0;
    transform: translateY(-10px);
    transition: var(--transition);
}

.candidate-application .is-invalid ~ .invalid-feedback {
    opacity: 1;
    transform: translateY(0);
}

/* File Input Customization */
.candidate-application .custom-file {
    position: relative;
    overflow: hidden;
    height: calc(2.5rem + 2px);
}

.candidate-application .custom-file-input {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
    z-index: 2;
}

.candidate-application .custom-file-label {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
    height: calc(2.5rem + 2px);
    padding: 0.75rem 1rem;
    line-height: 1.5;
    color: var(--text-color);
    background-color: var(--white-color);
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: var(--border-radius);
    transition: var(--transition);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.candidate-application .custom-file-label::after {
    content: "Parcourir";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1rem;
    color: var(--white-color);
    background: linear-gradient(to right, var(--primary-color), var(--accent-color));
    border-left: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0 var(--border-radius) var(--border-radius) 0;
    transition: var(--transition);
}

.candidate-application .custom-file-input:focus ~ .custom-file-label {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(78, 84, 200, 0.15);
}

.candidate-application .custom-file-input:focus ~ .custom-file-label::after {
    background: linear-gradient(to right, var(--primary-light), var(--accent-light));
}

.candidate-application .custom-file-input:disabled ~ .custom-file-label {
    background-color: #e9ecef;
}

.candidate-application .custom-file-input:disabled ~ .custom-file-label::after {
    background-color: #6c757d;
}

/* Checkbox Customization */
.candidate-application .form-check {
    padding-left: 1.75rem;
}

.candidate-application .form-check-input {
    width: 1.25rem;
    height: 1.25rem;
    margin-left: -1.75rem;
    margin-top: 0.15rem;
    border: 1px solid rgba(0, 0, 0, 0.1);
    transition: var(--transition);
}

.candidate-application .form-check-input:checked {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.candidate-application .form-check-input:focus {
    box-shadow: 0 0 0 0.2rem rgba(78, 84, 200, 0.25);
    border-color: var(--primary-color);
}

.candidate-application .form-check-label {
    color: var(--text-color);
    cursor: pointer;
    user-select: none;
}

/* Button Styling */
.candidate-application .btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    border: none;
    border-radius: 50px;
    padding: 0.75rem 2.5rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    box-shadow: var(--box-shadow-md);
    text-transform: uppercase;
    font-size: 0.9rem;
}

.candidate-application .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(78, 84, 200, 0.3);
}

.candidate-application .btn-primary:active {
    transform: translateY(1px);
}

.candidate-application .btn-primary::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--primary-light), var(--accent-light));
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: -1;
}

.candidate-application .btn-primary:hover::after {
    opacity: 1;
}

/* Error Alert Styling */
.candidate-application .alert-danger {
    background-color: rgba(220, 53, 69, 0.1);
    border: 1px solid rgba(220, 53, 69, 0.2);
    border-left: 4px solid var(--error-color);
    color: var(--dark-color);
    border-radius: var(--border-radius);
    animation: fadeIn 0.5s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.candidate-application .alert-danger i {
    color: var(--error-color);
    font-size: 1.5rem;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .candidate-application .card {
        margin-top: 2rem;
    }
    
    .candidate-application .col-md-5,
    .candidate-application .col-md-7 {
        padding: 2rem !important;
    }
    
    .candidate-application h3::after {
        width: 60px;
    }
}

@media (max-width: 768px) {
    .candidate-application {
        padding: 1rem 0;
    }
    
    .candidate-application .card {
        border-radius: 0;
    }
    
    .candidate-application .col-md-5,
    .candidate-application .col-md-7 {
        padding: 1.5rem !important;
    }
    
    .candidate-application h2 {
        font-size: 1.5rem;
    }
    
    .candidate-application h3 {
        font-size: 1.3rem;
    }
    
    .candidate-application .btn-primary {
        width: 100%;
        padding: 0.75rem;
    }
}

/* Floating Label Effect */
.candidate-application .form-floating {
    position: relative;
    margin-bottom: 1.5rem;
}

.candidate-application .form-floating label {
    position: absolute;
    top: 0.75rem;
    left: 1rem;
    color: var(--muted-color);
    transition: var(--transition);
    pointer-events: none;
    background: var(--white-color);
    padding: 0 0.5rem;
    border-radius: 4px;
}

.candidate-application .form-floating .form-control:focus ~ label,
.candidate-application .form-floating .form-control:not(:placeholder-shown) ~ label {
    top: -0.5rem;
    left: 0.8rem;
    font-size: 0.75rem;
    color: var(--primary-color);
    background: var(--white-color);
    z-index: 10;
}
</style>
<div class="candidate-application py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="row no-gutters">
                        <!-- Left Column - Information -->
                        <div class="col-md-5 bg-light p-4">
                            <div class="h-100 d-flex flex-column">
                                <h2 class="mb-4">Postuler à notre formation</h2>
                                <p class="text-muted mb-4">Remplissez ce formulaire pour soumettre votre candidature.</p>
                                
                                <div class="bg-white p-3 mb-4 rounded">
                                    <h5 class="mb-3"><i class="fas fa-file-alt text-primary mr-2"></i>Documents requis :</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i> Photo d'identité récente</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i> Copie de la CIN</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i> Dernier certificat scolaire</li>
                                        <li class="mb-2"><i class="fas fa-check-circle text-primary mr-2"></i> CV à jour</li>
                                    </ul>
                                </div>
                                
                                <div class="mt-auto">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-primary text-white rounded-circle p-2 mr-3">
                                            <i class="fas fa-phone-alt fa-lg"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Support candidature</h6>
                                            <p class="mb-0 text-muted">+212 6 12 34 56 78</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary text-white rounded-circle p-2 mr-3">
                                            <i class="fas fa-envelope fa-lg"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Email</h6>
                                            <p class="mb-0 text-muted">admissions@ecole.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column - Form -->
                        <div class="col-md-7 p-4">
                            <h3 class="mb-4 text-center">Formulaire de candidature</h3>
                            
                            @if ($errors->any())
                            <div class="alert alert-danger rounded mb-4">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-circle mr-3"></i>
                                    <div>
                                        <h6 class="mb-1">Erreurs dans le formulaire</h6>
                                        <ul class="mb-0 pl-3">
                                            @foreach ($errors->all() as $error)
                                                <li class="small">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            <form action="{{ route('inscription.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
                                        @error('nom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                                        @error('prenom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="age">Âge</label>
                                        <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age') }}" min="16" max="60" required>
                                        @error('age')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="telephone">Téléphone</label>
                                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                                        @error('telephone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_naissance">Date de naissance</label>
                                        <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" required>
                                        @error('date_naissance')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="cin">Numéro CIN</label>
                                    <input type="text" class="form-control @error('cin') is-invalid @enderror" id="cin" name="cin" value="{{ old('cin') }}" required>
                                    @error('cin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="adresse">Adresse complète</label>
                                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
                                    @error('adresse')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Photo d'identité</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*" required>
                                        <label class="custom-file-label" for="photo">Choisir un fichier...</label>
                                        <small class="form-text text-muted">Format JPG/PNG, taille max 2MB</small>
                                        @error('photo')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Prévisualisation de la photo -->
                                    <div id="photoPreview" class="mt-3" style="display: none;">
                                        <img id="previewImage" src="" alt="Aperçu de la photo" style="max-width: 200px; max-height: 200px; border-radius: 8px; border: 2px solid #dee2e6;">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="niveau_scolaire">Dernier certificat scolaire</label>
                                    <select class="custom-select @error('niveau_scolaire') is-invalid @enderror" id="niveau_scolaire" name="niveau_scolaire" required>
                                        <option value="">-- Choisir --</option>
                                        <option value="bac" @if(old('niveau_scolaire') == 'bac') selected @endif>Bac</option>
                                        <option value="niveau_bac" @if(old('niveau_scolaire') == 'niveau_bac') selected @endif>Niveau Bac</option>
                                        <option value="troisieme" @if(old('niveau_scolaire') == 'troisieme') selected @endif>3ème année collège</option>
                                        <option value="primaire" @if(old('niveau_scolaire') == 'primaire') selected @endif>Certificat primaire</option>
                                    </select>
                                    @error('niveau_scolaire')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="filiere_id">Filière souhaitée</label>
                                    <select class="custom-select @error('filiere_id') is-invalid @enderror" id="filiere_id" name="filiere_id" required>
                                        <option value="">-- Choisir une filière --</option>
                                        @foreach($filieres as $filiere)
                                            <option value="{{ $filiere->id }}" @if(old('filiere_id') == $filiere->id) selected @endif>
                                                {{ $filiere->titre }} ({{ $filiere->niveau }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('filiere_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>CV (PDF uniquement)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('document') is-invalid @enderror" id="document" name="document" accept=".pdf,.doc,.docx" required>
                                        <label class="custom-file-label" for="document">Choisir un fichier...</label>
                                        <small class="form-text text-muted">Format PDF/DOC, taille max 5MB</small>
                                        @error('document')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input @error('confirmation') is-invalid @enderror" id="confirmation" name="confirmation" required>
                                    <label class="form-check-label" for="confirmation">
                                        Je certifie que les informations fournies sont exactes et complètes
                                    </label>
                                    @error('confirmation')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-paper-plane mr-2"></i> Soumettre ma candidature
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script>
    // Update file input labels
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
            
            // Prévisualisation de la photo
            if (this.id === 'photo' && this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                    $('#photoPreview').show();
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
        
        // Form submission handling
        $('form').on('submit', function() {
            $(this).find('button[type="submit"]').prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm mr-2" role="status"></span> Envoi en cours...');
        });
    });
</script>
@endpush
@endsection