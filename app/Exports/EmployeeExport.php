<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EmployeeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $var =Employee::select('employee.id','name','address','position.position')
        ->join('position','position_id', '=', 'position.id')
        ->orderBy('employee.id')
        ->get();
        return $var;
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama',
            'Alamat',
            'Jabatan',
        ];
    }
}
