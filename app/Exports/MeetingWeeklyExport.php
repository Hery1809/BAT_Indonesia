<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MeetingWeeklyExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths, WithStyles
{
    protected $data;


    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {

        return $this->data; 
    }

    public function headings(): array
    {
        return [
            'No',
            'Distributor',
            'Depo',
            'W1',
            'W2',
            'W3',
            'W4',
            'W5',
        ];
    }

    public function map($item): array
    {
        static $index = 0;  
        $index++;

        $distributorName = is_array($item) ? $item['distributor']['distributor_name'] : $item->distributor->distributor_name;
        $depoName = is_array($item) ? $item['depo']['depo_name'] : $item->depo->depo_name;

        $weeks = [];
        foreach (range(1, 5) as $week) {
            $status = is_array($item) ? ($item['statusForWeek'][$week] ?? 'not started') : $item->getStatusForWeek($week);
            $weeks[] = $this->mapStatus($status);
        }

        return array_merge([
            $index, 
            $distributorName,
            $depoName,
        ], $weeks);
    }

    protected function mapStatus($status)
    {
        if ($status == 'to review') {
            return 'to review';
        } elseif ($status == 'verified') {
            return 'verified';
        } elseif ($status == 'rejected') {
            return 'rejected';
        }

        return 'not started'; // Default text
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,
            'C' => 30,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 15,
            'H' => 15,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
            ],
            'A:H' => [
                'alignment' => [
                    'horizontal' => 'center',
                ],
            ],
        ];
    }
}
