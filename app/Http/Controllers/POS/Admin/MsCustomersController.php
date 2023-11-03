<?php

namespace App\Http\Controllers\POS\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Table\POS\MsCustomers;
use Illuminate\Support\Facades\Auth;

use App\Models\Table\POS\MsCategories;

class MsCustomersController extends Controller
{
    public function index()
    {
        $customers = MsCustomers::where('flag', 1)->get();

        $data = [
            'customers' => $customers,
        ];
        // dd($data);

        return view('pos/admin/customers')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $data  = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        dd($data);
        $customers = MsCustomers::insert($data);

        // redirect
        if ($customers) {
            return redirect('/customers')->with('success', 'Data created successfully.');
        } else {
            return redirect('/customers')->with('error', 'Failed!');
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
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'updated_by'=> Auth::user()->id,
        ];
        // dd($data);
        $update = MsCustomers::where('id', $request->id)->update($data);

        if ($update) {
            return redirect('/customers')->with('success', 'Data updated successfully.');
        } else {
            return redirect('/customers')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request, $id)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsCustomers::where('id', $request->id)->update($data);

        if ($delete) {
            return redirect('/customers')->with('success', 'Data Deleted.');
        } else {
            return redirect('/customers')->with('error', 'Failed!');
        }
    }
    public function getAllCustomer()
    {
        $category = MsCategories::where('flag', 1)->get();

        return $category;
    }

}
