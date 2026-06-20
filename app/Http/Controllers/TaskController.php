<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        try {
            $count = DB::table('tasks')->count();

            return "Database terkoneksi. Jumlah tugas: " . $count;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create()
    {
        return 'Halaman Create';
    }

    public function store(Request $request)
    {
        return 'Store berhasil';
    }

    public function edit($id)
    {
        return 'Edit produk ID: ' . $id;
    }
}