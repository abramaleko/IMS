<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable=[
        'name'
    ];

    public function contracts(){
        return $this->hasMany(Contracts::class,'project_id');
    }
}
