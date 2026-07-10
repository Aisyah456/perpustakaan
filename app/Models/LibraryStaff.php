<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class LibraryStaff extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model ini.
     */
    protected $table = 'library_staff';

    /**
     * Kolom yang dapat diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'name',
        'title',
        'division',
        'image',
        'is_head',
        'order',
    ];

    /**
     * Casting tipe data (Menggunakan metode standar Laravel modern).
     * Memastikan format data keluar dari database sesuai dengan tipenya di React/Inertia.
     */
    protected function casts(): array
    {
        return [
            'is_head' => 'boolean',
            'order' => 'integer',
        ];
    }

    /**
     * Scope untuk mengambil hanya Kepala Perpustakaan.
     * Contoh: LibraryStaff::head()->first();
     */
    public function scopeHead(Builder $query): Builder
    {
        return $query->where('is_head', true);
    }

    /**
     * Scope untuk mengambil staf biasa (bukan kepala).
     * Catatan: Pengurutan sebaiknya dipisah agar query lebih fleksibel.
     * Contoh: LibraryStaff::staffOnly()->orderBy('order', 'asc')->get();
     */
    public function scopeStaffOnly(Builder $query): Builder
    {
        return $query->where('is_head', false);
    }
}
