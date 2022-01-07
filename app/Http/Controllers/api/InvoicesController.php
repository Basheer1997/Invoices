<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Invoices;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    //
    public function index(){
        $invoices= Invoices::get();
        return response()->json($invoices);
    }
}
