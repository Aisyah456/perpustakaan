<?php

namespace App\Http\Controllers;

use App\Models\BookingFacility;
use Illuminate\Http\Request;

class AdminFacilityBookingController extends Controller
{
    public function index()
    {
        $bookings = BookingFacility::orderBy('tanggal_pemakaian', 'desc')->paginate(10);
        return view('admin.layanan.facility.index', compact('bookings'));
    }

    /**
     * Simpan data booking baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'status_pemesan' => 'required|string',
            'fakultas' => 'nullable|string|max:255',
            'program_studi' => 'nullable|string|max:255',
            'nama_fasilitas' => 'required|string|max:255',
            'tanggal_pemakaian' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'keperluan' => 'required|string',
        ]);

        BookingFacility::create([
            'nama_pemesan' => $request->nama_pemesan,
            'nim' => $request->nim,
            'status_pemesan' => $request->status_pemesan,
            'fakultas' => $request->fakultas,
            'program_studi' => $request->program_studi,
            'nama_fasilitas' => $request->nama_fasilitas,
            'tanggal_pemakaian' => $request->tanggal_pemakaian,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'keperluan' => $request->keperluan,
            'status_verifikasi' => 'menunggu', // default status
        ]);

        return redirect()->route('booking-facility.index')->with('success', 'Booking fasilitas berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit booking.
     */
    public function edit($id)
    {
        $booking = BookingFacility::findOrFail($id);
        return view('admin.facility-booking.edit', compact('booking'));
    }

    /**
     * Perbarui data booking.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'status_pemesan' => 'required|string',
            'fakultas' => 'nullable|string|max:255',
            'program_studi' => 'nullable|string|max:255',
            'nama_fasilitas' => 'required|string|max:255',
            'tanggal_pemakaian' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'keperluan' => 'required|string',
            'status_verifikasi' => 'required|string|in:menunggu,disetujui,ditolak',
        ]);

        $booking = BookingFacility::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('booking-facility.index')->with('success', 'Data booking berhasil diperbarui.');
    }

    /**
     * Hapus booking.
     */
    public function destroy($id)
    {
        $booking = BookingFacility::findOrFail($id);
        $booking->delete();

        return redirect()->route('booking-facility.index')->with('success', 'Booking fasilitas berhasil dihapus.');
    }
}
