<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agegroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start', 'end'];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
