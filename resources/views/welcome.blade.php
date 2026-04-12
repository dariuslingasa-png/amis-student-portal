@extends('layouts.app')

@section('content')
<!-- Modern Hero Section -->
<div class="modern-hero">
    <div class="hero-background">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
        </div>
    </div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100 py-5">
            <div class="col-lg-6">
                <div class="hero-content">
                    <div class="badge-modern mb-4">
                        <i class="fas fa-star me-2"></i>
                        Al Munawwara Islamic School
                    </div>
                    
                    <h1 class="hero-title">
                        <span class="gradient-text">Student</span><br>
                        <span class="hero-portal">Portal</span>
                    </h1>
                    
                    <p class="hero-subtitle">
                        Experience the future of Islamic education with our cutting-edge digital platform. 
                        Access courses, track progress, and connect with your learning community.
                    </p>
                    
                    @guest
                        <div class="hero-buttons">
                            <a href="{{ route('login') }}" class="btn-modern btn-primary">
                                <span>Student Login</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="{{ route('register') }}" class="btn-modern btn-outline">
                                <span>Get Started</span>
                                <i class="fas fa-user-plus"></i>
                            </a>
                        </div>
                    @else
                        <div class="hero-buttons">
                            <a href="{{ route('home') }}" class="btn-modern btn-primary">
                                <span>Go to Dashboard</span>
                                <i class="fas fa-tachometer-alt"></i>
                            </a>
                        </div>
                    @endguest
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Students</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">25+</div>
                            <div class="stat-label">Courses</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">98%</div>
                            <div class="stat-label">Success Rate</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-visual">
                    <div class="logo-container-modern">
                        <div class="logo-glow"></div>
                        <div class="logo-main">
                            <div class="amis-logo-container">
                                <img src="{{ asset('images/amis-logo.png') }}" alt="AMIS Logo" class="amis-logo-main">
                            </div>
                            <div class="logo-text-modern">
                                <div class="logo-student">STUDENT</div>
                                <div class="logo-portal">Portal</div>
                                <div class="logo-school">AL MUNAWWARA ISLAMIC SCHOOL</div>
                                <div class="logo-tagline">AMIS STUDENT PORTAL</div>
                            </div>
                        </div>
                        <div class="floating-elements">
                            <div class="element element-1"><i class="fas fa-book"></i></div>
                            <div class="element element-2"><i class="fas fa-graduation-cap"></i></div>
                            <div class="element element-3"><i class="fas fa-mosque"></i></div>
                            <div class="element element-4"><i class="fas fa-quran"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modern Features Section -->
<div class="features-modern">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">
                <span class="gradient-text">Powerful Features</span>
            </h2>
            <p class="section-subtitle">Everything you need for your Islamic education journey</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="feature-card-modern">
                    <div class="feature-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h5 class="feature-title">Smart Learning</h5>
                    <p class="feature-description">AI-powered course recommendations and personalized learning paths</p>
                    <div class="feature-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="feature-card-modern">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5 class="feature-title">Progress Analytics</h5>
                    <p class="feature-description">Real-time insights into your academic performance and growth</p>
                    <div class="feature-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="feature-card-modern">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h5 class="feature-title">Mobile First</h5>
                    <p class="feature-description">Access your education anywhere, anytime with our responsive design</p>
                    <div class="feature-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="feature-card-modern">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="feature-title">Community</h5>
                    <p class="feature-description">Connect with peers and teachers in our vibrant learning community</p>
                    <div class="feature-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modern CTA Section -->
@guest
<div class="cta-modern">
    <div class="container">
        <div class="cta-content text-center">
            <h2 class="cta-title">Ready to Transform Your Learning?</h2>
            <p class="cta-subtitle">Join thousands of students already using our platform</p>
            <div class="cta-buttons">
                <a href="{{ route('register') }}" class="btn-modern btn-primary btn-large">
                    <span>Start Your Journey</span>
                    <i class="fas fa-rocket"></i>
                </a>
                <a href="{{ route('login') }}" class="btn-modern btn-outline btn-large">
                    <span>Sign In</span>
                    <i class="fas fa-sign-in-alt"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endguest

