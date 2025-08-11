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
            'nama_pemesan' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'status_pemesan' => 'required|in:mahasiswa,dosen,staff,umum',
            'fakultas' => 'nullable|string|max:255',
            'program_studi' => 'nullable|string|max:255',
            'nama_fasilitas' => 'required|string|max:255',
            'tanggal_pemakaian' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'keperluan' => 'required|string',
            'status_verifikasi' => 'nullable|in:pending,disetujui,ditolak'
        ]);

        BookingFacility::create($request->all());

        return redirect()->route('booking_facility.create')
            ->with('success', 'Pemesanan fasilitas berhasil diajukan.');
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
