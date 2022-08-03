<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.supplier.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::get();
        return response()->json(['suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:suppliers,name|max:150',
            'email' => 'required|email|max:255',
            'mobile' => 'required|max:255',
        ]);

        // adding into database
        $supplier = new Supplier;
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->mobile = $request->input('mobile');
        $supplier->save();
        return response()->json(['status' => "success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return response()->json(['supplier' => $supplier]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|unique:suppliers,name|max:150',
            'email' => 'required|email|max:255',
            'mobile' => 'required|max:255',
        ]);

        // Updating in database
        $supplier = Supplier::find($id);
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->mobile = $request->input('mobile');
        $supplier->update();
        return response()->json(['status' => "success"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return response()->json(['status' => "success"]);  
    }
}
