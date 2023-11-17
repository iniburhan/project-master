<?php

namespace App\Http\Controllers\PajakApp\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Table\PajakApp\MsPegawai;
use Illuminate\Support\Facades\Auth;

class MsPegawaiController extends Controller
{
    public function index()
    {
        $pegawai = MsPegawai::where('flag', 1)->get();

        $data = [
            'pegawai' => $pegawai,
        ];
        // dd($data);

        return view('pajakApp/admin/pegawai')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nrp' => 'required',
            'nama_pegawai' => 'required',
        ]);
        $data  = [
            'nrp' => $request->nrp,
            'nama_pegawai' => $request->nama_pegawai,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        // dd($data);
        $pegawai = MsPegawai::insert($data);

        // redirect
        if ($pegawai) {
            return redirect('/pegawai')->with('success', 'Data created successfully.');
        } else {
            return redirect('/pegawai')->with('error', 'Failed!');
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
            'nrp' => $request->nrp,
            'nama_pegawai' => $request->nama_pegawai,
            'updated_by'=> Auth::user()->id,
        ];
        // dd($request->all());
        $update = MsPegawai::where('id', $request->id)->update($data);

        if ($update) {
            return redirect('/pegawai')->with('success', 'Data updated successfully.');
        } else {
            return redirect('/pegawai')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsPegawai::where('id', $request->id)->update($data);

        if ($delete) {
            return redirect('/pegawai')->with('success', 'Data Deleted.');
        } else {
            return redirect('/pegawai')->with('error', 'Failed!');
        }
    }

    public function getAllPegawai()
    {
        $pegawai = MsPegawai::where('flag', 1)->get();
        return $pegawai;
    }

    public function getPegawaiShow(Request $request)
    {
        $id = $request->id;
        $pegawai = MsPegawai::where('flag', 1)->where('id', $id)->first();
        return $pegawai;
    }
}
