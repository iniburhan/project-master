<?php

namespace App\Http\Controllers\PajakApp\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Table\PajakApp\MsKendaraan;
use Illuminate\Support\Facades\Auth;

class MsKendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = MsKendaraan::where('flag', 1)->get();

        $data = [
            'kendaraan' => $kendaraan,
        ];
        // dd($data);

        return view('pajakApp/admin/kendaraan')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'keterangan_kendaraan' => 'required',
            'pajak_pertahun' => 'required',
            'denda_telat_perbulan' => 'required',
            'no_polisi' => 'required',
            'pembayar' => 'required',
        ]);
        $data  = [
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'keterangan_kendaraan' => $request->keterangan_kendaraan,
            'pajak_pertahun' => $request->pajak_pertahun,
            'denda_telat_perbulan' => $request->denda_telat_perbulan,
            'no_polisi' => $request->no_polisi,
            'pembayar' => $request->pembayar,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        // dd($data);
        $kendaraan = MsKendaraan::insert($data);

        // redirect
        if ($kendaraan) {
            return redirect('/kendaraan')->with('success', 'Data created successfully.');
        } else {
            return redirect('/kendaraan')->with('error', 'Failed!');
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
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'keterangan_kendaraan' => $request->keterangan_kendaraan,
            'pajak_pertahun' => $request->pajak_pertahun,
            'denda_telat_perbulan' => $request->denda_telat_perbulan,
            'no_polisi' => $request->no_polisi,
            'pembayar' => $request->pembayar,
            'updated_by'=> Auth::user()->id,
        ];
        // dd($request->all());
        $update = MsKendaraan::where('id', $request->id)->update($data);

        if ($update) {
            return redirect('/kendaraan')->with('success', 'Data updated successfully.');
        } else {
            return redirect('/kendaraan')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsKendaraan::where('id', $request->id)->update($data);

        if ($delete) {
            return redirect('/kendaraan')->with('success', 'Data Deleted.');
        } else {
            return redirect('/kendaraan')->with('error', 'Failed!');
        }
    }

    public function getAllKendaraan()
    {
        $kendaraan = MsKendaraan::where('flag', 1)->get();
        return $kendaraan;
    }

    public function getKendaraanShow(Request $request)
    {
        $id = $request->id;
        $kendaraan = MsKendaraan::where('flag', 1)->where('id', $id)->first();
        return $kendaraan;
    }
}
