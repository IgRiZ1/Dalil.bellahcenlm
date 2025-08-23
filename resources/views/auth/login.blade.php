@extends('layouts.app')

@section('title', 'Login - Shadow Access')

@section('content')
<div class="login-container">
    <div class="login-wrapper">
        <!-- Left Side - Login Form -->
        <div class="login-form-section">
            <div class="login-brand">
                <div class="brand-icon floating">
                    <i class="fas fa-user-secret"></i>
                </div>
                <h1 class="brand-title gradient-text">Shadow Access</h1>
                <p class="brand-subtitle">Betreed de digitale dimensie</p>
            </div>

            <div class="login-form glass-card">
                <h2 class="form-title">
                    <i class="fas fa-key me-2"></i>
                    Toegang verkrijgen
                </h2>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="cyber-input-group">
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" 
                                   class="cyber-input @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="E-mail adres"
                                   required autofocus>
                            <div class="input-border"></div>
                        </div>
                        @error('email')
                            <div class="cyber-error">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="cyber-input-group">
                        <div class="input-wrapper">
                            <i class="fas fa-shield-alt input-icon"></i>
                            <input type="password" 
                                   class="cyber-input @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Toegangscode"
                                   required>
                            <div class="input-border"></div>
                        </div>
                        @error('password')
                            <div class="cyber-error">
                                <i class="fas fa-exclamation-triangle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="cyber-checkbox-group">
                        <label class="cyber-checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <span class="checkmark"></span>
                            <span class="checkbox-text">
                                <i class="fas fa-memory me-2"></i>
                                Sessie bewaren
                            </span>
                        </label>
                    </div>
                    
                    <button type="submit" class="cyber-button cyber-button-primary">
                        <span class="button-text">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            TOEGANG VERKRIJGEN
                        </span>
                        <div class="button-glow"></div>
                    </button>
                </form>
                
                <div class="login-links">
                    <a href="{{ route('password.request') }}" class="cyber-link">
                        <i class="fas fa-unlock-alt me-1"></i>
                        Toegang herstellen?
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Side - Info Panel -->
        <div class="login-info-section">
            <div class="info-content glass-card">
                <div class="info-header">
                    <h3 class="gradient-text">Nieuwe Agent?</h3>
                    <p>Registreer jezelf in het systeem</p>
                </div>
                
                <div class="info-features">
                    <div class="feature-item">
                        <i class="fas fa-shield-virus"></i>
                        <span>Beveiligde Toegang</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-globe-americas"></i>
                        <span>Globaal Netwerk</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-rocket"></i>
                        <span>Snelle Verbinding</span>
                    </div>
                </div>
                
                <a href="{{ route('register') }}" class="cyber-button cyber-button-secondary">
                    <span class="button-text">
                        <i class="fas fa-user-plus me-2"></i>
                        NIEUW ACCOUNT
                    </span>
                    <div class="button-glow"></div>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.login-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    position: relative;
    overflow: hidden;
}

.login-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.2) 0%, transparent 50%);
    animation: pulse 4s ease-in-out infinite alternate;
}

@keyframes pulse {
    0% { opacity: 0.5; }
    100% { opacity: 1; }
}

.login-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    max-width: 1000px;
    width: 100%;
    position: relative;
    z-index: 1;
}

.login-form-section {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.login-brand {
    text-align: center;
    margin-bottom: 3rem;
}

.brand-icon {
    display: inline-block;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    box-shadow: var(--shadow-xl);
}

.brand-icon i {
    font-size: 2rem;
    color: white;
}

.brand-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    letter-spacing: 2px;
}

.brand-subtitle {
    color: var(--text-secondary);
    font-size: 1.1rem;
    margin-bottom: 0;
}

.login-form {
    padding: 2.5rem;
    border-radius: var(--radius-lg);
}

.form-title {
    text-align: center;
    color: var(--text-primary);
    font-weight: 600;
    margin-bottom: 2rem;
    font-size: 1.5rem;
}

.cyber-input-group {
    margin-bottom: 1.5rem;
}

.input-wrapper {
    position: relative;
}

.cyber-input {
    width: 100%;
    padding: 1rem 1rem 1rem 3rem;
    background: rgba(255, 255, 255, 0.05);
    border: 2px solid transparent;
    border-radius: var(--radius);
    color: var(--text-primary);
    font-size: 1rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.cyber-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
    transform: translateY(-2px);
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--primary-color);
    font-size: 1.1rem;
    z-index: 2;
}

.input-border {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.cyber-input:focus + .input-border {
    transform: scaleX(1);
}

.cyber-error {
    color: var(--danger-color);
    font-size: 0.875rem;
    margin-top: 0.5rem;
    padding: 0.5rem;
    background: rgba(239, 68, 68, 0.1);
    border-radius: var(--radius);
    border-left: 3px solid var(--danger-color);
}

.cyber-checkbox-group {
    margin-bottom: 2rem;
}

.cyber-checkbox {
    display: flex;
    align-items: center;
    cursor: pointer;
    position: relative;
    padding-left: 2rem;
}

.cyber-checkbox input {
    opacity: 0;
    position: absolute;
}

.checkmark {
    position: absolute;
    left: 0;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.05);
    border: 2px solid var(--border-color);
    border-radius: 4px;
    transition: all 0.3s ease;
}

.cyber-checkbox:hover .checkmark {
    border-color: var(--primary-color);
    box-shadow: 0 0 10px rgba(139, 92, 246, 0.3);
}

.cyber-checkbox input:checked ~ .checkmark {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.cyber-checkbox input:checked ~ .checkmark::after {
    content: '✓';
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 0.875rem;
    font-weight: bold;
}

.checkbox-text {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

.cyber-button {
    position: relative;
    width: 100%;
    padding: 1rem 2rem;
    background: transparent;
    border: 2px solid var(--primary-color);
    border-radius: var(--radius);
    color: var(--primary-color);
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.cyber-button-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-color: transparent;
}

.cyber-button-secondary {
    margin-top: 1rem;
}

.cyber-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4);
}

.button-glow {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.cyber-button:hover .button-glow {
    left: 100%;
}

.login-links {
    text-align: center;
    margin-top: 1.5rem;
}

.cyber-link {
    color: var(--primary-color);
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    position: relative;
}

.cyber-link:hover {
    color: var(--secondary-color);
    transform: translateX(5px);
}

.login-info-section {
    display: flex;
    align-items: center;
    justify-content: center;
}

.info-content {
    padding: 3rem;
    text-align: center;
    border-radius: var(--radius-lg);
}

.info-header h3 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.info-header p {
    color: var(--text-secondary);
    font-size: 1.1rem;
    margin-bottom: 2rem;
}

.info-features {
    margin-bottom: 2rem;
}

.feature-item {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    color: var(--text-secondary);
}

.feature-item i {
    margin-right: 0.75rem;
    color: var(--primary-color);
    font-size: 1.2rem;
}

@media (max-width: 768px) {
    .login-wrapper {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .login-container {
        padding: 1rem;
    }
    
    .brand-title {
        font-size: 2rem;
    }
    
    .login-form {
        padding: 2rem;
    }
    
    .info-content {
        padding: 2rem;
    }
}
</style>
@endsection
