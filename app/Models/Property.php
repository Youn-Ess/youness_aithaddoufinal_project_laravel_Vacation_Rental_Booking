<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'propertyTitle',
        'propertyType',
        'propertyDescription',
        'rooms',
        'price',
        'location',
        'latitude',
        'longitude',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function propertyImages()
    {
        return $this->hasMany(PropertyImage::class);
    }


    public function availability()
    {
        return $this->hasMany(AvailabilityCalendar::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
