<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monthlyRewardClaims extends Model
{
    use HasFactory;

    protected $fillable=[
        'investor_id',
        'claim_period',
        'reward_address',
        'amount'
    ];
}
