<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Code;

class CodesImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            Code::create(
                [
                    'code' => $row[0],
                    'serial_number' => $row[1],
                    'status' => 'unused',
                    'amount' => $row[2],
                    'category' => $row[3],
                    'alias' => $row[4],
                ]
            );
        }
    }
}
