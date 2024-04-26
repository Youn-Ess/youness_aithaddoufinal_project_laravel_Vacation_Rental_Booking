<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailabilityCalendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'start_date',
        'end_date',
        'is_available',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
