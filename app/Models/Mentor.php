<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'speciality',
    ];

    public function groups(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}
