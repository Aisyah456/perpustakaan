<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Clearance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClearanceController extends Controller
{
    // Menampilkan daftar clearance
    public function index(Request $request)
    {
        $search = $request->input('search');
        $clearances = Clearance::with('student', 'admin') // Memuat relasi student dan admin
            ->when($search, function ($query, $search) {
                $query->whereHas('student', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                        ->orWhere('nim', 'like', "%$search%");
                });
            })
            ->paginate(10);

        return view('admin.clearance.index', compact('clearances'));
    }

    // Menampilkan form untuk menambah clearance baru
    public function create()
    {
        $students = Student::all(); // Memuat semua mahasiswa
        return view('admin.clearance.create', compact('students'));
    }

    // Menyimpan clearance baru
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'status' => 'required|in:Pending,Approved,Rejected',
            'remarks' => 'nullable|string',
        ]);

        Clearance::create([
            'student_id' => $request->student_id,
            'status' => $request->status,
            'remarks' => $request->remarks,
            'admin_id' => auth()->id(), // Menyimpan admin ID yang login
        ]);

        return redirect()->route('admin.clearance.index')->with('success', 'Clearance created successfully!');
    }

    // Menampilkan form untuk mengedit clearance
    public function edit(Clearance $clearance) // Menggunakan route-model binding
    {
        $students = Student::all();
        return view('admin.clearance.edit', compact('clearance', 'students'));
    }

    // Memperbarui clearance yang ada
    public function update(Request $request, Clearance $clearance)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'status' => 'required|in:Pending,Approved,Rejected',
            'remarks' => 'nullable|string',
        ]);

        $clearance->update([
            'student_id' => $request->student_id,
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('admin.clearance.index')->with('success', 'Clearance updated successfully!');
    }

    // Menghapus clearance
    public function destroy(Clearance $clearance) // Menggunakan route-model binding
    {
        $clearance->delete();

        return redirect()->route('admin.clearance.index')->with('success', 'Clearance deleted successfully!');
    }
}
