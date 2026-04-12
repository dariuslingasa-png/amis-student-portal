@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">
                        <i class="fas fa-book-open me-2 text-primary"></i>
                        My Courses
                    </h2>
                    <p class="text-muted mb-0">Manage your enrolled courses and track your progress</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-filter me-2"></i>Filter Courses
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Stats -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card text-center border-primary">
                <div class="card-body">
                    <i class="fas fa-book fa-2x text-primary mb-2"></i>
                    <h4 class="text-primary">6</h4>
                    <p class="mb-0">Active Courses</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-success">
                <div class="card-body">
                    <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                    <h4 class="text-success">4</h4>
                    <p class="mb-0">Completed</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-warning">
                <div class="card-body">
                    <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                    <h4 class="text-warning">2</h4>
                    <p class="mb-0">In Progress</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-info">
                <div class="card-body">
                    <i class="fas fa-star fa-2x text-info mb-2"></i>
                    <h4 class="text-info">85%</h4>
                    <p class="mb-0">Avg. Grade</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="row g-4">
        <!-- Quran & Tajweed -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">
                            <i class="fas fa-quran me-2"></i>
                            Quran & Tajweed
                        </h6>
                        <span class="badge bg-light text-primary">Active</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">Instructor</small>
                        <p class="mb-0 fw-semibold">Ustadh Ahmad Hassan</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Schedule</small>
                        <p class="mb-0">Mon, Wed, Fri - 10:00 AM</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Progress</small>
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                        <small class="text-muted">75% Complete</small>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Current Grade</small>
                        <h5 class="text-success mb-0">A- (88%)</h5>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary btn-sm flex-fill">
                            <i class="fas fa-play me-1"></i>Continue
                        </button>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Islamic History -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-info text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">
                            <i class="fas fa-mosque me-2"></i>
                            Islamic History
                        </h6>
                        <span class="badge bg-light text-info">Active</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">Instructor</small>
                        <p class="mb-0 fw-semibold">Dr. Fatima Al-Zahra</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Schedule</small>
                        <p class="mb-0">Tue, Thu - 2:00 PM</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Progress</small>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 60%"></div>
                        </div>
                        <small class="text-muted">60% Complete</small>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Current Grade</small>
                        <h5 class="text-success mb-0">B+ (85%)</h5>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex gap-2">
                        <button class="btn btn-info btn-sm flex-fill">
                            <i class="fas fa-play me-1"></i>Continue
                        </button>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Arabic Language -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-warning text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">
                            <i class="fas fa-language me-2"></i>
                            Arabic Language
                        </h6>
                        <span class="badge bg-light text-warning">Active</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">Instructor</small>
                        <p class="mb-0 fw-semibold">Ustadh Omar Malik</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Schedule</small>
                        <p class="mb-0">Mon, Wed - 11:00 AM</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Progress</small>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 45%"></div>
                        </div>
                        <small class="text-muted">45% Complete</small>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Current Grade</small>
                        <h5 class="text-primary mb-0">B (82%)</h5>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex gap-2">
                        <button class="btn btn-warning btn-sm flex-fill">
                            <i class="fas fa-play me-1"></i>Continue
                        </button>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fiqh & Jurisprudence -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-danger text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">
                            <i class="fas fa-balance-scale me-2"></i>
                            Fiqh & Jurisprudence
                        </h6>
                        <span class="badge bg-light text-danger">Active</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">Instructor</small>
                        <p class="mb-0 fw-semibold">Sheikh Abdullah Rahman</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Schedule</small>
                        <p class="mb-0">Thu - 3:00 PM</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Progress</small>
                        <div class="progress">
                            <div class="progress-bar bg-danger" style="width: 30%"></div>
                        </div>
                        <small class="text-muted">30% Complete</small>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Current Grade</small>
                        <h5 class="text-success mb-0">A (90%)</h5>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex gap-2">
                        <button class="btn btn-danger btn-sm flex-fill">
                            <i class="fas fa-play me-1"></i>Continue
                        </button>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hadith Studies -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">
                            <i class="fas fa-scroll me-2"></i>
                            Hadith Studies
                        </h6>
                        <span class="badge bg-light text-success">Active</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">Instructor</small>
                        <p class="mb-0 fw-semibold">Dr. Yusuf Ibrahim</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Schedule</small>
                        <p class="mb-0">Fri - 1:00 PM</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Progress</small>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 55%"></div>
                        </div>
                        <small class="text-muted">55% Complete</small>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Current Grade</small>
                        <h5 class="text-success mb-0">A- (87%)</h5>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex gap-2">
                        <button class="btn btn-success btn-sm flex-fill">
                            <i class="fas fa-play me-1"></i>Continue
                        </button>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Islamic Ethics -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">
                            <i class="fas fa-heart me-2"></i>
                            Islamic Ethics
                        </h6>
                        <span class="badge bg-light text-secondary">Active</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">Instructor</small>
                        <p class="mb-0 fw-semibold">Sister Aisha Mahmoud</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Schedule</small>
                        <p class="mb-0">Sat - 10:00 AM</p>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Progress</small>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" style="width: 70%"></div>
                        </div>
                        <small class="text-muted">70% Complete</small>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted">Current Grade</small>
                        <h5 class="text-success mb-0">A (92%)</h5>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="d-flex gap-2">
                        <button class="btn btn-secondary btn-sm flex-fill">
                            <i class="fas fa-play me-1"></i>Continue
                        </button>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection