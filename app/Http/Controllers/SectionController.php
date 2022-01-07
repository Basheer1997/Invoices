<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
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
        return view('section.section' ,compact('sections'));
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
     /*    $validatedData = $request->validate([
            'section_name' => 'required|max:255',
        ],[

            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',


        ]); */
       $input=$request->all();
       $name_exist=Section::where('section_name',$input['name'])->first();
       if($name_exist){
           session()->flash('erorr','خطأ الاسم موجود مسبقا');
           return redirect()->route('section.index');
       }
       Section::create([
        'section_name'=>$request->name,
        'description'=>$request->description,
        'Created_by'=>Auth::user()->name,
       ]);
       session()->flash('add','تم تسجيل القسم بنجاح');
       return redirect()->route('section.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $id = $request->id;

        $this->validate($request, [

            'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
            'description' => 'required',
        ],[

            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique' =>'اسم القسم مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',

        ]);

        $sections = Section::find($id);
        $sections->update([
            'section_name' => $request->section_name,
            'description' => $request->description,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/section');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        Section::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/section');
    }
}
