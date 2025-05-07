<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function cardMembers()
    {
        return $this->hasMany(CardMember::class, 'outlet_id');
    }
}
