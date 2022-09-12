<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class StudentQueryExport implements FromCollection
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($school_id)
    {
        $this->school_id = $school_id;
    }

    public function collection()
    {

        return Student::select('first_name','last_name')->where('school_id',$this->school_id)->get();
    }
}