<style>
/* Modern Hero Styles */
.modern-hero {
    min-height: 100vh;
    background: linear-gradient(135deg, #1a5f1a 0%, #2d7d32 25%, #388e3c 50%, #4caf50 75%, #66bb6a 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.hero-background {
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
    animation: float 6s ease-in-out infinite;
}

.shape-1 {
    width: 80px;
    height: 80px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 120px;
    height: 120px;
    top: 60%;
    right: 15%;
    animation-delay: 2s;
}

.shape-3 {
    width: 60px;
    height: 60px;
    bottom: 30%;
    left: 20%;
    animation-delay: 4s;
}

.shape-4 {
    width: 100px;
    height: 100px;
    top: 10%;
    right: 30%;
    animation-delay: 1s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.hero-content {
    position: relative;
    z-index: 2;
    color: white;
}

.badge-modern {
    display: inline-flex;
    align-items: center;
    padding: 8px 20px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50px;
    font-size: 14px;
    font-weight: 500;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.hero-title {
    font-size: clamp(3rem, 8vw, 6rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
}

.gradient-text {
    background: linear-gradient(45deg, #ffffff, #e8f5e8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-portal {
    font-weight: 300;
    opacity: 0.9;
}

.hero-subtitle {
    font-size: 1.25rem;
    line-height: 1.6;
    opacity: 0.9;
    margin-bottom: 2.5rem;
    max-width: 500px;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.btn-modern {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-modern.btn-primary {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

.btn-modern.btn-primary:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.btn-modern.btn-outline {
    background: transparent;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.5);
}

.btn-modern.btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
}

.btn-modern.btn-large {
    padding: 1.25rem 2.5rem;
    font-size: 1.1rem;
}

.hero-stats {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: white;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.8;
    color: white;
}

/* Modern Logo Styles */
.hero-visual {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo-container-modern {
    position: relative;
    text-align: center;
}

.logo-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: pulse 3s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
    50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.8; }
}

.logo-main {
    position: relative;
    z-index: 2;
}

.amis-logo-container {
    margin: 0 auto 2rem;
    position: relative;
}

.amis-logo-main {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(15px);
    animation: logoFloat 6s ease-in-out infinite;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

@keyframes logoFloat {
    0%, 100% { transform: translateY(0px) scale(1); }
    50% { transform: translateY(-10px) scale(1.05); }
}

.logo-text-modern {
    color: white;
}

.logo-student {
    font-size: 1.5rem;
    font-weight: 300;
    letter-spacing: 3px;
    margin-bottom: 0.5rem;
}

.logo-portal {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 1rem;
    background: linear-gradient(45deg, #ffffff, #e8f5e8);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.logo-school {
    font-size: 1.1rem;
    font-weight: 600;
    letter-spacing: 2px;
    margin-bottom: 0.5rem;
}

.logo-tagline {
    font-size: 0.9rem;
    opacity: 0.8;
    letter-spacing: 1px;
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.element {
    position: absolute;
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    backdrop-filter: blur(10px);
    animation: floatElement 8s ease-in-out infinite;
}

.element-1 {
    top: 10%;
    left: -10%;
    animation-delay: 0s;
}

.element-2 {
    top: 20%;
    right: -15%;
    animation-delay: 2s;
}

.element-3 {
    bottom: 30%;
    left: -5%;
    animation-delay: 4s;
}

.element-4 {
    bottom: 10%;
    right: -10%;
    animation-delay: 6s;
}

@keyframes floatElement {
    0%, 100% { transform: translateY(0px) translateX(0px); }
    25% { transform: translateY(-15px) translateX(10px); }
    50% { transform: translateY(-10px) translateX(-5px); }
    75% { transform: translateY(-20px) translateX(15px); }
}

/* Modern Features Section */
.features-modern {
    padding: 6rem 0;
    background: #f8f9fa;
}

.section-header {
    margin-bottom: 4rem;
}

.section-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.25rem;
    color: #6c757d;
    max-width: 600px;
    margin: 0 auto;
}

.feature-card-modern {
    background: white;
    padding: 2.5rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    height: 100%;
}

.feature-card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-green), var(--secondary-green));
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.feature-card-modern:hover::before {
    transform: scaleX(1);
}

.feature-card-modern:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: white;
    margin-bottom: 1.5rem;
}

.feature-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #2c3e50;
}

.feature-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.feature-arrow {
    color: var(--primary-green);
    font-size: 1.2rem;
    opacity: 0;
    transform: translateX(-10px);
    transition: all 0.3s ease;
}

.feature-card-modern:hover .feature-arrow {
    opacity: 1;
    transform: translateX(0);
}

/* Modern CTA Section */
.cta-modern {
    padding: 6rem 0;
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    color: white;
    text-align: center;
}

.cta-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1rem;
}

.cta-subtitle {
    font-size: 1.25rem;
    opacity: 0.9;
    margin-bottom: 2.5rem;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: stretch;
    }
    
    .btn-modern {
        justify-content: center;
    }
    
    .hero-stats {
        justify-content: center;
    }
    
    .logo-portal {
        font-size: 2.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
}
</style>
@endsection