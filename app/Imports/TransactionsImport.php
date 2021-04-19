<?php

namespace App\Imports;


use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;

class TransactionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 
        if($row[0]!=''&&$row[1]!=''&&$row[2]!=''&&$row[3]!=''&&$row[4]!=''&&$row[5]!=''&&$row[6]!='')
        {
        if($row[4] !='Project State')
        {
            return new Project([
            'customer_name'     => $row[0], 
            'project_name'     => $row[1],  
            'project_address'     => $row[2],  
            'project_city'     => $row[3],  
            'project_state'     => $row[4],  
            'project_zip'     => $row[5],  
            'project_start_date'     => $row[6],  
            'project_qutstanding_debt'     => $row[7],  
            'project_commencement_date'     => $row[8],   
            'has_order'     => 0,   
        ]); 
        } 
    }
    }
}
