<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractAssets extends Model
{
    use HasFactory;

    public function assetInfo(){
        return $this->belongsTo(Assets::class,'asset_id');
    }

}
