<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'name' => $row[1],
            'numemp' => $row[2], 
            'address' => $row[3], 
            'foto' => $row[4],
            'position_id' => $row[5], 
        ]);
    }
}
