<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'dob',
        'email',
        'wa_number',
        'effective_date',
        'expired_date',
        'meta_card_design',
        'created_by'
    ];

    protected $casts = [
        'dob' => 'date',
        'effective_date' => 'date',
        'expired_date' => 'date',
        'meta_card_design' => 'json'
    ];

    public function services()
    {
        return $this->hasMany(OutletService::class);
    }

    public function priceLists()
    {
        return $this->hasMany(OutletPriceList::class);
    }

    public function transactions()
    {
        return $this->hasMany(OutletTransaction::class);
    }
}
