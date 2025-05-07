<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceMember extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];


    public function cardMember()
    {
        return $this->belongsTo(CardMember::class, 'card_member_id');
    }

    // You can also add a relation to outlet through card member
    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }
}
