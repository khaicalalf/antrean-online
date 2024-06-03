<?php
namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntreanController extends Controller
{
    public function index()
    {
        $query = Antrian::query()
            ->with('pasien', 'poli')
            ->orderBy('Tanggal_Antrian', 'desc'); 
        return $query;
    }

    public function store(Request $request)
    {
        $data = new Antrian();
        $data->name = $request->name;
        $data->save();

        return response()->json($data, 201);
    }
}
