<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutletTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'outlet_id',
        'card_member_id',
        'outlet_price_list_id',
        'date',
        'total',
        'description',
        'created_by'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function cardMember()
    {
        return $this->belongsTo(CardMember::class);
    }

    public function priceList()
    {
        return $this->belongsTo(OutletPriceList::class, 'outlet_price_list_id');
    }

    public function details()
    {
        return $this->hasMany(OutletTransactionDetail::class);
    }
}