@extends('layouts.app')

@section('hide_navbar', true)

@section('content')
<div class="login-container">
    <div class="login-background">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <!-- Loading Skeleton (initially hidden) -->
                <div class="skeleton-card" id="skeletonLoader" style="display: none;">
                    <div class="skeleton-header">
                        <div class="skeleton-logo"></div>
                        <div class="skeleton-title"></div>
                        <div class="skeleton-subtitle"></div>
                    </div>
                    <div class="skeleton-body">
                        <div class="skeleton-input"></div>
                        <div class="skeleton-input"></div>
                        <div class="skeleton-checkbox"></div>
                        <div class="skeleton-button"></div>
                    </div>
                </div>

                <!-- Main Login Card -->
                <div class="login-card" id="loginCard">
                    <div class="card-header-modern">
                        <div class="portal-header-image">
                            <img src="{{ asset('images/logo/AMIS_Logo_Portal.jpg') }}" alt="AMIS Portal" class="header-bg-image" 
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                            <div class="fallback-header" style="display: none;">
                                <div class="fallback-logo">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <h3>AMIS Portal</h3>
                                <p>Al Munawwara Islamic School</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body-modern">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf

                            <div class="form-group-modern">
                                <label for="email" class="form-label-modern">
                                    <i class="fas fa-envelope"></i>
                                    Email Address
                                </label>
                                <div class="input-wrapper">
                                    <input id="email" type="email" 
                                           class="form-control-modern @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email') }}" 
                                           required autocomplete="email" autofocus
                                           placeholder="Enter your email address">
                                </div>
                                @error('email')
                                    <span class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group-modern">
                                <label for="password" class="form-label-modern">
                                    <i class="fas fa-lock"></i>
                                    Password
                                </label>
                                <div class="input-wrapper">
                                    <input id="password" type="password" 
                                           class="form-control-modern @error('password') is-invalid @enderror" 
                                           name="password" required autocomplete="current-password"
                                           placeholder="Enter your password">
                                    <button type="button" class="password-toggle" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-options">
                                <label class="checkbox-modern">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Remember me
                                </label>
                                
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-password">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>

                            <button type="submit" class="btn-login-modern" id="loginBtn">
                                <span class="btn-text">Sign In</span>
                                <div class="btn-spinner" style="display: none;">
                                    <div class="spinner"></div>
                                </div>
                                <i class="fas fa-arrow-right btn-icon"></i>
                            </button>
                        </form>

                        <div class="divider">
                            <span>or</span>
                        </div>

                        <div class="register-link">
                            <p>Don't have an account? 
                                <a href="{{ route('register') }}" class="register-btn">Create Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern Login Container */
.login-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #1a5f1a 0%, #2d7d32 25%, #388e3c 50%, #4caf50 75%, #66bb6a 100%);
    position: relative;
    overflow: hidden;
}

.login-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.floating-shapes {
    position: absolute;
    width: 100%;
    height: 100%;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    animation: float 8s ease-in-out infinite;
}

.shape-1 {
    width: 100px;
    height: 100px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 150px;
    height: 150px;
    top: 60%;
    right: 15%;
    animation-delay: 3s;
}

.shape-3 {
    width: 80px;
    height: 80px;
    bottom: 30%;
    left: 20%;
    animation-delay: 6s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
    50% { transform: translateY(-30px) rotate(180deg); opacity: 1; }
}

/* Skeleton Loader Styles */
.skeleton-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 2rem;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.skeleton-header {
    text-align: center;
    margin-bottom: 2rem;
}

.skeleton-logo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
    margin: 0 auto 1rem;
}

.skeleton-title {
    width: 200px;
    height: 24px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
    border-radius: 12px;
    margin: 0 auto 0.5rem;
}

.skeleton-subtitle {
    width: 150px;
    height: 16px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
    border-radius: 8px;
    margin: 0 auto;
}

.skeleton-input {
    width: 100%;
    height: 56px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
    border-radius: 12px;
    margin-bottom: 1.5rem;
}

.skeleton-checkbox {
    width: 120px;
    height: 20px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
    border-radius: 10px;
    margin-bottom: 1.5rem;
}

.skeleton-button {
    width: 100%;
    height: 56px;
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
    border-radius: 28px;
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

/* Modern Login Card */
.login-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
    z-index: 2;
    animation: slideUp 0.8s ease-out;
}

