<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutletPriceList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'outlet_id',
        'outlet_service_id',
        'price',
        'month_expired_date',
        'created_by'
    ];

    protected $casts = [
        'month_expired_date' => 'date',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function service()
    {
        return $this->belongsTo(OutletService::class, 'outlet_service_id');
    }
}