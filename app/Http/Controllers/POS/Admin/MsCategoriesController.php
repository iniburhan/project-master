<?php

namespace App\Http\Controllers\POS\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Table\POS\MsCategories;
use Illuminate\Support\Facades\Auth;

class MsCategoriesController extends Controller
{
    public function index()
    {
        $category = MsCategories::where('flag', 1)->get();

        $data = [
            'categories' => $category,
        ];
        // dd($data);

        return view('pos/admin/categories')->with('data', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data  = [
            'name' => $request->name,
            'description' => $request->description,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        // dd($data);
        $category = MsCategories::insert($data);

        // redirect
        if ($category) {
            return redirect('/categories')->with('success', 'Data created successfully.');
        } else {
            return redirect('/categories')->with('error', 'Failed!');
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
            'name' => $request->name,
            'description' => $request->description,
            'updated_by'=> Auth::user()->id,
        ];
        // dd($data);
        $update = MsCategories::where('id', $request->id)->update($data);

        if ($update) {
            return redirect('/categories')->with('success', 'Data updated successfully.');
        } else {
            return redirect('/categories')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request, $id)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsCategories::where('id', $request->id)->update($data);

        if ($delete) {
            return redirect('/categories')->with('success', 'Data Deleted.');
        } else {
            return redirect('/categories')->with('error', 'Failed!');
        }
    }
}
