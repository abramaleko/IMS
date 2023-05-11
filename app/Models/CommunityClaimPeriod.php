<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityClaimPeriod extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table ='community_claim_period';
}
