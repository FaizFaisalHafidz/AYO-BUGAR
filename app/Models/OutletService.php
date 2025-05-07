<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutletService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'outlet_id',
        'service_name',
        'description',
        'expired_date',
        'created_by'
    ];

    protected $casts = [
        'expired_date' => 'date',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function priceLists()
    {
        return $this->hasMany(OutletPriceList::class);
    }

    public function currentPrice()
    {
        return $this->hasOne(OutletPriceList::class)
            ->whereDate('month_expired_date', '>=', now())
            ->latest();
    }
}