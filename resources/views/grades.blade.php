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

    .grades-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .card-header-custom {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
        color: white;
    }

    .card-title-custom {
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .card-body-custom {
        padding: 0;
    }

    .grades-table {
        width: 100%;
        border-collapse: collapse;
    }

    .grades-table th {
        background: #f9fafb;
        padding: 1rem;
        text-align: center;
        font-weight: 600;
        color: #6b7280;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e5e7eb;
    }

    .grades-table th:first-child {
        text-align: left;
    }

    .grades-table td {
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
        text-align: center;
        color: #4b5563;
    }

    .grades-table td:first-child {
        text-align: left;
        font-weight: 600;
        color: #1f2937;
    }

    .grades-table tr:last-child td {
        border-bottom: none;
    }

    .grades-table tbody tr:hover {
        background: #f9fafb;
    }

    .grade-value {
        font-weight: 700;
        font-size: 1rem;
    }

    .grade-pass {
        color: #22c55e;
    }

    .grade-fail {
        color: #ef4444;
    }

    .grade-excellent {
        color: #3b82f6;
    }

    .final-grade-col {
        background: #f0fdf4;
        font-weight: 700;
    }

    .remarks-badge {
        display: inline-block;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .remarks-passed {
        background: #dcfce7;
        color: #166534;
    }

    .remarks-failed {
        background: #fee2e2;
        color: #991b1b;
    }

    .summary-card {
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
        border-radius: 16px;
        padding: 2rem;
        color: white;
        margin-bottom: 2rem;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .summary-item {
        text-align: center;
    }

    .summary-label {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }

    .summary-value {
        font-size: 2.5rem;
        font-weight: 700;
    }

    .info-notice {
        background: #dbeafe;
        border: 1px solid #93c5fd;
        border-left: 4px solid #3b82f6;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 2rem;
    }

    .info-notice-content {
        display: flex;
        gap: 1rem;
        align-items: start;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        background: #3b82f6;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: white;
        font-size: 1.25rem;
    }

    .info-text {
        flex: 1;
    }

    .info-text h6 {
        font-weight: 700;
        color: #1e40af;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .info-text p {
        font-size: 0.9rem;
        color: #1e3a8a;
        margin: 0;
        line-height: 1.5;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #9ca3af;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    .empty-state p {
        font-size: 1rem;
        margin: 0;
    }

    @media (max-width: 768px) {
        .summary-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .grades-table {
            font-size: 0.85rem;
        }

        .grades-table th,
        .grades-table td {
            padding: 0.75rem 0.5rem;
        }
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-chart-line me-2" style="color: var(--primary-green);"></i>
        Grades - {{ $selectedGrade ?? Auth::user()->grade_level }}
    </h1>
    <p class="page-subtitle">View your academic performance per quarter</p>
</div>

@if($grades->isEmpty())
    <!-- No Grades Available -->
    <div class="info-notice">
        <div class="info-notice-content">
            <div class="info-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="info-text">
                <h6>No Grades Available</h6>
                <p>Grades are not yet available. Please check back later or contact your teacher for more information.</p>
            </div>
        </div>
    </div>

    <div class="empty-state">
        <i class="fas fa-clipboard-list"></i>
        <p>No grades to display at this time.</p>
    </div>
@else
    <!-- Grades Summary -->
    <div class="summary-card">
        <div class="summary-grid">
            <div class="summary-item">
                <div class="summary-label">General Average</div>
                <div class="summary-value">
                    {{ number_format($grades->avg('final_grade'), 2) }}%
                </div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Total Subjects</div>
                <div class="summary-value">{{ $grades->count() }}</div>
            </div>
            <div class="summary-item">
                <div class="summary-label">Passed Subjects</div>
                <div class="summary-value">{{ $grades->where('remarks', 'PASSED')->count() }}</div>
            </div>
        </div>
    </div>

    <!-- Info Notice -->
    <div class="info-notice">
        <div class="info-notice-content">
            <div class="info-icon">
                <i class="fas fa-lock"></i>
            </div>
            <div class="info-text">
                <h6>Read-Only Grades</h6>
                <p>Grades are encoded by your teachers and school administrators. If you have any concerns about your grades, please contact your subject teacher or the registrar's office.</p>
            </div>
        </div>
    </div>

    <!-- Grades Table -->
    <div class="grades-card">
        <div class="card-header-custom">
            <h3 class="card-title-custom">
                <i class="fas fa-table"></i>
                Quarterly Grades - Second Semester AY 2025-2026
            </h3>
        </div>
        <div class="card-body-custom">
            <div style="overflow-x: auto;">
                <table class="grades-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Q1</th>
                            <th>Q2</th>
                            <th>Q3</th>
                            <th>Q4</th>
                            <th>Final Grade</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grades as $grade)
                        <tr>
                            <td>
                                <div><strong>{{ $grade->subject_code }}</strong></div>
                                <div style="font-size: 0.85rem; color: #6b7280; font-weight: normal;">{{ $grade->subject_name }}</div>
                            </td>
                            <td>
                                @if($grade->q1_grade)
                                    <span class="grade-value {{ $grade->q1_grade >= 90 ? 'grade-excellent' : ($grade->q1_grade >= 75 ? 'grade-pass' : 'grade-fail') }}">
                                        {{ number_format($grade->q1_grade, 0) }}
                                    </span>
                                @else
                                    <span style="color: #9ca3af;">-</span>
                                @endif
                            </td>
                            <td>
                                @if($grade->q2_grade)
                                    <span class="grade-value {{ $grade->q2_grade >= 90 ? 'grade-excellent' : ($grade->q2_grade >= 75 ? 'grade-pass' : 'grade-fail') }}">
                                        {{ number_format($grade->q2_grade, 0) }}
                                    </span>
                                @else
                                    <span style="color: #9ca3af;">-</span>
                                @endif
                            </td>
                            <td>
                                @if($grade->q3_grade)
                                    <span class="grade-value {{ $grade->q3_grade >= 90 ? 'grade-excellent' : ($grade->q3_grade >= 75 ? 'grade-pass' : 'grade-fail') }}">
                                        {{ number_format($grade->q3_grade, 0) }}
                                    </span>
                                @else
                                    <span style="color: #9ca3af;">-</span>
                                @endif
                            </td>
                            <td>
                                @if($grade->q4_grade)
                                    <span class="grade-value {{ $grade->q4_grade >= 90 ? 'grade-excellent' : ($grade->q4_grade >= 75 ? 'grade-pass' : 'grade-fail') }}">
                                        {{ number_format($grade->q4_grade, 0) }}
                                    </span>
                                @else
                                    <span style="color: #9ca3af;">-</span>
                                @endif
                            </td>
                            <td class="final-grade-col">
                                @if($grade->final_grade)
                                    <span class="grade-value {{ $grade->final_grade >= 90 ? 'grade-excellent' : ($grade->final_grade >= 75 ? 'grade-pass' : 'grade-fail') }}">
                                        {{ number_format($grade->final_grade, 2) }}
                                    </span>
                                @else
                                    <span style="color: #9ca3af;">-</span>
                                @endif
                            </td>
                            <td>
                                @if($grade->remarks)
                                    <span class="remarks-badge {{ $grade->remarks === 'PASSED' ? 'remarks-passed' : 'remarks-failed' }}">
                                        {{ $grade->remarks }}
                                    </span>
                                @else
                                    <span style="color: #9ca3af;">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Grading Legend -->
    <div style="background: #f9fafb; border-radius: 12px; padding: 1.5rem; margin-top: 2rem;">
        <h6 style="font-weight: 700; color: #1f2937; margin-bottom: 1rem;">Grading Scale</h6>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 12px; height: 12px; background: #3b82f6; border-radius: 50%;"></div>
                <span style="font-size: 0.9rem; color: #4b5563;"><strong>90-100:</strong> Excellent</span>
            </div>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 12px; height: 12px; background: #22c55e; border-radius: 50%;"></div>
                <span style="font-size: 0.9rem; color: #4b5563;"><strong>75-89:</strong> Passed</span>
            </div>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 12px; height: 12px; background: #ef4444; border-radius: 50%;"></div>
                <span style="font-size: 0.9rem; color: #4b5563;"><strong>Below 75:</strong> Failed</span>
            </div>
        </div>
    </div>
@endif
@endsection
