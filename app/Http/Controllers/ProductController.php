<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections=Section::all();
        $products=Product::all();
        return view('products.product',compact('sections','products'));
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
        //
        Product::create([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'section_id'=>$request->section_id,
        ]);
        session()->flash('add','تم اضافة الممنتج');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // return $request;
        $id = Section::where('section_name', $request->section_name)->first()->id;

        $Products = Product::findOrFail($request->pro_id);

        $Products->update([
        'product_name' => $request->product_name,
        'description' => $request->description,
        'section_id' => $id,
        ]);

        session()->flash('Edit', 'تم تعديل المنتج بنجاح');
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        // return $request;
        $product=Product::find($request->pro_id);
        $product->delete();
        session()->flash('Edit', 'تم الحذف المنتج بنجاح');
        return redirect('product');
    }
}
