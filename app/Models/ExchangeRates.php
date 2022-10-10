<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class ExchangeRates extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
