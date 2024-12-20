<?php

namespace App\Imports;

use App\Models\Blacklist;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class NumbersImport implements ToCollection
{
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            Blacklist::create(
                [
                    'msisdn' => $row[0],
                    'name' => $row[1],
                ]
            );
        }
    }
}
