<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutletTransactionDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'outlet_transaction_id',
        'item',
        'total',
        'description',
        'created_by'
    ];

    public function transaction()
    {
        return $this->belongsTo(OutletTransaction::class, 'outlet_transaction_id');
    }
}