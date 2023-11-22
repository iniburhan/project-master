<?php

namespace App\Http\Controllers\PajakApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\View\PajakApp\VwPembayaranDendaKeDua;
use App\Models\View\PajakApp\VwPemilikKendaraanTerbanyak;
use App\Models\View\PajakApp\VwJenisPajakTerbanyakDibayar;
use App\Models\View\PajakApp\VwPegawaiPalingJarangMelayani;
use App\Models\View\PajakApp\VwJumlahPajakDariKategori;
use App\Models\View\PajakApp\VwJumlahDendaSetiapPembayar;

class DashboardController  extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'denda_terbanyak_kedua' => VwPembayaranDendaKeDua::first(),
            'pemilik_kendaraan_terbanyak' => VwPemilikKendaraanTerbanyak::first(),
            'jenis_pajak_terbanyak_dibayar' => VwJenisPajakTerbanyakDibayar::first(),
            'pegawai_paling_jarang_melayani' => VwPegawaiPalingJarangMelayani::first(),
            'jumlah_pajak_dari_kategori' => VwJumlahPajakDariKategori::first(),
            'jumlah_denda_setiap_pembayar' => VwJumlahDendaSetiapPembayar::get(),
        ];
        // dd($data);
        return view('pajakApp/dashboard')->with('data', $data);
    }

    public function getJumlahDendaSetiapPembayar()
    {
        $data_pembayar = VwJumlahDendaSetiapPembayar::get();
        return $data_pembayar;
    }
}
