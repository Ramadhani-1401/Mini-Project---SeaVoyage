<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Ship;
use App\Models\Nahkoda;

class BookingController extends Controller
{
    public function create()
    {
        $ships = Ship::all();
        $nahkodas = Nahkoda::all();

        return view('bookings.create', compact('ships', 'nahkodas'));
    }

    public function store(Request $request)
    {
        Booking::create([
            'ship_id' => $request->ship_id,
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'nahkoda_id' => $request->nahkoda_id
        ]);

        return redirect('/')->with('success', 'Booking berhasil!');
    }
}