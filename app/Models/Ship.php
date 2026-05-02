<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'capacity',
        'price_per_day',
        'status',
        'image',
        'features',
        'specifications',
        'location'
    ];

    protected $casts = [
        'features' => 'array',
        'specifications' => 'array',
        'images' => 'array'
    ];

    /**
     * Get the image URL for the ship.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        $defaultImages = [
            'Yacht' => 'https://images.unsplash.com/photo-1567899378494-47b22a2ae96a?auto=format&fit=crop&w=800&q=80',
            'Speedboat' => asset('images/ships/speedboat.png'),
            'Sailboat' => asset('images/ships/sailboat.png'),
            'Pontoon' => asset('images/ships/pontoon.png'),
            'Fishing Boat' => asset('images/ships/fishing_boat.png'),
            'Catamaran' => asset('images/ships/catamaran.png'),
        ];
        
        $shipType = $this->category ? $this->category->name : '';
        return $defaultImages[$shipType] ?? 'https://placehold.co/800x400?text=Ship';
    }

    /**
     * Get the bookings for the ship.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the category that owns the ship.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}