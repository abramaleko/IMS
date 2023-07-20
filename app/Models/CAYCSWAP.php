<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CAYCSWAP extends Model
{
    use HasFactory;

    protected $table='cayc_swaps';

    protected $fillable=[
        'user_id',
        'amount',
        'transaction_id'
    ];
}

