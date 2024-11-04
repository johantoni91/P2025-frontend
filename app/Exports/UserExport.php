<?php

namespace App\Exports;

use app\API\Endpoint;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromArray, WithHeadings, WithMapping
{
    public function array(): array
    {
        $res = Endpoint::get('users/all', session('user')[0]['remember_token'])['data'];
        return $res;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Role'
        ];
    }

    public function map($user): array
    {
        return [
            $user['name'],
            $user['email'],
            $user['role']
        ];
    }
}
