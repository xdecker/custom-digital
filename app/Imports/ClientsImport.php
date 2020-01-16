<?php

namespace App\Imports;

use App\Client;

use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithValidation};

class ClientsImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    public function model(array $row)
    {
        return new Client([
            //
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'observations' => $row['observations'],
            'registrationDate' => date('Y/m/d H:i:s', strtotime($row['registrationdate'])),

        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'min:3',
            'email' => 'email',
            'phone' => 'digits:10|min:0|max:10',

        ];
    }
}
