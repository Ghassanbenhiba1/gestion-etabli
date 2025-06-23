<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --error-color: #ef233c;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #adb5bd;
            --text-color: #2b2d42;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light-gray);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            line-height: 1.6;
            padding: 20px;
        }

        .signup-container {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .signup-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            margin-bottom: 1.8rem;
            color: var(--primary-color);
            font-weight: 600;
            font-size: 2rem;
        }

        .error-message {
            background-color: rgba(239, 35, 60, 0.1);
            color: var(--error-color);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.8rem;
            border-left: 4px solid var(--error-color);
        }

        .error-message ul {
            list-style-position: inside;
            margin-left: 0;
            padding-left: 0;
        }

        .error-message li {
            margin-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 500;
            font-size: 0.95rem;
            color: var(--text-color);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 0.85rem 1.2rem;
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: var(--white);
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }

        button {
            width: 100%;
            padding: 1rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }

        button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.95rem;
            color: var(--dark-gray);
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .password-hint {
            font-size: 0.8rem;
            color: var(--dark-gray);
            margin-top: 0.3rem;
        }

        @media (max-width: 480px) {
            .signup-container {
                padding: 1.8rem;
            }
            
            h1 {
                font-size: 1.7rem;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h1>Créer un compte</h1>
        
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('auth.inscription') }}">
            @csrf
            
            <div class="form-group">
                <label for="nom">Nom complet</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required placeholder="Votre nom complet">
            </div>
            
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="exemple@domaine.com">
            </div>
            
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required placeholder="••••••••">
                <p class="password-hint">8 caractères minimum, avec majuscules et chiffres</p>
            </div>
            
            <div class="form-group">
                <label for="mot_de_passe_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" required placeholder="••••••••">
            </div>
            
            <div class="form-group">
                <label for="role">Rôle</label>
                <select id="role" name="role" required>
                    <option value="utilisateur" {{ old('role') == 'utilisateur' ? 'selected' : '' }}>Utilisateur</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                </select>
            </div>
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button type="submit">S'inscrire</button>
            
            <div class="login-link">
                Déjà un compte ? <a href="{{ route('auth.connexion') }}">Se connecter</a>
            </div>
        </form>
    </div>
</body>
</html>