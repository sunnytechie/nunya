<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable =
    [
     'name',
     'email',
     'phone',
     'address',
     'city',
     'state',
     'zip',
     'country',
     'agegroup_id'
    ];

    public function agegroup()
    {
        return $this->belongsTo(Agegroup::class);
    }
}
