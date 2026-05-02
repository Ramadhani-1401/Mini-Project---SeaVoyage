<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ship;

class ShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ships = [
            [
                'name' => 'Luxury Yacht',
                'type' => 'Yacht',
                'description' => 'Elegant luxury yacht perfect for romantic getaways and special occasions.',
                'capacity' => 10,
                'price_per_day' => 1000000,
                'status' => 'available',
                'features' => json_encode(['Air Conditioning', 'WiFi', 'Swimming Pool', 'Bar']),
                'location' => 'Bali',
            ],
            [
                'name' => 'Speed Boat',
                'type' => 'Speedboat',
                'description' => 'Fast and thrilling speedboat for adventure seekers.',
                'capacity' => 5,
                'price_per_day' => 500000,
                'status' => 'available',
                'features' => json_encode(['GPS', 'Radio', 'Life Jackets']),
                'location' => 'Lombok',
            ],
            [
                'name' => 'Classic Sailboat',
                'type' => 'Sailboat',
                'description' => 'Traditional sailboat for a classic maritime experience.',
                'capacity' => 6,
                'price_per_day' => 400000,
                'status' => 'available',
                'features' => json_encode(['Comfortable Cabin', 'Kitchen', 'Bathroom']),
                'location' => 'Jakarta',
            ],
            [
                'name' => 'Party Pontoon',
                'type' => 'Pontoon',
                'description' => 'Spacious pontoon boat ideal for group outings and parties.',
                'capacity' => 15,
                'price_per_day' => 600000,
                'status' => 'available',
                'features' => json_encode(['BBQ Grill', 'Sound System', 'Seating Area']),
                'location' => 'Batam',
            ],
            [
                'name' => 'Grand Fishing Boat',
                'type' => 'Fishing Boat',
                'description' => 'Professional fishing boat equipped with modern gear.',
                'capacity' => 8,
                'price_per_day' => 350000,
                'status' => 'available',
                'features' => json_encode(['Fishing Equipment', 'Cooler', 'Navigation Tools']),
                'location' => 'Surabaya',
            ],
            [
                'name' => 'Twin Catamaran',
                'type' => 'Catamaran',
                'description' => 'Stable twin-hull catamaran perfect for smooth sailing.',
                'capacity' => 12,
                'price_per_day' => 750000,
                'status' => 'available',
                'features' => json_encode(['Multiple Cabins', 'Restaurant', 'Entertainment Zone']),
                'location' => 'Bali',
            ],
            [
                'name' => 'Executive Yacht',
                'type' => 'Yacht',
                'description' => 'Premium yacht with top-of-the-line facilities.',
                'capacity' => 8,
                'price_per_day' => 1200000,
                'status' => 'available',
                'features' => json_encode(['Sauna', 'Jacuzzi', 'Personal Chef', 'Library']),
                'location' => 'Jakarta',
            ],
            [
                'name' => 'Racing Speedboat',
                'type' => 'Speedboat',
                'description' => 'High-performance speedboat for thrill-seekers.',
                'capacity' => 4,
                'price_per_day' => 600000,
                'status' => 'available',
                'features' => json_encode(['Turbo Engine', 'Racing Seats', 'Advanced Navigation']),
                'location' => 'Lombok',
            ],
        ];

        foreach ($ships as $ship) {
            $type = $ship['type'];
            unset($ship['type']);
            
            $category = \App\Models\Category::firstOrCreate(
                ['name' => $type],
                ['description' => "Category for $type ships"]
            );
            
            $ship['category_id'] = $category->id;
            
            Ship::create($ship);
        }
    }
}
