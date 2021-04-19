<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use DB; 

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request)
    {           
        $orders = DB::table('orders')
                ->leftJoin('projects', 'orders.project_id', '=', 'projects.id')
                ->select('projects.customer_name', 'projects.project_name',
                 'orders.type', 'orders.deadline')->get(); 
 
        return view('order', compact('orders'));
    } 

}
