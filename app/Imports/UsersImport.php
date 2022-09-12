<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithValidation;
class UsersImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public $school_id;

    public function __construct($school_id)
    {
        $this->school_id = $school_id;
    }
    
    public function model(array $row)
    {



      return Student::updateOrCreate(
            [
            'first_name'    => $row['first_name'],
            'last_name'     => $row['last_name'],
            'school_id'     => $this->school_id,
            ],
            [
                'phone'         => $row['phone'],
                'password'      => Hash::make($row['first_name']),
            ]
        );

    }
    
    public function rules(): array
    {
        return [
            
            ];
    }
}
