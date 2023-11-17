<?php

namespace App\Http\Controllers\PajakApp\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Table\PajakApp\MsKendaraan;
use App\Models\Table\PajakApp\MsPegawai;
use App\Models\Table\PajakApp\TrxPembayaran;
use Illuminate\Support\Facades\Auth;

class TrxPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = TrxPembayaran::where('flag', 1)->get();

        $data = [
            'pembayaran' => $pembayaran,
            'kendaraan' => MsKendaraan::where('flag', 1)->get(),
            'pegawai' => MsPegawai::where('flag', 1)->get()
        ];
        // dd($data);

        return view('pajakApp/admin/pembayaran')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'resi_pajak' => 'required',
            'bulan_lewat_pajak' => 'required',
            'total_denda' => 'required',
            'total_pajak_dibayar' => 'required',
            'id_kendaraan' => 'required',
            'id_pegawai' => 'required',
        ]);
        $data  = [
            'resi_pajak' => $request->resi_pajak,
            'bulan_lewat_pajak' => $request->bulan_lewat_pajak,
            'total_denda' => $request->total_denda,
            'total_pajak_dibayar' => $request->total_pajak_dibayar,
            'id_kendaraan' => $request->id_kendaraan,
            'id_pegawai' => $request->id_pegawai,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        // dd($data);
        $pembayaran = TrxPembayaran::insert($data);

        // redirect
        if ($pembayaran) {
            return redirect('/pembayaran')->with('success', 'Data created successfully.');
        } else {
            return redirect('/pembayaran')->with('error', 'Failed!');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            // 'description' => 'required',
        ]);
        $data = [
            'resi_pajak' => $request->resi_pajak,
            'bulan_lewat_pajak' => $request->bulan_lewat_pajak,
            'total_denda' => $request->total_denda,
            'total_pajak_dibayar' => $request->total_pajak_dibayar,
            'id_kendaraan' => $request->id_kendaraan,
            'id_pegawai' => $request->id_pegawai,
            'updated_by'=> Auth::user()->id,
        ];
        dd($request->all());
        $update = TrxPembayaran::where('id', $request->id)->update($data);

        if ($update) {
            return redirect('/pembayaran')->with('success', 'Data updated successfully.');
        } else {
            return redirect('/pembayaran')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = TrxPembayaran::where('id', $request->id)->update($data);

        if ($delete) {
            return redirect('/pembayaran')->with('success', 'Data Deleted.');
        } else {
            return redirect('/pembayaran')->with('error', 'Failed!');
        }
    }

    public function getKendaraan(Request $request)
    {
        $getKendaraan = MsKendaraan::where('id', $request->id)->where('flag', 1)->first();
        return $getKendaraan;
    }

    public function getAllPembayaran()
    {
        $pembayaran = TrxPembayaran::where('flag', 1)->get();
        return $pembayaran;
    }

    public function getPembayaranShow(Request $request)
    {
        $id = $request->id;
        $pembayaran = TrxPembayaran::where('flag', 1)->where('id', $id)->first();
        return $pembayaran;
    }
}
