<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->subcate = new Subcategory();
    }

    public function index()
    {
        $subCategories = Subcategory::with('cat:name,id')->get();
        return view("admin.subcategory.index",['subCategories'=>$subCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategories = Subcategory::with('cat:name,id')->get();
        return response()->json(['subCategories' => $subCategories]);
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
            'subcat_name' => 'required|unique:subcategories,subcat_name|max:150',
            'main_cat' => 'required|max:150',
            'description' => 'required|max:255',
        ]);

        $subcategory = new Subcategory;
        $subcategory->subcat_name = $request->input("subcat_name");
        $subcategory->main_cat = $request->input("main_cat");
        $subcategory->description = $request->input("description");
        $subcategory->save();
        return response()->json(['status' => "success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show($sub_id)
    {
        $subCategory = Subcategory::with('cat:name,id')->where('sub_id',$sub_id)->first();
        return response()->json(['subCategory' => $subCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sub_id)
    {
        request()->validate([
            'subcat_name' => 'required|max:150',
            'main_cat' => 'required|max:150',
            'description' => 'required|max:255',
        ]);

        $subcategory = Subcategory::find($sub_id);
        $subcategory->subcat_name = $request->input("subcat_name");
        $subcategory->main_cat = $request->input("main_cat");
        $subcategory->description = $request->input("description");
        $subcategory->update();
        return response()->json(['status' => "success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($sub_id)
    {
        $subCategory = Subcategory::find($sub_id);
        $subCategory->delete();
        return response()->json(['status' => "success"]);
    }
}
