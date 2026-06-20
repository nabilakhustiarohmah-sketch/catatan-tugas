<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Menampilkan semua tugas dan cek koneksi database.
     */
    public function index()
    {
        try {
            // Mengambil jumlah data dari tabel tasks
            $count = DB::table('tasks')->count();

            return "Database berhasil terkoneksi! Jumlah tugas saat ini: " . $count;
        } catch (\Exception $e) {
            // Mengembalikan pesan error jika database gagal terhubung
            return "Gagal koneksi database. Error: " . $e->getMessage();
        }
    }

    /**
     * Form tambah tugas.
     */
    public function create()
    {
        return 'Halaman Create Tugas';
    }

    /**
     * Simpan tugas baru.
     */
    public function store(Request $request)
    {
        return 'Proses Store Tugas Berhasil';
    }

    /**
     * Form edit tugas.
     */
    public function edit($id)
    {
        return 'Halaman Edit Tugas ID: ' . $id;
    }

    /**
     * Update data tugas.
     */
    public function update(Request $request, $id)
    {
        return 'Proses Update Tugas ID: ' . $id;
    }

    /**
     * Hapus data tugas.
     */
    public function destroy($id)
    {
        return 'Proses Hapus Tugas ID: ' . $id;
    }
}
