<?php

namespace App\Imports;

use App\Client;

use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithValidation};

class ClientsImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;



    public function model(array $row)
    {
        $valor_anuncio = session('anuncio');
        return new Client([
            //
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'observations' => $row['observations'],
            'registrationDate' => $row['registrationdate'],
            'anuncio_id' => $valor_anuncio

        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'min:3',
            'email' => 'email',
            'phone' => 'digits:10|min:0|max:10',
            'registrationDate' => 'max:10',


        ];
    }
}
