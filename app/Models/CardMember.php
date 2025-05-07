<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardMember extends Model
{
    use SoftDeletes;
    
    protected $guarded = ['id'];

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
    
    
   
}
