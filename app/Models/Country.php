<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function cases()
    {
        return $this->hasMany(Cases::class, 'country_id');
    }
}
