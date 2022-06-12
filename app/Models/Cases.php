<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
          
    }

    protected $fillable = [
        'country_id',
        'active',
        'confirmed',
        'deaths',
        'recovered',
        'date',
    ];
}
