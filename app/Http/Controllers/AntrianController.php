<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Support\Str;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index(Request $request)
    {
        // $query = Antrian::with('pasien', 'poli')->get();
        $query = Antrian::query()->with('pasien', 'poli')->orderBy('Tanggal_Antrian', 'desc')->orderBy('poli_id', 'desc');

        $antrians = $query->paginate(10);
        return view('dashboard', compact('antrians'));
    }

    public function create()
    {
        $polis = Poli::where('id', '>', 0)->get();
        return view('antrian.create', compact('polis'));
    }

    // Method untuk menampilkan form pencarian
    public function search()
    {
        return view('antrian.create');
    }

    // Method untuk menangani hasil pencarian AJAX
    public function searchResultsAjax(Request $request)
    {
        $request->validate([
            'NIK' => 'required|string|max:255',
            'Tanggal_Antrian' => 'required|date',
        ]);

        $NIK = $request->input('NIK');
        $Tanggal_Antrian = $request->input('Tanggal_Antrian');

        $antrians = Antrian::whereHas('pasien', function ($query) use ($NIK) {
            $query->where('NIK', $NIK);
        })
            ->whereDate('Tanggal_Antrian', $Tanggal_Antrian)
            ->with('pasien', 'poli')
            ->get();

        return response()->json($antrians);
    }

    public function searchinDashboard()
    {
        return view('dashboard');
    }

    // Method untuk menangani hasil pencarian AJAX
    public function searchResultsAjaxinDashboard(Request $request)
    {
        $request->validate([
            'NIK' => 'required|string|max:255',
        ]);

        $NIK = $request->input('NIK');

        $antrians = Antrian::whereHas('pasien', function ($query) use ($NIK) {
            $query->where('NIK', $NIK);
        })
            ->with('pasien', 'poli')
            ->orderBy('Tanggal_Antrian', 'desc')
            ->first();

        return response()->json($antrians);
    }

    public function storejkn()
    {
        $Tanggal_AntrianJKN = date('Y-m-d');
        $poli_idJKN = '0';
        // Hitung nomor antrian per hari
        $nomorAntrian = Antrian::whereDate('Tanggal_Antrian', $Tanggal_AntrianJKN)->max('Nomor_Antrian') + 1;

        // Hitung nomor antrian per poli
        $nomorAntrian =
            Antrian::where('poli_id', $poli_idJKN)
                ->whereDate('Tanggal_Antrian', $Tanggal_AntrianJKN)
                ->max('Nomor_Antrian_Poli') + 1;
        $rdm = Str::random(30);

        // Simpan data antrian
        $antrian = Antrian::create([
            'Nomor_Antrian' => $nomorAntrian,
            'Nomor_Antrian_Poli' => $nomorAntrian,
            'pasien_id' => '0',
            'poli_id' => $poli_idJKN,
            'Tanggal_Antrian' => $Tanggal_AntrianJKN,
            'Pembayaran' => 'BPJS',
            'No_Rujukan' => '-',
            'Status' => 'Menunggu',
            'random' => $rdm,
        ]);

        // $receiptUrl = route('antrian.cetak', ['random' => $rdm]);
        // session(['receipt_url' => $receiptUrl]);

        // return redirect()->route('antrian.cetak', $antrian->random);
        return response()->json(['rdm' => $rdm]);
    }

    public function cetak($rdm)
    {
        // $antrian = Antrian::with('pasien', 'poli')->findOrFail($id);
        $antrian = Antrian::where('random', $rdm)
            ->firstOrFail();
        return view('antrian.cetak', compact('antrian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required',
            'Nama' => 'required|string|max:255',
            'Nomor_Telepon' => 'required|string|max:15',
            'poli_id' => 'required',
            'Tanggal_Antrian' => 'required|date',
            'Pembayaran' => 'required',
        ]);

        $poliOrtho = '7';
        // Cek jumlah antrian di poli dan tanggal yang sama
        $antrianCount = Antrian::where('poli_id', $poliOrtho)
            ->whereDate('Tanggal_Antrian', $request->Tanggal_Antrian)
            ->count();

        if ($antrianCount >= 15) {
            return redirect()->back()->with('error', 'Kuota antrian untuk poli ini pada tanggal tersebut sudah penuh.');
        }
        // Cek apakah NIK sudah ada di tabel pasien
        $pasienCheck = Pasien::where('NIK', $request->NIK)->first();

        // Jika pasien tidak ditemukan, simpan data pasien baru
        if (!$pasienCheck) {
            // Simpan data pasien baru
            $pasienCheck = Pasien::create([
                'NIK' => $request->NIK,
                'Nama' => $request->Nama,
                'Nomor_Telepon' => $request->Nomor_Telepon,
                'Alamat' => $request->Alamat,
            ]);
        } else {
            // Jika pasien ditemukan, cek apakah sudah mendaftar antrian hari ini
            $existingAntrian = Antrian::where('pasien_id', $pasienCheck->id)
                ->whereDate('Tanggal_Antrian', $request->Tanggal_Antrian)
                ->where('poli_id', $request->poli_id)
                ->first();

            if ($existingAntrian) {
                return redirect()->back()->with('error', 'Anda sudah mendaftar antrian untuk hari ini.');
            }
        }

        // Hitung nomor antrian per hari
        $nomorAntrian = Antrian::whereDate('Tanggal_Antrian', $request->Tanggal_Antrian)->max('Nomor_Antrian') + 1;

        // Hitung nomor antrian per poli
        $nomorAntrianPoli =
            Antrian::where('poli_id', $request->poli_id)
                ->whereDate('Tanggal_Antrian', $request->Tanggal_Antrian)
                ->max('Nomor_Antrian_Poli') + 1;

        if ($request->poli_id == '7') {
            // if($nomorAntrianPoli == '1'){
            //     $noAntrian = $nomorAntrianPoli + 3;
            // }
            // else{
            //     $noAntrian = $nomorAntrianPoli;
            // }
            $noAntrian = $nomorAntrianPoli;
        } else {
            $noAntrian = $nomorAntrianPoli;
        }
        $rdm = Str::random(30);

        // Simpan data antrian
        $antrian = Antrian::create([
            'Nomor_Antrian' => $nomorAntrian,
            'Nomor_Antrian_Poli' => $noAntrian,
            'pasien_id' => $pasienCheck->id,
            'poli_id' => $request->poli_id,
            'Tanggal_Antrian' => $request->Tanggal_Antrian,
            'Pembayaran' => $request->Pembayaran,
            'No_Rujukan' => $request->Rujukan,
            'Status' => 'Menunggu',
            'random' => $rdm,
        ]);

        return redirect()->route('antrian.show', $antrian->random);
    }

    public function show($rdm)
    {
        // $antrian = Antrian::with('pasien', 'poli')->findOrFail($id);
        $antrian = Antrian::where('random', $rdm)
            ->with(['poli', 'pasien'])
            ->firstOrFail();
        return view('antrian.show', compact('antrian'));
    }
}
