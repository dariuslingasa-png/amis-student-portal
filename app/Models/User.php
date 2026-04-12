<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'student_id',
        'student_type',
        'enrollment_status',
        'has_payment',
        'grade_level',
        'contact_number',
        'address',
        'is_enrolled',
        'has_subjects',
        'is_dropout',
        'enrolled_subjects',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'has_payment' => 'boolean',
            'is_enrolled' => 'boolean',
            'has_subjects' => 'boolean',
            'is_dropout' => 'boolean',
        ];
    }

    /**
     * Check if student is approved and enrolled
     */
    public function isEnrolled(): bool
    {
        return $this->enrollment_status === 'APPROVED' && $this->has_payment;
    }

    /**
     * Check if student is rejected
     */
    public function isRejected(): bool
    {
        return $this->enrollment_status === 'REJECTED';
    }

    /**
     * Check if student is old student
     */
    public function isOldStudent(): bool
    {
        return $this->student_type === 'OLD STUDENT';
    }

    /**
     * Check if student is new student
     */
    public function isNewStudent(): bool
    {
        return $this->student_type === 'NEW STUDENT';
    }

    /**
     * Check if student is transferee
     */
    public function isTransferee(): bool
    {
        return $this->student_type === 'TRANSFEREE';
    }
}
