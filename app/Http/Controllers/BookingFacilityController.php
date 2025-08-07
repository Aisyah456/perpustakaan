<?php

namespace App\Http\Controllers;

use App\Models\BookingFacility;
use Illuminate\Http\Request;

class BookingFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = BookingFacility::latest()->paginate(10);
        return view('home.layanaan.facility.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.layanan.facility.index');
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'kontak' => 'required',
            'fasilitas' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'keperluan' => 'required',
        ]);

        BookingFacility::create($request->all());

        return redirect()->back()->with('success', 'Permintaan booking berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookingFacility $bookingFacility)
    {
        // $booking = BookingFacility::findOrFail($id);
        // return view('admin.booking_fasilitas.show', compact('booking'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookingFacility $bookingFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookingFacility $bookingFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingFacility $bookingFacility)
    {
        //
    }
}
