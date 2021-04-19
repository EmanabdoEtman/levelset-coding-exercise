<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use DB; 

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function customerReport(Request $request)
    {                
        $orders = DB::table('projects') 
                ->select('projects.customer_name',  DB::raw("COUNT(distinct projects.id) as total_project")
               ,DB::raw("SUM(projects.project_qutstanding_debt) as total_debit"))
                 ->groupBy('projects.customer_name')->get(); 
 
        return view('customer', compact('orders'));
    } 


}
