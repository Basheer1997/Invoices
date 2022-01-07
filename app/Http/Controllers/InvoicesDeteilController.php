<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\InvoicesAttachment;
use App\Models\InvoicesDeteil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoicesDeteilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoicesDeteil  $invoicesDeteil
     * @return \Illuminate\Http\Response
     */
    public function show(InvoicesDeteil $invoicesDeteil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoicesDeteil  $invoicesDeteil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        /* return $id; */
        $invoices = Invoices::where('id',$id)->first();
        $details  = InvoicesDeteil::where('id_Invoice',$id)->get();
        $attachments  = InvoicesAttachment::where('invoice_id',$id)->get();

        return view('invoices.invoiceDeteils',compact('invoices','details','attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoicesDeteil  $invoicesDeteil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoicesDeteil $invoicesDeteil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoicesDeteil  $invoicesDeteil
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoicesDeteil $invoicesDeteil)
    {
        //
    }
    public function get_file($invoice_number,$file_name)

    {
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->download( $contents);
    }



    public function open_file($invoice_number,$file_name)

    {
        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->file($files);
    }
}
