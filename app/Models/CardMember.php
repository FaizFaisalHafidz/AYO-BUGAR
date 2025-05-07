<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'card_number',
        'dob',
        'phone',
        'email',
        'membership_type',
        'effective_date',
        'expired_date',
        'created_by'
    ];

    protected $casts = [
        'dob' => 'date',
        'effective_date' => 'date',
        'expired_date' => 'date',
    ];

    /**
     * Get the outlet that owns the card member
     */
    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    /**
     * Get the user associated with the card member
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the attendance records for this card member
     */
    public function attendances()
    {
        return $this->hasMany(AttendanceMember::class, 'card_member_id');
    }

    public function transactions()
    {
        return $this->hasMany(OutletTransaction::class);
    }
}
