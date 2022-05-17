<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        dd($row);
        return new User([
            'role_id'     => $row['role_id'],
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => bcrypt($row['password']),
            'membership_type' => $row['membership_type']
        ]);
    }
    public function headings(): array
    {
        return [
            "role_id",
            "name",
            "email",
            "password",
            "membership_type",
        ];
    }

}
