
<style>
    :root {
        --primary: #4F46E5; /* Indigo */
        --primary-hover: #4338CA;
        --error: #EF4444;
        --error-light: #FEE2E2;
        --success: #10B981;
        --gray-100: #F3F4F6;
        --gray-200: #E5E7EB;
        --gray-400: #9CA3AF;
        --gray-600: #4B5563;
        --gray-800: #1F2937;
        --white: #FFFFFF;
        --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
        --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        background: linear-gradient(135deg, #F3F4F6 0%, #E5E7EB 100%);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        color: var(--gray-800);
        line-height: 1.5;
    }

    .login-wrapper {
        background: var(--white);
        border-radius: 12px;
        box-shadow: var(--shadow-lg);
        width: 100%;
        max-width: 28rem;
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .login-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--primary) 0%, #7C3AED 100%);
    }

    .login-title {
        font-size: 1.875rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
        color: var(--gray-800);
        letter-spacing: -0.025em;
    }

    .login-error-message {
        background: var(--error-light);
        color: var(--error);
        padding: 0.875rem 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        animation: slideIn 0.3s ease-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .login-form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .login-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--gray-600);
    }

    .login-input {
        padding: 0.875rem 1rem;
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        font-size: 0.9375rem;
        transition: var(--transition);
        background-color: var(--white);
    }

    .login-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
    }

    .login-input::placeholder {
        color: var(--gray-400);
        opacity: 1;
    }

    .login-checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .login-checkbox {
        width: 1.125rem;
        height: 1.125rem;
        border-radius: 4px;
        border: 1px solid var(--gray-200);
        appearance: none;
        transition: var(--transition);
        cursor: pointer;
        position: relative;
    }

    .login-checkbox:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .login-checkbox:checked::after {
        content: '✓';
        position: absolute;
        color: white;
        font-size: 0.75rem;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .login-checkbox-label {
        font-size: 0.875rem;
        color: var(--gray-600);
        cursor: pointer;
        user-select: none;
    }

    .login-submit-button {
        background-color: var(--primary);
        color: var(--white);
        border: none;
        padding: 1rem;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        margin-top: 0.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
    }

    .login-submit-button:hover {
        background-color: var(--primary-hover);
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    .login-submit-button:active {
        transform: translateY(0);
    }

    .login-footer-links {
        display: flex;
        justify-content: center;
        gap: 0.75rem;
        font-size: 0.875rem;
        margin-top: 1.5rem;
        color: var(--gray-400);
    }

    .login-forgot-link,
    .login-register-link {
        color: var(--gray-600);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .login-forgot-link:hover,
    .login-register-link:hover {
        color: var(--primary);
        text-decoration: underline;
    }

    /* Responsive adjustments */
    @media (max-width: 480px) {
        .login-wrapper {
            padding: 1.75rem;
        }
        
        .login-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
    }

    /* Loading state */
    .login-submit-button.loading {
        position: relative;
        pointer-events: none;
    }

    .login-submit-button.loading::after {
        content: '';
        display: block;
        width: 1.25rem;
        height: 1.25rem;
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        border-top-color: var(--white);
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>

</head>
<body>
   <div class="login-wrapper">
    <h1 class="login-title">Connexion</h1>
    
    @if($errors->any())
        <div class="login-error-message">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('auth.connexion') }}" class="login-form">
        @csrf
        
        <div class="login-form-group email-group">
            <label for="email" class="login-label email-label">Email</label>
            <input type="email" id="email" name="email" required placeholder="votre@email.com" class="login-input email-input">
        </div>
        
        <div class="login-form-group password-group">
            <label for="mot_de_passe" class="login-label password-label">Mot de passe</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required placeholder="••••••••" class="login-input password-input">
        </div>
        
        <div class="login-checkbox-group">
            <input type="checkbox" id="remember" name="remember" class="login-checkbox">
            <label for="remember" class="login-checkbox-label">Se souvenir de moi</label>
        </div>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="login-token">
        
        <button type="submit" class="login-submit-button">Se connecter</button>
        
        <div class="login-footer-links">
            <a href="#" class="login-forgot-link">Mot de passe oublié ?</a> • 
            <a href="{{route('auth.inscription')}}" class="login-register-link">Créer un compte</a>
        </div>
    </form>
</div>

</body>
</html>