@keyframes slideUp {
    from { transform: translateY(50px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.card-header-modern {
    padding: 0;
    position: relative;
    height: 220px;
    overflow: hidden;
    border-radius: 24px 24px 0 0;
    background: #fff;
}

.portal-header-image {
    width: 100%;
    height: 100%;
}

.header-bg-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
    display: block;
    padding: 16px 24px 0 24px;
}

.fallback-header {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    color: white;
}

.fallback-logo {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 1rem;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.fallback-header h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.fallback-header p {
    font-size: 0.9rem;
    opacity: 0.9;
    margin: 0;
}

.card-header-modern::before {
    display: none;
}

.card-body-modern {
    padding: 2.5rem 2rem;
}

/* Modern Form Styles */
.form-group-modern {
    margin-bottom: 2rem;
}

.form-label-modern {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.75rem;
    font-size: 0.9rem;
}

.input-wrapper {
    position: relative;
}

.form-control-modern {
    width: 100%;
    padding: 1rem 1.25rem;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8f9fa;
    position: relative;
}

/* Hide browser's default password reveal button */
.form-control-modern::-ms-reveal,
.form-control-modern::-ms-clear {
    display: none;
}

.form-control-modern::-webkit-credentials-auto-fill-button,
.form-control-modern::-webkit-contacts-auto-fill-button {
    visibility: hidden;
    pointer-events: none;
    position: absolute;
    right: 0;
}

.form-control-modern:focus {
    outline: none;
    border-color: var(--primary-green);
    background: white;
    box-shadow: 0 0 0 3px rgba(45, 125, 50, 0.1);
}



.password-toggle {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #6c757d;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.password-toggle:hover {
    background: rgba(45, 125, 50, 0.1);
    color: var(--primary-green);
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

/* Modern Checkbox */
.checkbox-modern {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 0.9rem;
    color: #6c757d;
}

.checkbox-modern input {
    display: none;
}

.checkmark {
    width: 20px;
    height: 20px;
    border: 2px solid #dee2e6;
    border-radius: 4px;
    margin-right: 0.75rem;
    position: relative;
    transition: all 0.3s ease;
}

.checkbox-modern input:checked + .checkmark {
    background: var(--primary-green);
    border-color: var(--primary-green);
}

.checkbox-modern input:checked + .checkmark::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.forgot-password {
    color: var(--primary-green);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.forgot-password:hover {
    color: var(--secondary-green);
    text-decoration: underline;
}

/* Modern Login Button */
.btn-login-modern {
    width: 100%;
    padding: 1rem 2rem;
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    color: white;
    border: none;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
}

.btn-login-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(45, 125, 50, 0.3);
}

.btn-login-modern:active {
    transform: translateY(0);
}

.btn-spinner {
    display: flex;
    align-items: center;
    justify-content: center;
}

.spinner {
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.btn-icon {
    transition: transform 0.3s ease;
}

.btn-login-modern:hover .btn-icon {
    transform: translateX(5px);
}

/* Divider */
.divider {
    text-align: center;
    margin: 1.5rem 0;
    position: relative;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #dee2e6;
}

.divider span {
    background: white;
    padding: 0 1rem;
    color: #6c757d;
    font-size: 0.9rem;
    position: relative;
}

/* Register Link */
.register-link {
    text-align: center;
}

.register-link p {
    color: #6c757d;
    margin: 0;
}

.register-btn {
    color: var(--primary-green);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.register-btn:hover {
    color: var(--secondary-green);
    text-decoration: underline;
}

/* Error Messages */
.error-message {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .login-card {
        margin: 1rem;
        border-radius: 20px;
    }
    
    .card-header-modern,
    .card-body-modern {
        padding: 2rem 1.5rem;
    }
    
    .login-title {
        font-size: 1.75rem;
    }
    
    .form-options {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    const btnText = loginBtn.querySelector('.btn-text');
    const btnSpinner = loginBtn.querySelector('.btn-spinner');
    const btnIcon = loginBtn.querySelector('.btn-icon');
    const skeletonLoader = document.getElementById('skeletonLoader');
    const loginCard = document.getElementById('loginCard');
    
    // Show skeleton loader on page load
    setTimeout(() => {
        skeletonLoader.style.display = 'none';
        loginCard.style.display = 'block';
    }, 1000);
    
    // Password toggle
    document.getElementById('togglePassword').addEventListener('click', function() {
        const password = document.getElementById('password');
        const icon = this.querySelector('i');
        
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
    
    // Form submission with loading state
    loginForm.addEventListener('submit', function(e) {
        loginBtn.disabled = true;
        btnText.style.display = 'none';
        btnIcon.style.display = 'none';
        btnSpinner.style.display = 'flex';
        
        // Add loading class for additional styling
        loginBtn.classList.add('loading');
    });
    
    // Input focus effects
    const inputs = document.querySelectorAll('.form-control-modern');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
</script>
@endsection