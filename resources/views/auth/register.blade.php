@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-4">
                    <div class="mb-3">
                        <div class="amis-logo-register mx-auto">
                            <img src="{{ asset('images/logo/AMIS_Logo.png') }}" alt="AMIS Logo" class="register-logo-img">
                        </div>
                    </div>
                    <h4 class="mb-0">Student Registration</h4>
                    <p class="mb-0 opacity-75">Join Al Munawwara Islamic School</p>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user me-2 text-primary"></i>Full Name
                                </label>
                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                       placeholder="Enter your full name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2 text-primary"></i>Email Address
                                </label>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       placeholder="Enter your email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2 text-primary"></i>Password
                                </label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                           name="password" required autocomplete="new-password"
                                           placeholder="Create password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="password-confirm" class="form-label">
                                    <i class="fas fa-lock me-2 text-primary"></i>Confirm Password
                                </label>
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control form-control-lg" 
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="Confirm password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Fields for Islamic School -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="student_id" class="form-label">
                                    <i class="fas fa-id-card me-2 text-primary"></i>Student ID (Optional)
                                </label>
                                <input id="student_id" type="text" class="form-control form-control-lg" 
                                       name="student_id" value="{{ old('student_id') }}"
                                       placeholder="Enter student ID if available">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="grade_level" class="form-label">
                                    <i class="fas fa-graduation-cap me-2 text-primary"></i>Grade Level
                                </label>
                                <select id="grade_level" class="form-select form-select-lg" name="grade_level">
                                    <option value="">Select Grade Level</option>
                                    <option value="kindergarten">Kindergarten</option>
                                    <option value="grade_1">Grade 1</option>
                                    <option value="grade_2">Grade 2</option>
                                    <option value="grade_3">Grade 3</option>
                                    <option value="grade_4">Grade 4</option>
                                    <option value="grade_5">Grade 5</option>
                                    <option value="grade_6">Grade 6</option>
                                    <option value="grade_7">Grade 7</option>
                                    <option value="grade_8">Grade 8</option>
                                    <option value="grade_9">Grade 9</option>
                                    <option value="grade_10">Grade 10</option>
                                    <option value="grade_11">Grade 11</option>
                                    <option value="grade_12">Grade 12</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-primary">Terms and Conditions</a> and 
                                    <a href="#" class="text-primary">Privacy Policy</a> of Al Munawwara Islamic School
                                </label>
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-user-plus me-2"></i>Create Account
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="text-muted mb-0">
                                By registering, you agree to follow the Islamic values and principles of our school.
                            </p>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-light text-center py-3">
                    <p class="mb-0 text-muted">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-semibold">
                            Login Here
                        </a>
                    </p>
                </div>
            </div>

            <!-- Islamic Quote -->
            <div class="text-center mt-4">
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <blockquote class="blockquote text-muted">
                            <p class="mb-2">"And say: My Lord, increase me in knowledge."</p>
                            <footer class="blockquote-footer">
                                <cite title="Source Title">Quran 20:114</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.amis-logo-register {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
}

.register-logo-img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    object-fit: cover;
}

.card {
    border-radius: 15px;
    overflow: hidden;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 0.2rem rgba(45, 125, 50, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    border: none;
    font-weight: 600;
}

.btn-primary:hover {
    background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
    transform: translateY(-1px);
}

.form-check-input:checked {
    background-color: var(--primary-green);
    border-color: var(--primary-green);
}
</style>

<script>
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

document.getElementById('togglePasswordConfirm').addEventListener('click', function() {
    const password = document.getElementById('password-confirm');
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
</script>
@endsection