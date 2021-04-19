<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Order;
use App\Models\Project;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input; 
use App\Imports\TransactionsImport;
use Carbon\Carbon;
use DB;

class FileUpload extends Controller
{  
    public function fileUpload(Request $request){
        
       // $extension = $request->file->getClientOriginalExtension();
 
        if( $request->hasFile('file')){

            $path = $request->file('file')->getRealPath(); 
            \Excel::import(new TransactionsImport,$request->file); 
            //get project if doesn't has order
            $projects = Project::where(['has_order' => 0])->get(); 
            $noticeType=0;//Notice
            $lienType=1;//Lien
            foreach ($projects as $project) { 
                //Deadline Calculation case 1
                // Notice 
                $date = Carbon::createFromFormat('Y-m-d', $project->project_commencement_date);
                $NoticeDeadline = $date->addDays(60);
                if($project->project_state=='Texas'){
                    //Deadline Calculation case 3
                    $NoticeDeadline = $date->addDays(15);
                }

                    $order['project_id'] = $project->id; 
                    $order['type'] =$noticeType; 
                    $order['deadline'] = $NoticeDeadline;   
                    Order::create($order); 
                    //Deadline Calculation case 2
                    // Lien 
                    $date = Carbon::createFromFormat('Y-m-d', $project->project_start_date);
                    $lienDeadline = $date->addDays(90);

                    $order['project_id'] = $project->id; 
                    $order['type'] =$lienType; 
                    $order['deadline'] = $lienDeadline;   
                    Order::create($order); 
                    //update project
                    Project::where('id', $project->id)
              ->update(['has_order' => 1]); 
                }
 
                 \Session::put('success', 'Your file is imported successfully in database.');
                
                return back();


            }else{
                
                \Session::put('error', 'Please upload CSV file');
                
                return back();
            }
   }
 
} 
