@extends('layouts.dashboard')

@section('content')
<style>
    .page-header {
        margin-bottom: 2rem;
    }

    .page-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        font-size: 0.95rem;
        color: #6b7280;
    }

    .enrollment-status-card {
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
        border-radius: 16px;
        padding: 2rem;
        color: white;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(45, 125, 50, 0.2);
    }

    .status-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .status-icon {
        width: 60px;
        height: 60px;
        background: rgba(255,255,255,0.25);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
    }

    .status-info h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .status-info p {
        font-size: 0.9rem;
        opacity: 0.9;
        margin: 0;
    }

    .enrollment-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .card-header-custom {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .card-title-custom {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .card-body-custom {
        padding: 1.5rem;
    }

    .subject-table {
        width: 100%;
        border-collapse: collapse;
    }

    .subject-table th {
        background: #f9fafb;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: #6b7280;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .subject-table td {
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
        color: #4b5563;
    }

    .subject-table tr:last-child td {
        border-bottom: none;
    }

    .subject-table tr:hover {
        background: #f9fafb;
    }

    .grade-badge {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .grade-pass {
        background: #dcfce7;
        color: #166534;
    }

    .grade-fail {
        background: #fee2e2;
        color: #991b1b;
    }

    .grade-excellent {
        background: #dbeafe;
        color: #1e40af;
    }

    .enrollment-form {
        display: grid;
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        font-size: 0.9rem;
    }

    .form-input {
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        font-size: 0.95rem;
        transition: all 0.2s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary-green);
        box-shadow: 0 0 0 3px rgba(45, 125, 50, 0.1);
    }

    .form-select {
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        font-size: 0.95rem;
        background: white;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .form-select:focus {
        outline: none;
        border-color: var(--primary-green);
        box-shadow: 0 0 0 3px rgba(45, 125, 50, 0.1);
    }

    .checkbox-group {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        background: #f9fafb;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .checkbox-item:hover {
        background: white;
        border-color: var(--primary-green);
    }

    .checkbox-item input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    .checkbox-label {
        flex: 1;
        font-weight: 500;
        color: #374151;
    }

    .checkbox-units {
        font-size: 0.85rem;
        color: #6b7280;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(45, 125, 50, 0.3);
    }

    .alert-warning {
        background: #fef3c7;
        border: 1px solid #fcd34d;
        border-left: 4px solid #f59e0b;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 2rem;
    }

    .alert-warning-content {
        display: flex;
        gap: 1rem;
        align-items: start;
    }

    .alert-icon {
        width: 40px;
        height: 40px;
        background: #f59e0b;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: white;
        font-size: 1.25rem;
    }

    .alert-text h6 {
        font-weight: 700;
        color: #92400e;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .alert-text p {
        font-size: 0.9rem;
        color: #78350f;
        margin: 0;
        line-height: 1.5;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .info-item {
        padding: 1rem;
        background: #f9fafb;
        border-radius: 10px;
    }

    .info-label {
        font-size: 0.8rem;
        color: #6b7280;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-size: 1rem;
        font-weight: 600;
        color: #1f2937;
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-user-plus me-2" style="color: var(--primary-green);"></i>
        Enrollment
    </h1>
    <p class="page-subtitle">Manage your enrollment and subject registration</p>
</div>

@if(Auth::user()->is_dropout)
    <!-- Dropout Status -->
    <div class="enrollment-status-card" style="background: linear-gradient(135deg, #ef4444, #dc2626);">
        <div class="status-header">
            <div class="status-icon">
                <i class="fas fa-user-times"></i>
            </div>
            <div class="status-info">
                <h2>Dropout Status</h2>
                <p>Your enrollment has been discontinued</p>
            </div>
        </div>
        <div style="background: rgba(255,255,255,0.15); padding: 1.5rem; border-radius: 12px;">
            <p style="margin: 0; line-height: 1.6;">
                Your student status is currently marked as dropout. To re-enroll, please contact the registrar's office 
                to discuss your options and requirements for re-admission. You may need to settle any outstanding balances 
                and complete necessary documentation.
            </p>
        </div>
    </div>

    @if(Auth::user()->has_subjects)
    <!-- Previous Subjects -->
    <div class="enrollment-card">
        <div class="card-header-custom">
            <h3 class="card-title-custom">
                <i class="fas fa-history" style="color: #6b7280;"></i>
                Previous Enrolled Subjects
            </h3>
        </div>
        <div class="card-body-custom">
            <table class="subject-table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Units</th>
                        <th>Schedule</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(json_decode(Auth::user()->enrolled_subjects, true) as $subject)
                    <tr>
                        <td><strong>{{ $subject['code'] }}</strong></td>
                        <td>{{ $subject['name'] }}</td>
                        <td>{{ $subject['units'] }}</td>
                        <td>
                            <span style="color: #6b7280;">
                                <i class="fas fa-clock"></i> {{ $subject['schedule'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

@elseif(Auth::user()->isOldStudent() && Auth::user()->has_subjects)
    <!-- Old Student with Subjects -->
    <div class="enrollment-status-card">
        <div class="status-header">
            <div class="status-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="status-info">
                <h2>Enrolled Student</h2>
                <p>You are currently enrolled for Second Semester AY 2025-2026</p>
            </div>
        </div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Student Type</div>
                <div class="info-value">{{ Auth::user()->student_type }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Grade Level</div>
                <div class="info-value">{{ Auth::user()->grade_level }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Total Units</div>
                <div class="info-value">18 Units</div>
            </div>
            <div class="info-item">
                <div class="info-label">Enrollment Status</div>
                <div class="info-value" style="color: #22c55e;">Active</div>
            </div>
        </div>
    </div>

    <!-- Enrolled Subjects -->
    <div class="enrollment-card">
        <div class="card-header-custom">
            <h3 class="card-title-custom">
                <i class="fas fa-book-open" style="color: var(--primary-green);"></i>
                Subjects & Schedule
            </h3>
        </div>
        <div class="card-body-custom">
            <table class="subject-table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Units</th>
                        <th>Schedule</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(json_decode(Auth::user()->enrolled_subjects, true) as $subject)
                    <tr>
                        <td><strong>{{ $subject['code'] }}</strong></td>
                        <td>{{ $subject['name'] }}</td>
                        <td>{{ $subject['units'] }}</td>
                        <td>
                            <span style="color: var(--primary-green); font-weight: 600;">
                                <i class="fas fa-clock"></i> {{ $subject['schedule'] }}
                            </span>
                        </td>
                        <td>
                            <span style="color: #6b7280;">
                                <i class="fas fa-door-open"></i> {{ $subject['room'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@else
    <!-- New Student or Transferee - Enrollment Form -->
    <div class="enrollment-status-card">
        <div class="status-header">
            <div class="status-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="status-info">
                <h2>{{ Auth::user()->isNewStudent() ? 'New Student' : 'Transferee' }} Enrollment</h2>
                <p>Review your auto-assigned subjects for {{ Auth::user()->grade_level }}</p>
            </div>
        </div>
    </div>

    @if(Auth::user()->isTransferee())
    <div class="alert-warning">
        <div class="alert-warning-content">
            <div class="alert-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="alert-text">
                <h6>Transferee Requirements</h6>
                <p>As a transferee student, please ensure you have submitted your transfer credentials and previous school records to the registrar's office before completing your enrollment.</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Auto-Assigned Subjects -->
    <div class="enrollment-card">
        <div class="card-header-custom">
            <h3 class="card-title-custom">
                <i class="fas fa-book-open" style="color: var(--primary-green);"></i>
                Auto-Assigned Subjects for {{ Auth::user()->grade_level }}
            </h3>
        </div>
        <div class="card-body-custom">
            <div style="background: #dbeafe; border: 1px solid #93c5fd; border-radius: 12px; padding: 1rem; margin-bottom: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-info-circle" style="color: #1e40af; font-size: 1.25rem;"></i>
                    <p style="margin: 0; color: #1e3a8a; font-size: 0.9rem;">
                        Subjects are automatically assigned based on your grade level. These are the required subjects for your curriculum.
                    </p>
                </div>
            </div>

            <table class="subject-table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Units</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Define subjects based on grade level
                        $gradeLevel = Auth::user()->grade_level;
                        $subjects = [];
                        
                        if (str_contains($gradeLevel, 'Grade 6') || str_contains($gradeLevel, 'Grade 7') || str_contains($gradeLevel, 'Grade 8')) {
                            // Junior High School Subjects
                            $subjects = [
                                ['code' => 'QUR101', 'name' => 'Quran & Tajweed', 'units' => 3],
                                ['code' => 'ISH201', 'name' => 'Islamic History', 'units' => 3],
                                ['code' => 'ARB301', 'name' => 'Arabic Language', 'units' => 3],
                                ['code' => 'FIQ401', 'name' => 'Fiqh & Jurisprudence', 'units' => 3],
                                ['code' => 'MAT301', 'name' => 'Mathematics', 'units' => 3],
                                ['code' => 'SCI301', 'name' => 'Science', 'units' => 3],
                                ['code' => 'ENG301', 'name' => 'English Language', 'units' => 3],
                                ['code' => 'FIL301', 'name' => 'Filipino Language', 'units' => 3],
                            ];
                        } elseif (str_contains($gradeLevel, 'Grade 9') || str_contains($gradeLevel, 'Grade 10')) {
                            // Senior Junior High School Subjects
                            $subjects = [
                                ['code' => 'QUR102', 'name' => 'Quran & Tajweed II', 'units' => 3],
                                ['code' => 'ISH202', 'name' => 'Islamic Civilization', 'units' => 3],
                                ['code' => 'ARB302', 'name' => 'Advanced Arabic', 'units' => 3],
                                ['code' => 'FIQ402', 'name' => 'Islamic Jurisprudence', 'units' => 3],
                                ['code' => 'MAT401', 'name' => 'Advanced Mathematics', 'units' => 3],
                                ['code' => 'SCI401', 'name' => 'Physical Science', 'units' => 3],
                                ['code' => 'ENG401', 'name' => 'English Literature', 'units' => 3],
                                ['code' => 'SOC401', 'name' => 'Social Studies', 'units' => 3],
                            ];
                        } else {
                            // Senior High School (Grade 11-12) Subjects
                            $subjects = [
                                ['code' => 'QUR201', 'name' => 'Quranic Studies', 'units' => 3],
                                ['code' => 'ISH301', 'name' => 'Contemporary Islamic Issues', 'units' => 3],
                                ['code' => 'ARB401', 'name' => 'Arabic Communication', 'units' => 3],
                                ['code' => 'FIQ501', 'name' => 'Comparative Fiqh', 'units' => 3],
                                ['code' => 'RES401', 'name' => 'Research Methods', 'units' => 3],
                                ['code' => 'ENG501', 'name' => 'Academic English', 'units' => 3],
                            ];
                            
                            // Add strand-specific subjects
                            if (str_contains($gradeLevel, 'STEM')) {
                                $subjects = array_merge($subjects, [
                                    ['code' => 'STEM101', 'name' => 'Pre-Calculus', 'units' => 3],
                                    ['code' => 'STEM102', 'name' => 'General Chemistry', 'units' => 3],
                                ]);
                            } elseif (str_contains($gradeLevel, 'ABM')) {
                                $subjects = array_merge($subjects, [
                                    ['code' => 'ABM101', 'name' => 'Business Mathematics', 'units' => 3],
                                    ['code' => 'ABM102', 'name' => 'Fundamentals of Accounting', 'units' => 3],
                                ]);
                            } elseif (str_contains($gradeLevel, 'HUMSS')) {
                                $subjects = array_merge($subjects, [
                                    ['code' => 'HUMSS101', 'name' => 'Philippine Politics', 'units' => 3],
                                    ['code' => 'HUMSS102', 'name' => 'Creative Writing', 'units' => 3],
                                ]);
                            } elseif (str_contains($gradeLevel, 'ICT')) {
                                $subjects = array_merge($subjects, [
                                    ['code' => 'ICT101', 'name' => 'Computer Programming', 'units' => 3],
                                    ['code' => 'ICT102', 'name' => 'Web Development', 'units' => 3],
                                ]);
                            }
                        }
                        
                        $totalUnits = array_sum(array_column($subjects, 'units'));
                    @endphp

                    @foreach($subjects as $subject)
                    <tr>
                        <td><strong>{{ $subject['code'] }}</strong></td>
                        <td>{{ $subject['name'] }}</td>
                        <td>{{ $subject['units'] }}</td>
                        <td>
                            <span class="grade-badge" style="background: #dcfce7; color: #166534;">
                                <i class="fas fa-check-circle"></i> Assigned
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="background: #f9fafb; padding: 1.5rem; border-radius: 10px; margin-top: 1.5rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <span style="font-weight: 600; color: #6b7280;">Total Units:</span>
                    <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary-green);">{{ $totalUnits }} Units</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-weight: 600; color: #6b7280;">Total Subjects:</span>
                    <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary-green);">{{ count($subjects) }} Subjects</span>
                </div>
            </div>

            <form method="POST" action="#" style="margin-top: 1.5rem;">
                @csrf
                <div style="background: #fef3c7; border: 1px solid #fcd34d; border-radius: 12px; padding: 1.25rem; margin-bottom: 1.5rem;">
                    <div style="display: flex; align-items: start; gap: 1rem;">
                        <i class="fas fa-exclamation-triangle" style="color: #f59e0b; font-size: 1.25rem; margin-top: 0.25rem;"></i>
                        <div>
                            <p style="margin: 0; color: #78350f; font-size: 0.9rem; line-height: 1.6;">
                                By clicking "Confirm Enrollment", you agree to enroll in all the subjects listed above. 
                                Please ensure you have reviewed the subject list carefully. Once confirmed, you will be officially enrolled for the semester.
                            </p>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-check-circle me-2"></i>
                    Confirm Enrollment
                </button>
            </form>
        </div>
    </div>
@endif
@endsection
