<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_all =invoices::count();
        $count_invoices1 = invoices::where('Value_Status', 1)->count();
        $count_invoices2 = invoices::where('Value_Status', 2)->count();
        $count_invoices3 = invoices::where('Value_Status', 3)->count();
        $paid_invoices=Invoices::where('Status','مدفوعة')->count();
        $unPaid_invoices=Invoices::where('Status','غير مدفوعة')->count();
        $partial_paid=Invoices::where('Status','مدفوعة جزئيا')->count();
        if($count_invoices2 == 0){
            $nspainvoices2=0;
        }
        else{
            $nspainvoices2 = $count_invoices2/ $count_all*100;
        }

          if($count_invoices1 == 0){
              $nspainvoices1=0;
          }
          else{
              $nspainvoices1 = $count_invoices1/ $count_all*100;
          }

          if($count_invoices3 == 0){
              $nspainvoices3=0;
          }
          else{
              $nspainvoices3 = $count_invoices3/ $count_all*100;
          }


          $barchartjs = app()->chartjs
              ->name('barChartTest')
              ->type('bar')
              ->size(['width' => 350, 'height' => 170])
              ->labels(['الفواتير الغير المدفوعة', 'الفواتير المدفوعة','الفواتير المدفوعة جزئيا'])
              ->datasets([
                  [
                      "label" => "الفواتير الغير المدفوعة",
                      'backgroundColor' => ['#ec5858'],
                      'data' => [$nspainvoices2]
                  ],
                  [
                      "label" => "الفواتير المدفوعة",
                      'backgroundColor' => ['#81b214'],
                      'data' => [$nspainvoices1]
                  ],
                  [
                      "label" => "الفواتير المدفوعة جزئيا",
                      'backgroundColor' => ['#ff9642'],
                      'data' => [$nspainvoices3]
                  ],


              ])
              ->options([]);
        $piechartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['الفواتير المدفوعة', 'الفواتير الغير مدفوعة','الفواتير المدفوعة جزئيا'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB','#F7EB02'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#F7EB02'],
                'data' => [$paid_invoices, $unPaid_invoices,$partial_paid]
            ]
        ])
        ->options([]);



        return view('home',compact('piechartjs','barchartjs'));
    }
}
