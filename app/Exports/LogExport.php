<?php

namespace App\Exports;

use app\API\Endpoint;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LogExport implements FromArray, WithHeadings, WithMapping
{
    public function array(): array
    {
        $res = Endpoint::get('log/all', session('user')[0]['remember_token'])['data'];
        return $res;
    }

    public function headings(): array
    {
        return [
            'Username',
            'Aksi',
            'Entitas',
            'Alamat IP',
            'User Agent',
            'URL',
            'Pesan'
        ];
    }

    public function map($user): array
    {
        return [
            $user['username'],
            $user['action'],
            $user['entity'],
            $user['ip_address'],
            $user['user_agent'],
            $user['url'],
            $user['message']
        ];
    }
}
