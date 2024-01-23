<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investors extends Model
{
    use HasFactory;

    const investorId = 1;
    const kinId = 2;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function contracts()
    {
        return $this->hasMany(Contracts::class,'investor_id');
    }
}
