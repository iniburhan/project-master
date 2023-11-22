<?php

namespace App\Http\Controllers\POS\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// add
use App\Models\Table\POS\MsProducts;
use App\Models\Table\POS\MsCategories;
use Illuminate\Support\Facades\Auth;

class MsProductsController extends Controller
{
    public function index()
    {
        $product = MsProducts::where('flag', 1)->get();

        $data = [
            'product' => $product,
            'categories' => MsCategories::where('flag', 1)->get(),
        ];
        // dd($data);

        return view('pos/admin/product')->with('data', $data);
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
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('pajakApp/photo'), $image);

        $data  = [
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $image,
            'category_id' => $request->category_id,
            'flag' => 1,
            'created_by'=> Auth::user()->id,
        ];
        // dd($data);
        $product = MsProducts::insert($data);

        // redirect
        if ($product) {
            return redirect('/products')->with('success', 'Data created successfully.');
        } else {
            return redirect('/products')->with('error', 'Failed!');
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
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $request->image,
            'updated_by'=> Auth::user()->id,
        ];
        // dd($request->all());
        $update = MsProducts::where('id', $request->id)->update($data);

        if ($update) {
            return redirect('/products')->with('success', 'Data updated successfully.');
        } else {
            return redirect('/products')->with('error', 'Failed!');
        }
    }

    public function destroy(Request $request)
    {
        $data = [
            'flag' => 0,
        ];
        // dd($data);
        $delete = MsProducts::where('id', $request->id)->update($data);

        if ($delete) {
            return redirect('/products')->with('success', 'Data Deleted.');
        } else {
            return redirect('/products')->with('error', 'Failed!');
        }
    }

    public function getAllProduct()
    {
        $product = MsProducts::where('flag', 1)->get();
        return $product;
    }

    public function getProductShow(Request $request)
    {
        $id = $request->id;
        $product = MsProducts::where('flag', 1)->where('id', $id)->first();
        return $product;
    }
}
