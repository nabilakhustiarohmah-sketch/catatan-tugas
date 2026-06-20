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

    
