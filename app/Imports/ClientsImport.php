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
        ]);
    }

    public function rules(): array
    {
        return [
            'registration_number' => 'regex:/[A-Z]{3}-[0-9]{3}/',
            'doors' => 'in:2,4,6',
            'years' => 'between:1998,2017'
        ];
    }
}
