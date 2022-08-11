<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributeValue = new AttributeValue;
        $attributeValue->attr_id = $request->input("val_id");
        $attributeValue->value = $request->input("val_name");
        $attributeValue->save();
        return response()->json(['res'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeValue $attributeValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeValue $attributeValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeValue $attributeValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $attributeValue = AttributeValue::find($request->input("id"));
        $attributeValue->delete();
        return response()->json(['res'=>'success']);
    }
}
