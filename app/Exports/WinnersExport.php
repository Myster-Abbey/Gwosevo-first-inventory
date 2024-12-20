<?php
namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WinnersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithStyles
{
    protected $winners;

    public function __construct(Collection $winners)
    {
        $this->winners = $winners;
    }

    public function collection()
    {
        return $this->winners;
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Phone Number',
            'Network',
            'Code',
            'Region',
            'Amount',
            'Draw id'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function map($winner): array
    {
        return [
            (string) $winner->full_name,
            (string) $winner->msisdn,
            (string) $winner->network,
            (string) $winner->code,
            (string) $winner->region,
            (string) $winner->amount,
            $winner->draw_id,
            // ($winner->disbursed_status == "1" ? 'Yes' : 'No'),
            // (string) number_format((float) $winner->amount, 2, '.', ''),
            // \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $winner->created_at)->format('Y-M-d'),
        ];
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         'A' => NumberFormat::FORMAT_NUMBER,
    //         'F' => NumberFormat::FORMAT_NUMBER_00,
    //         'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //     ];
    // }
}
