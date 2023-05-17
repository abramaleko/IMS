<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Projects::class);
    }

    public function contractAssets(){
        return $this->hasMany(ContractAssets::class,'asset_id');
    }
}
