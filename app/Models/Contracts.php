<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contracts extends Model
{
    use HasFactory,SoftDeletes;

    public function investor()
    {
        return $this->belongsTo(Investors::class,'investor_id');
    }

    public function project()
    {
        return $this->belongsTo(Projects::class,'project_id');
    }

    public function uploadedBy()
    {
        return $this->belongsTo(User::class,'uploader_id');
    }
    public function modifier()
    {
        return $this->belongsTo(User::class,'modified_by');
    }
    public function asset(){
        return $this->belongsTo(Assets::class,'asset_id');
    }
}
