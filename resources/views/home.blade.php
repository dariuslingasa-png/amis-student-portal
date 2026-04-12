@extends('layouts.dashboard')

@section('content')
@if(Auth::user()->isRejected())
    <!-- Rejected Student View -->
    <style>
        .rejection-card {
            max-width: 600px;
            margin: 4rem auto;
            background: white;
            border-radius: 16px;
            padding: 3rem;
            text-align: center;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .rejection-icon {
            width: 80px;
            height: 80px;
            background: #fee2e2;
            color: #ef4444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1.5rem;
        }

        .rejection-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .rejection-message {
            font-size: 1rem;
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .contact-info {
            background: #f9fafb;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            color: #6b7280;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-item i {
            color: var(--primary-green);
        }
    </style>

    <div class="rejection-card">
        <div class="rejection-icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <h2 class="rejection-title">Enrollment Application Rejected</h2>
        <p class="rejection-message">
            We regret to inform you that your enrollment application has not been approved at this time. 
            This may be due to incomplete requirements or other administrative reasons.
        </p>
        <p class="rejection-message">
            Please contact the school administration for more information about your application status 
            and the steps you can take to reapply.
        </p>

        <div class="contact-info">
            <div style="font-weight: 600; color: #1f2937; margin-bottom: 1rem;">Contact Information</div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>(02) 8123-4567</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>admissions@amis.edu.ph</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Al Munawwara Islamic School, Manila</span>
            </div>
        </div>

        <a href="{{ route('logout') }}" class="btn btn-primary mt-4"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           style="background: var(--primary-green); border: none; padding: 0.75rem 2rem; border-radius: 10px; font-weight: 600;">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

@else
<style>
    .info-banner {
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
        border-radius: 16px;
        padding: 2rem 2.5rem;
        color: white;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 20px rgba(45, 125, 50, 0.2);
    }

    .banner-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }

    .banner-item {
        display: flex;
        flex-direction: column;
    }

    .banner-label {
        font-size: 0.8rem;
        opacity: 0.85;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .banner-value {
        font-size: 1.1rem;
        font-weight: 700;
    }

    .info-notice {
        background: #dbeafe;
        border: 1px solid #93c5fd;
        border-left: 4px solid #3b82f6;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .warning-notice {
        background: #fef3c7;
        border: 1px solid #fcd34d;
        border-left: 4px solid #f59e0b;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .notice-content {
        display: flex;
        gap: 1rem;
        align-items: start;
    }

    .notice-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .info-notice .notice-icon {
        background: #3b82f6;
    }

    .warning-notice .notice-icon {
        background: #f59e0b;
    }

    .notice-icon i {
        color: white;
        font-size: 1.25rem;
    }

    .notice-text h6 {
        font-weight: 700;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .info-notice .notice-text h6 {
        color: #1e40af;
    }

    .warning-notice .notice-text h6 {
        color: #92400e;
    }

    .notice-text p {
        font-size: 0.9rem;
        margin: 0;
        line-height: 1.5;
    }

    .info-notice .notice-text p {
        color: #1e3a8a;
    }

    .warning-notice .notice-text p {
        color: #78350f;
    }

    @media (max-width: 992px) {
        .banner-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .banner-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }

    .info-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .card-header-custom {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
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

    .payment-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.25rem;
        background: #f9fafb;
        border-radius: 12px;
        margin-bottom: 1rem;
        border: 1px solid #e5e7eb;
    }

    .payment-item:last-child {
        margin-bottom: 0;
    }

    .payment-info h4 {
        font-size: 1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .payment-info p {
        font-size: 0.85rem;
        color: #6b7280;
        margin: 0;
    }

    .payment-amount {
        text-align: right;
    }

    .amount-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-green);
        margin-bottom: 0.25rem;
    }

    .amount-status {
        font-size: 0.8rem;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-weight: 600;
        display: inline-block;
    }

    .status-paid {
        background: #dcfce7;
        color: #166534;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .status-overdue {
        background: #fee2e2;
        color: #991b1b;
    }

    .payment-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .payment-card {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.2s ease;
    }

    .payment-card:hover {
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .payment-card-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
    }

    .payment-card-label {
        font-size: 0.85rem;
        color: #6b7280;
        margin-bottom: 0.5rem;
    }

    .payment-card-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
    }

    .balance-card {
        background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
        border-radius: 12px;
        padding: 1.5rem;
        color: white;
        text-align: center;
    }

    .balance-card-label {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }

    .balance-card-value {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .balance-card-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
    }

    .balance-btn {
        background: rgba(255,255,255,0.25);
        color: white;
        border: 1px solid rgba(255,255,255,0.3);
        padding: 0.5rem 1.25rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .balance-btn:hover {
        background: white;
        color: var(--primary-green);
        border-color: white;
    }

    .pagination-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .page-btn {
        width: 32px;
        height: 32px;
        border: 1px solid #e5e7eb;
        background: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 0.85rem;
        font-weight: 600;
        color: #6b7280;
    }

    .page-btn:hover {
        background: var(--light-green);
        color: var(--primary-green);
        border-color: var(--primary-green);
    }

    .page-btn.active {
        background: var(--primary-green);
        color: white;
        border-color: var(--primary-green);
    }

    .page-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    @media (max-width: 768px) {
        .payment-grid {
            grid-template-columns: 1fr;
        }
    }

    .event-item {
        display: flex;
        gap: 1rem;
        padding: 1rem;
        background: #f9fafb;
        border-radius: 12px;
        margin-bottom: 1rem;
        border: 1px solid #e5e7eb;
        transition: all 0.2s ease;
    }

    .event-item:hover {
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .event-date {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: white;
        font-weight: 700;
    }

    .event-month {
        font-size: 0.7rem;
        text-transform: uppercase;
        opacity: 0.9;
    }

    .event-day {
        font-size: 1.5rem;
        line-height: 1;
    }

    .event-info {
        flex: 1;
    }

    .event-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .event-description {
        font-size: 0.85rem;
        color: #6b7280;
        margin-bottom: 0.5rem;
    }

    .event-time {
        font-size: 0.8rem;
        color: #9ca3af;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .event-time i {
        color: var(--primary-green);
    }

    .balance-summary {
        background: linear-gradient(135deg, #f59e0b, #f97316);
        border-radius: 16px;
        padding: 2rem;
        color: white;
        text-align: center;
        margin-bottom: 2rem;
    }

    .balance-label {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }

    .balance-amount {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .balance-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-balance {
        background: rgba(255,255,255,0.25);
        color: white;
        border: 1px solid rgba(255,255,255,0.3);
        padding: 0.65rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-balance:hover {
        background: white;
        color: #f59e0b;
        border-color: white;
        transform: translateY(-2px);
    }

    .btn-action {
        border: 2px solid var(--primary-green);
        color: var(--primary-green);
        background: white;
        border-radius: 10px;
        padding: 0.65rem;
        font-weight: 600;
        text-decoration: none;
        display: block;
        text-align: center;
        transition: all 0.2s ease;
    }

    .btn-action:hover {
        background: var(--primary-green);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(45, 125, 50, 0.2);
    }

    .payment-reminder {
        background: #fee2e2;
        border: 1px solid #fca5a5;
        border-left: 4px solid #ef4444;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .reminder-content {
        display: flex;
        gap: 1rem;
        align-items: start;
    }

    .reminder-icon {
        width: 40px;
        height: 40px;
        background: #ef4444;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .reminder-icon i {
        color: white;
        font-size: 1.25rem;
    }

    .reminder-text h6 {
        font-weight: 700;
        color: #991b1b;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .reminder-text p {
        font-size: 0.9rem;
        color: #7f1d1d;
        margin: 0;
        line-height: 1.5;
    }

    .privacy-notice {
        background: #f3f4f6;
        border: 1px solid #d1d5db;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        font-size: 0.85rem;
        color: #4b5563;
        text-align: center;
    }

    .privacy-notice a {
        color: var(--primary-green);
        font-weight: 600;
        text-decoration: none;
    }

    .privacy-notice a:hover {
        text-decoration: underline;
    }

    .enrollment-notice {
        background: #dcfce7;
        border: 1px solid #86efac;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .enrollment-notice h5 {
        color: #14532d;
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .enrollment-steps {
        display: grid;
        gap: 0.75rem;
    }

    .step-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        background: white;
        border-radius: 8px;
    }

    .step-number {
        width: 32px;
        height: 32px;
        background: #22c55e;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .step-text {
        color: #166534;
        font-weight: 500;
        font-size: 0.95rem;
    }
</style>

<!-- Student Info Banner -->
<div class="info-banner">
    <div class="banner-grid">
        <div class="banner-item">
            <div class="banner-label">ID Number</div>
            <div class="banner-value">{{ Auth::user()->student_id }}</div>
        </div>
        <div class="banner-item">
            <div class="banner-label">Student Name</div>
            <div class="banner-value">{{ Auth::user()->name }}</div>
        </div>
        <div class="banner-item">
            <div class="banner-label">Semester</div>
            <div class="banner-value">Second Semester</div>
        </div>
        <div class="banner-item">
            <div class="banner-label">Grade Level</div>
            <div class="banner-value">{{ Auth::user()->grade_level }}</div>
        </div>
    </div>
</div>

<!-- Data Privacy Notice -->
<div class="privacy-notice">
    <i class="fas fa-shield-alt me-2"></i>
    All Students Data Privacy Policy - Your information is protected under the Data Privacy Act of 2012. 
    <a href="#">Learn more</a>
</div>

@php
    $hasOverdue = Auth::user()->isOldStudent(); // Check if student has overdue payments
@endphp

@if($hasOverdue)
<!-- Warning Notice for Overdue -->
<div class="warning-notice">
    <div class="notice-content">
        <div class="notice-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="notice-text">
            <h6>Payment Overdue</h6>
            <p>You have overdue payments. Please settle your account immediately to avoid penalties and maintain access to school facilities. For any concerns, contact the finance office at finance@amis.edu.ph or call (02) 8123-4567.</p>
        </div>
    </div>
</div>
@else
<!-- Info Notice -->
<div class="info-notice">
    <div class="notice-content">
        <div class="notice-icon">
            <i class="fas fa-info-circle"></i>
        </div>
        <div class="notice-text">
            <h6>Reminder</h6>
            <p>For any concerns regarding payments, grades, or enrollment, please contact the school administration at admin@amis.edu.ph or visit the registrar's office during office hours (8:00 AM - 5:00 PM, Monday to Friday).</p>
        </div>
    </div>
</div>
@endif

<div class="row">
    <!-- Payment Information -->
    <div class="col-lg-6">
        <div class="info-card">
            <div class="card-header-custom">
                <h3 class="card-title-custom">
                    <i class="fas fa-money-bill-wave" style="color: var(--primary-green);"></i>
                    Payment Information
                </h3>
            </div>
            <div class="card-body-custom">
                <div class="payment-grid">
                    <div class="payment-card">
                        <div class="payment-card-icon" style="background: #dcfce7; color: #22c55e;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="payment-card-label">Exam Paid Until</div>
                        <div class="payment-card-value">5th Exam</div>
                    </div>

                    <div class="payment-card">
                        <div class="payment-card-icon" style="background: #dbeafe; color: #3b82f6;">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="payment-card-label">Special Permit</div>
                        <div class="payment-card-value">Active</div>
                    </div>
                </div>

                <div class="balance-card">
                    <div class="balance-card-label">Current Balance</div>
                    <div class="balance-card-value">
                        @if(Auth::user()->isOldStudent())
                            ₱18,500
                        @else
                            ₱20,000
                        @endif
                    </div>
                    <div class="balance-card-actions">
                        <a href="#" class="balance-btn">
                            <i class="fas fa-credit-card"></i>
                            Pay Now
                        </a>
                        <a href="#" class="balance-btn">
                            <i class="fas fa-history"></i>
                            History
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Calendar -->
    <div class="col-lg-6">
        <div class="info-card">
            <div class="card-header-custom">
                <h3 class="card-title-custom">
                    <i class="fas fa-calendar-alt" style="color: var(--primary-green);"></i>
                    Event Calendar
                </h3>
            </div>
            <div class="card-body-custom">
                <div id="eventContainer">
                    <!-- Events will be displayed here -->
                </div>
                
                <div class="pagination-controls">
                    <button class="page-btn" id="prevBtn" onclick="changePage(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="page-btn active" onclick="goToPage(1)">1</button>
                    <button class="page-btn" onclick="goToPage(2)">2</button>
                    <button class="page-btn" id="nextBtn" onclick="changePage(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const events = [
    // Page 1
    {
        month: 'Apr',
        day: '15',
        color: 'linear-gradient(135deg, #2d7d32, #388e3c)',
        title: 'Islamic Quiz Competition',
        description: 'School-wide competition for all grade levels',
        time: '9:00 AM - 12:00 PM',
        location: 'School Auditorium'
    },
    {
        month: 'Apr',
        day: '20',
        color: 'linear-gradient(135deg, #3b82f6, #2563eb)',
        title: 'Parent-Teacher Conference',
        description: 'Discuss student progress and academic performance',
        time: '1:00 PM - 5:00 PM',
        location: 'Various Classrooms'
    },
    {
        month: 'Apr',
        day: '25',
        color: 'linear-gradient(135deg, #f59e0b, #f97316)',
        title: 'Ramadan Iftar Gathering',
        description: 'Community iftar for students and faculty',
        time: '6:00 PM - 8:00 PM',
        location: 'School Cafeteria'
    },
    // Page 2
    {
        month: 'May',
        day: '01',
        color: 'linear-gradient(135deg, #8b5cf6, #7c3aed)',
        title: 'Final Examination Period',
        description: 'Second semester final exams begin',
        time: '8:00 AM - 5:00 PM',
        location: 'All Classrooms'
    },
    {
        month: 'May',
        day: '10',
        color: 'linear-gradient(135deg, #ec4899, #db2777)',
        title: 'Graduation Ceremony',
        description: 'Commencement exercises for graduating students',
        time: '3:00 PM - 6:00 PM',
        location: 'School Auditorium'
    },
    {
        month: 'May',
        day: '15',
        color: 'linear-gradient(135deg, #10b981, #059669)',
        title: 'Summer Break Begins',
        description: 'End of academic year, classes resume in June',
        time: 'All Day',
        location: 'School Holiday'
    }
];

let currentPage = 1;
const eventsPerPage = 3;

function displayEvents(page) {
    const start = (page - 1) * eventsPerPage;
    const end = start + eventsPerPage;
    const pageEvents = events.slice(start, end);
    
    const container = document.getElementById('eventContainer');
    container.innerHTML = '';
    
    pageEvents.forEach(event => {
        const eventHTML = `
            <div class="event-item">
                <div class="event-date" style="background: ${event.color};">
                    <div class="event-month">${event.month}</div>
                    <div class="event-day">${event.day}</div>
                </div>
                <div class="event-info">
                    <div class="event-title">${event.title}</div>
                    <div class="event-description">${event.description}</div>
                    <div class="event-time">
                        <i class="fas fa-clock"></i>
                        <span>${event.time}</span>
                        <i class="fas fa-map-marker-alt ms-2"></i>
                        <span>${event.location}</span>
                    </div>
                </div>
            </div>
        `;
        container.innerHTML += eventHTML;
    });
    
    updatePagination(page);
}

function updatePagination(page) {
    const totalPages = Math.ceil(events.length / eventsPerPage);
    
    // Update page buttons
    document.querySelectorAll('.page-btn').forEach((btn, index) => {
        if (index > 0 && index <= totalPages) {
            btn.classList.remove('active');
            if (index === page) {
                btn.classList.add('active');
            }
        }
    });
    
    // Update prev/next buttons
    document.getElementById('prevBtn').disabled = page === 1;
    document.getElementById('nextBtn').disabled = page === totalPages;
}

function changePage(direction) {
    const totalPages = Math.ceil(events.length / eventsPerPage);
    const newPage = currentPage + direction;
    
    if (newPage >= 1 && newPage <= totalPages) {
        currentPage = newPage;
        displayEvents(currentPage);
    }
}

function goToPage(page) {
    currentPage = page;
    displayEvents(currentPage);
}

// Initialize
displayEvents(currentPage);
</script>

<div class="row mt-4" style="display: none;">
    <!-- Hidden balance section - moved to payment card -->
</div>
@endif
@endsection
