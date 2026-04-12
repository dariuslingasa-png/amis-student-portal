<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Student 1: NEW STUDENT - Grade 7 - Not yet enrolled
        User::firstOrCreate(
            ['email' => 'newstudent@amis.edu.ph'],
            [
                'name' => 'Ahmad Ibrahim',
                'student_id' => 'AMIS-2026-001',
                'password' => bcrypt('123'),
                'student_type' => 'NEW STUDENT',
                'enrollment_status' => 'APPROVED',
                'has_payment' => true,
                'grade_level' => 'Grade 7',
                'contact_number' => '09234567890',
                'address' => '456 Rizal Ave, Quezon City',
                'is_enrolled' => false,
                'has_subjects' => false,
                'is_dropout' => false,
                'enrolled_subjects' => null,
            ]
        );

        // Student 2: OLD STUDENT - Grade 11 STEM - Enrolled with subjects and grades
        $oldStudent = User::firstOrCreate(
            ['email' => 'oldstudent@amis.edu.ph'],
            [
                'name' => 'Fatima Abdullah',
                'student_id' => 'AMIS-2025-150',
                'password' => bcrypt('123'),
                'student_type' => 'OLD STUDENT',
                'enrollment_status' => 'APPROVED',
                'has_payment' => true,
                'grade_level' => 'Grade 11 - STEM',
                'contact_number' => '09345678901',
                'address' => '789 Quezon Blvd, Makati City',
                'is_enrolled' => true,
                'has_subjects' => true,
                'is_dropout' => false,
                'enrolled_subjects' => json_encode([
                    ['code' => 'QUR201', 'name' => 'Quranic Studies', 'units' => 3, 'schedule' => 'Mon/Wed 8:00-9:00 AM', 'room' => 'Room 301'],
                    ['code' => 'ISH301', 'name' => 'Contemporary Islamic Issues', 'units' => 3, 'schedule' => 'Tue/Thu 8:00-9:00 AM', 'room' => 'Room 302'],
                    ['code' => 'ARB401', 'name' => 'Arabic Communication', 'units' => 3, 'schedule' => 'Mon/Wed 9:00-10:00 AM', 'room' => 'Room 303'],
                    ['code' => 'FIQ501', 'name' => 'Comparative Fiqh', 'units' => 3, 'schedule' => 'Tue/Thu 9:00-10:00 AM', 'room' => 'Room 304'],
                    ['code' => 'RES401', 'name' => 'Research Methods', 'units' => 3, 'schedule' => 'Mon/Wed 10:00-11:00 AM', 'room' => 'Room 305'],
                    ['code' => 'ENG501', 'name' => 'Academic English', 'units' => 3, 'schedule' => 'Tue/Thu 10:00-11:00 AM', 'room' => 'Room 306'],
                    ['code' => 'STEM101', 'name' => 'Pre-Calculus', 'units' => 3, 'schedule' => 'Mon/Wed 1:00-2:00 PM', 'room' => 'Room 401'],
                    ['code' => 'STEM102', 'name' => 'General Chemistry', 'units' => 3, 'schedule' => 'Tue/Thu 1:00-2:00 PM', 'room' => 'Lab 201'],
                ]),
            ]
        );

        // Add grades for Grade 6 (previous year)
        $grade6Subjects = [
            ['code' => 'QUR101', 'name' => 'Quran & Tajweed I', 'q1' => 88, 'q2' => 90, 'q3' => 89, 'q4' => 91],
            ['code' => 'ISH101', 'name' => 'Islamic Studies I', 'q1' => 85, 'q2' => 87, 'q3' => 86, 'q4' => 88],
            ['code' => 'ARB101', 'name' => 'Arabic Language I', 'q1' => 82, 'q2' => 84, 'q3' => 85, 'q4' => 86],
            ['code' => 'MAT101', 'name' => 'Mathematics I', 'q1' => 90, 'q2' => 92, 'q3' => 91, 'q4' => 93],
            ['code' => 'ENG101', 'name' => 'English I', 'q1' => 87, 'q2' => 89, 'q3' => 88, 'q4' => 90],
            ['code' => 'SCI101', 'name' => 'Science I', 'q1' => 86, 'q2' => 88, 'q3' => 87, 'q4' => 89],
        ];
        foreach ($grade6Subjects as $grade) {
            $finalGrade = ($grade['q1'] + $grade['q2'] + $grade['q3'] + $grade['q4']) / 4;
            \App\Models\Grade::create([
                'user_id' => $oldStudent->id,
                'grade_level' => 'Grade 6',
                'subject_code' => $grade['code'],
                'subject_name' => $grade['name'],
                'q1_grade' => $grade['q1'],
                'q2_grade' => $grade['q2'],
                'q3_grade' => $grade['q3'],
                'q4_grade' => $grade['q4'],
                'final_grade' => $finalGrade,
                'remarks' => $finalGrade >= 75 ? 'PASSED' : 'FAILED',
            ]);
        }

        // Add grades for Grade 7
        $grade7Subjects = [
            ['code' => 'QUR102', 'name' => 'Quran & Tajweed II', 'q1' => 89, 'q2' => 91, 'q3' => 90, 'q4' => 92],
            ['code' => 'ISH102', 'name' => 'Islamic Studies II', 'q1' => 86, 'q2' => 88, 'q3' => 87, 'q4' => 89],
            ['code' => 'ARB102', 'name' => 'Arabic Language II', 'q1' => 83, 'q2' => 85, 'q3' => 86, 'q4' => 87],
            ['code' => 'MAT102', 'name' => 'Mathematics II', 'q1' => 91, 'q2' => 93, 'q3' => 92, 'q4' => 94],
            ['code' => 'ENG102', 'name' => 'English II', 'q1' => 88, 'q2' => 90, 'q3' => 89, 'q4' => 91],
            ['code' => 'SCI102', 'name' => 'Science II', 'q1' => 87, 'q2' => 89, 'q3' => 88, 'q4' => 90],
        ];
        foreach ($grade7Subjects as $grade) {
            $finalGrade = ($grade['q1'] + $grade['q2'] + $grade['q3'] + $grade['q4']) / 4;
            \App\Models\Grade::create([
                'user_id' => $oldStudent->id,
                'grade_level' => 'Grade 7',
                'subject_code' => $grade['code'],
                'subject_name' => $grade['name'],
                'q1_grade' => $grade['q1'],
                'q2_grade' => $grade['q2'],
                'q3_grade' => $grade['q3'],
                'q4_grade' => $grade['q4'],
                'final_grade' => $finalGrade,
                'remarks' => $finalGrade >= 75 ? 'PASSED' : 'FAILED',
            ]);
        }

        // Add grades for Grade 8
        $grade8Subjects = [
            ['code' => 'QUR103', 'name' => 'Quran & Tajweed III', 'q1' => 90, 'q2' => 92, 'q3' => 91, 'q4' => 93],
            ['code' => 'ISH103', 'name' => 'Islamic Studies III', 'q1' => 87, 'q2' => 89, 'q3' => 88, 'q4' => 90],
            ['code' => 'ARB103', 'name' => 'Arabic Language III', 'q1' => 84, 'q2' => 86, 'q3' => 87, 'q4' => 88],
            ['code' => 'MAT103', 'name' => 'Mathematics III', 'q1' => 92, 'q2' => 94, 'q3' => 93, 'q4' => 95],
            ['code' => 'ENG103', 'name' => 'English III', 'q1' => 89, 'q2' => 91, 'q3' => 90, 'q4' => 92],
            ['code' => 'SCI103', 'name' => 'Science III', 'q1' => 88, 'q2' => 90, 'q3' => 89, 'q4' => 91],
        ];
        foreach ($grade8Subjects as $grade) {
            $finalGrade = ($grade['q1'] + $grade['q2'] + $grade['q3'] + $grade['q4']) / 4;
            \App\Models\Grade::create([
                'user_id' => $oldStudent->id,
                'grade_level' => 'Grade 8',
                'subject_code' => $grade['code'],
                'subject_name' => $grade['name'],
                'q1_grade' => $grade['q1'],
                'q2_grade' => $grade['q2'],
                'q3_grade' => $grade['q3'],
                'q4_grade' => $grade['q4'],
                'final_grade' => $finalGrade,
                'remarks' => $finalGrade >= 75 ? 'PASSED' : 'FAILED',
            ]);
        }

        // Add grades for Grade 9
        $grade9Subjects = [
            ['code' => 'QUR104', 'name' => 'Quran & Tajweed IV', 'q1' => 91, 'q2' => 93, 'q3' => 92, 'q4' => 94],
            ['code' => 'ISH104', 'name' => 'Islamic Studies IV', 'q1' => 88, 'q2' => 90, 'q3' => 89, 'q4' => 91],
            ['code' => 'ARB104', 'name' => 'Arabic Language IV', 'q1' => 85, 'q2' => 87, 'q3' => 88, 'q4' => 89],
            ['code' => 'MAT104', 'name' => 'Mathematics IV', 'q1' => 93, 'q2' => 95, 'q3' => 94, 'q4' => 96],
            ['code' => 'ENG104', 'name' => 'English IV', 'q1' => 90, 'q2' => 92, 'q3' => 91, 'q4' => 93],
            ['code' => 'SCI104', 'name' => 'Science IV', 'q1' => 89, 'q2' => 91, 'q3' => 90, 'q4' => 92],
        ];
        foreach ($grade9Subjects as $grade) {
            $finalGrade = ($grade['q1'] + $grade['q2'] + $grade['q3'] + $grade['q4']) / 4;
            \App\Models\Grade::create([
                'user_id' => $oldStudent->id,
                'grade_level' => 'Grade 9',
                'subject_code' => $grade['code'],
                'subject_name' => $grade['name'],
                'q1_grade' => $grade['q1'],
                'q2_grade' => $grade['q2'],
                'q3_grade' => $grade['q3'],
                'q4_grade' => $grade['q4'],
                'final_grade' => $finalGrade,
                'remarks' => $finalGrade >= 75 ? 'PASSED' : 'FAILED',
            ]);
        }

        // Add grades for Grade 10
        $grade10Subjects = [
            ['code' => 'QUR105', 'name' => 'Quran & Tajweed V', 'q1' => 92, 'q2' => 94, 'q3' => 93, 'q4' => 95],
            ['code' => 'ISH105', 'name' => 'Islamic Studies V', 'q1' => 89, 'q2' => 91, 'q3' => 90, 'q4' => 92],
            ['code' => 'ARB105', 'name' => 'Arabic Language V', 'q1' => 86, 'q2' => 88, 'q3' => 89, 'q4' => 90],
            ['code' => 'MAT105', 'name' => 'Mathematics V', 'q1' => 94, 'q2' => 96, 'q3' => 95, 'q4' => 97],
            ['code' => 'ENG105', 'name' => 'English V', 'q1' => 91, 'q2' => 93, 'q3' => 92, 'q4' => 94],
            ['code' => 'SCI105', 'name' => 'Science V', 'q1' => 90, 'q2' => 92, 'q3' => 91, 'q4' => 93],
        ];
        foreach ($grade10Subjects as $grade) {
            $finalGrade = ($grade['q1'] + $grade['q2'] + $grade['q3'] + $grade['q4']) / 4;
            \App\Models\Grade::create([
                'user_id' => $oldStudent->id,
                'grade_level' => 'Grade 10',
                'subject_code' => $grade['code'],
                'subject_name' => $grade['name'],
                'q1_grade' => $grade['q1'],
                'q2_grade' => $grade['q2'],
                'q3_grade' => $grade['q3'],
                'q4_grade' => $grade['q4'],
                'final_grade' => $finalGrade,
                'remarks' => $finalGrade >= 75 ? 'PASSED' : 'FAILED',
            ]);
        }

        // Add grades for Grade 11 - STEM (current grade)
        $grade11Subjects = [
            ['code' => 'QUR201', 'name' => 'Quranic Studies', 'q1' => 90, 'q2' => 92, 'q3' => 91, 'q4' => 93],
            ['code' => 'ISH301', 'name' => 'Contemporary Islamic Issues', 'q1' => 86, 'q2' => 88, 'q3' => 89, 'q4' => 90],
            ['code' => 'ARB401', 'name' => 'Arabic Communication', 'q1' => 88, 'q2' => 90, 'q3' => 91, 'q4' => 92],
            ['code' => 'FIQ501', 'name' => 'Comparative Fiqh', 'q1' => 83, 'q2' => 85, 'q3' => 86, 'q4' => 87],
            ['code' => 'RES401', 'name' => 'Research Methods', 'q1' => 92, 'q2' => 94, 'q3' => 95, 'q4' => 96],
            ['code' => 'ENG501', 'name' => 'Academic English', 'q1' => 85, 'q2' => 87, 'q3' => 88, 'q4' => 89],
            ['code' => 'STEM101', 'name' => 'Pre-Calculus', 'q1' => 89, 'q2' => 91, 'q3' => 92, 'q4' => 93],
            ['code' => 'STEM102', 'name' => 'General Chemistry', 'q1' => 87, 'q2' => 89, 'q3' => 90, 'q4' => 91],
        ];
        foreach ($grade11Subjects as $grade) {
            $finalGrade = ($grade['q1'] + $grade['q2'] + $grade['q3'] + $grade['q4']) / 4;
            \App\Models\Grade::create([
                'user_id' => $oldStudent->id,
                'grade_level' => 'Grade 11 - STEM',
                'subject_code' => $grade['code'],
                'subject_name' => $grade['name'],
                'q1_grade' => $grade['q1'],
                'q2_grade' => $grade['q2'],
                'q3_grade' => $grade['q3'],
                'q4_grade' => $grade['q4'],
                'final_grade' => $finalGrade,
                'remarks' => $finalGrade >= 75 ? 'PASSED' : 'FAILED',
            ]);
        }

        // Student 3: OLD STUDENT - Grade 10 - Dropout
        User::firstOrCreate(
            ['email' => 'dropout@amis.edu.ph'],
            [
                'name' => 'Hassan Malik',
                'student_id' => 'AMIS-2024-089',
                'password' => bcrypt('123'),
                'student_type' => 'OLD STUDENT',
                'enrollment_status' => 'APPROVED',
                'has_payment' => false,
                'grade_level' => 'Grade 10',
                'contact_number' => '09456789012',
                'address' => '321 Taft Ave, Pasay City',
                'is_enrolled' => false,
                'has_subjects' => true,
                'is_dropout' => true,
                'enrolled_subjects' => json_encode([
                    ['code' => 'QUR102', 'name' => 'Quran & Tajweed II', 'units' => 3, 'schedule' => 'Mon/Wed 8:00-9:00 AM', 'room' => 'Room 201'],
                    ['code' => 'ISH202', 'name' => 'Islamic Civilization', 'units' => 3, 'schedule' => 'Tue/Thu 8:00-9:00 AM', 'room' => 'Room 202'],
                    ['code' => 'ARB302', 'name' => 'Advanced Arabic', 'units' => 3, 'schedule' => 'Mon/Wed 9:00-10:00 AM', 'room' => 'Room 203'],
                    ['code' => 'MAT401', 'name' => 'Advanced Mathematics', 'units' => 3, 'schedule' => 'Tue/Thu 9:00-10:00 AM', 'room' => 'Room 204'],
                ]),
            ]
        );

        // Student 4: TRANSFEREE - Grade 12 ABM - Not yet enrolled
        User::firstOrCreate(
            ['email' => 'transferee@amis.edu.ph'],
            [
                'name' => 'Aisha Rahman',
                'student_id' => 'AMIS-2026-002',
                'password' => bcrypt('123'),
                'student_type' => 'TRANSFEREE',
                'enrollment_status' => 'APPROVED',
                'has_payment' => true,
                'grade_level' => 'Grade 12 - ABM',
                'contact_number' => '09567890123',
                'address' => '654 Roxas Blvd, Manila',
                'is_enrolled' => false,
                'has_subjects' => false,
                'is_dropout' => false,
                'enrolled_subjects' => null,
            ]
        );

        // Student 5: REJECTED - Grade 6 - No enrollment
        User::firstOrCreate(
            ['email' => 'rejected@amis.edu.ph'],
            [
                'name' => 'Maria Santos',
                'student_id' => 'AMIS-2026-003',
                'password' => bcrypt('123'),
                'student_type' => 'NEW STUDENT',
                'enrollment_status' => 'REJECTED',
                'has_payment' => false,
                'grade_level' => 'Grade 6',
                'contact_number' => '09123456789',
                'address' => '123 Main St, Manila',
                'is_enrolled' => false,
                'has_subjects' => false,
                'is_dropout' => false,
                'enrolled_subjects' => null,
            ]
        );
    }
}
