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

    .announcement-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
        margin-bottom: 1.5rem;
        transition: all 0.2s ease;
    }

    .announcement-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }

    .announcement-header {
        padding: 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: start;
        gap: 1rem;
    }

    .announcement-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1.25rem;
    }

    .announcement-header-content {
        flex: 1;
    }

    .announcement-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .announcement-meta {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
        font-size: 0.85rem;
        color: #6b7280;
    }

    .announcement-meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .announcement-meta-item i {
        color: var(--primary-green);
    }

    .announcement-body {
        padding: 1.5rem;
    }

    .announcement-content {
        font-size: 0.95rem;
        color: #4b5563;
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    .announcement-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.35rem 0.85rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-important {
        background: #fee2e2;
        color: #991b1b;
    }

    .badge-general {
        background: #dbeafe;
        color: #1e40af;
    }

    .badge-event {
        background: #dcfce7;
        color: #166534;
    }

    .badge-academic {
        background: #fef3c7;
        color: #92400e;
    }

    .filter-tabs {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .filter-tab {
        padding: 0.65rem 1.25rem;
        border-radius: 10px;
        border: 2px solid #e5e7eb;
        background: white;
        color: #6b7280;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .filter-tab:hover {
        border-color: var(--primary-green);
        color: var(--primary-green);
    }

    .filter-tab.active {
        background: var(--primary-green);
        border-color: var(--primary-green);
        color: white;
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
</style>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">
        <i class="fas fa-bullhorn me-2" style="color: var(--primary-green);"></i>
        Announcements
    </h1>
    <p class="page-subtitle">Stay updated with the latest news and important information from AMIS</p>
</div>

<!-- Filter Tabs -->
<div class="filter-tabs">
    <button class="filter-tab active" onclick="filterAnnouncements('all')">
        <i class="fas fa-list me-2"></i>All Announcements
    </button>
    <button class="filter-tab" onclick="filterAnnouncements('important')">
        <i class="fas fa-exclamation-circle me-2"></i>Important
    </button>
    <button class="filter-tab" onclick="filterAnnouncements('academic')">
        <i class="fas fa-graduation-cap me-2"></i>Academic
    </button>
    <button class="filter-tab" onclick="filterAnnouncements('event')">
        <i class="fas fa-calendar-alt me-2"></i>Events
    </button>
    <button class="filter-tab" onclick="filterAnnouncements('general')">
        <i class="fas fa-info-circle me-2"></i>General
    </button>
</div>

<!-- Announcements List -->
<div id="announcementsList">
    <!-- Important Announcement -->
    <div class="announcement-card" data-category="important">
        <div class="announcement-header">
            <div class="announcement-icon" style="background: #fee2e2; color: #ef4444;">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="announcement-header-content">
                <h3 class="announcement-title">Payment Deadline Extension</h3>
                <div class="announcement-meta">
                    <div class="announcement-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>Posted: April 10, 2026</span>
                    </div>
                    <div class="announcement-meta-item">
                        <i class="fas fa-user"></i>
                        <span>Finance Office</span>
                    </div>
                    <span class="announcement-badge badge-important">
                        <i class="fas fa-star"></i>
                        Important
                    </span>
                </div>
            </div>
        </div>
        <div class="announcement-body">
            <div class="announcement-content">
                <p>Dear Students and Parents,</p>
                <p>Due to the recent circumstances, we are extending the payment deadline for the second semester tuition fees. The new deadline is now set to <strong>May 5, 2026</strong>. Please ensure all payments are settled by this date to avoid late fees.</p>
                <p>For payment concerns, please contact the Finance Office at finance@amis.edu.ph or call (02) 8123-4567.</p>
            </div>
        </div>
    </div>

    <!-- Academic Announcement -->
    <div class="announcement-card" data-category="academic">
        <div class="announcement-header">
            <div class="announcement-icon" style="background: #fef3c7; color: #f59e0b;">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="announcement-header-content">
                <h3 class="announcement-title">Final Examination Schedule Released</h3>
                <div class="announcement-meta">
                    <div class="announcement-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>Posted: April 8, 2026</span>
                    </div>
                    <div class="announcement-meta-item">
                        <i class="fas fa-user"></i>
                        <span>Registrar's Office</span>
                    </div>
                    <span class="announcement-badge badge-academic">
                        <i class="fas fa-book"></i>
                        Academic
                    </span>
                </div>
            </div>
        </div>
        <div class="announcement-body">
            <div class="announcement-content">
                <p>The final examination schedule for the Second Semester AY 2025-2026 is now available. Examinations will begin on <strong>May 1, 2026</strong> and conclude on <strong>May 10, 2026</strong>.</p>
                <p>Students are advised to check their individual schedules through the student portal. Please ensure you are prepared and arrive 15 minutes before your scheduled exam time.</p>
                <p>For any conflicts or concerns, please contact the Registrar's Office immediately.</p>
            </div>
        </div>
    </div>

    <!-- Event Announcement -->
    <div class="announcement-card" data-category="event">
        <div class="announcement-header">
            <div class="announcement-icon" style="background: #dcfce7; color: #22c55e;">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="announcement-header-content">
                <h3 class="announcement-title">Islamic Quiz Competition 2026</h3>
                <div class="announcement-meta">
                    <div class="announcement-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>Posted: April 5, 2026</span>
                    </div>
                    <div class="announcement-meta-item">
                        <i class="fas fa-user"></i>
                        <span>Student Affairs</span>
                    </div>
                    <span class="announcement-badge badge-event">
                        <i class="fas fa-trophy"></i>
                        Event
                    </span>
                </div>
            </div>
        </div>
        <div class="announcement-body">
            <div class="announcement-content">
                <p>Join us for the Annual Islamic Quiz Competition on <strong>April 15, 2026</strong> at the School Auditorium from 9:00 AM to 12:00 PM.</p>
                <p>This competition is open to all grade levels. Topics will cover Islamic History, Quran, Hadith, and Islamic Jurisprudence. Exciting prizes await the winners!</p>
                <p>Registration is now open. Please submit your registration form to the Student Affairs Office by April 12, 2026.</p>
            </div>
        </div>
    </div>

    <!-- General Announcement -->
    <div class="announcement-card" data-category="general">
        <div class="announcement-header">
            <div class="announcement-icon" style="background: #dbeafe; color: #3b82f6;">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="announcement-header-content">
                <h3 class="announcement-title">Library Hours Extended During Exam Period</h3>
                <div class="announcement-meta">
                    <div class="announcement-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>Posted: April 3, 2026</span>
                    </div>
                    <div class="announcement-meta-item">
                        <i class="fas fa-user"></i>
                        <span>Library Services</span>
                    </div>
                    <span class="announcement-badge badge-general">
                        <i class="fas fa-bell"></i>
                        General
                    </span>
                </div>
            </div>
        </div>
        <div class="announcement-body">
            <div class="announcement-content">
                <p>To support students during the final examination period, the library will extend its operating hours starting April 25, 2026.</p>
                <p><strong>Extended Hours:</strong></p>
                <ul>
                    <li>Monday to Friday: 7:00 AM - 9:00 PM</li>
                    <li>Saturday: 8:00 AM - 6:00 PM</li>
                    <li>Sunday: 9:00 AM - 5:00 PM</li>
                </ul>
                <p>Please bring your student ID for entry. Study rooms are available on a first-come, first-served basis.</p>
            </div>
        </div>
    </div>

    <!-- Event Announcement -->
    <div class="announcement-card" data-category="event">
        <div class="announcement-header">
            <div class="announcement-icon" style="background: #fce7f3; color: #ec4899;">
                <i class="fas fa-mosque"></i>
            </div>
            <div class="announcement-header-content">
                <h3 class="announcement-title">Ramadan Iftar Gathering</h3>
                <div class="announcement-meta">
                    <div class="announcement-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>Posted: April 1, 2026</span>
                    </div>
                    <div class="announcement-meta-item">
                        <i class="fas fa-user"></i>
                        <span>Islamic Affairs Office</span>
                    </div>
                    <span class="announcement-badge badge-event">
                        <i class="fas fa-moon"></i>
                        Event
                    </span>
                </div>
            </div>
        </div>
        <div class="announcement-body">
            <div class="announcement-content">
                <p>Assalamu Alaikum! You are cordially invited to our community Iftar gathering on <strong>April 25, 2026</strong> at the School Cafeteria from 6:00 PM to 8:00 PM.</p>
                <p>Join us in breaking fast together as a community. This is a wonderful opportunity to strengthen our bonds and share the blessings of Ramadan.</p>
                <p>Please RSVP by April 20, 2026 to help us with meal preparations. Contact the Islamic Affairs Office for more details.</p>
            </div>
        </div>
    </div>
</div>

<script>
function filterAnnouncements(category) {
    const cards = document.querySelectorAll('.announcement-card');
    const tabs = document.querySelectorAll('.filter-tab');
    
    // Update active tab
    tabs.forEach(tab => tab.classList.remove('active'));
    event.target.closest('.filter-tab').classList.add('active');
    
    // Filter cards
    let visibleCount = 0;
    cards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });
    
    // Show empty state if no results
    const existingEmpty = document.querySelector('.empty-state');
    if (existingEmpty) {
        existingEmpty.remove();
    }
    
    if (visibleCount === 0) {
        const emptyState = document.createElement('div');
        emptyState.className = 'empty-state';
        emptyState.innerHTML = `
            <i class="fas fa-inbox"></i>
            <p>No announcements found in this category.</p>
        `;
        document.getElementById('announcementsList').appendChild(emptyState);
    }
}
</script>
@endsection
