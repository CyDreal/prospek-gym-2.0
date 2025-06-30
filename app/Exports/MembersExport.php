<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class MembersExport implements FromArray, WithTitle, WithDrawings, WithEvents
{
    protected $data;

    public function __construct()
    {
        $members = Member::select('id', 'name', 'alamat', 'phone', 'paket_nama', 'status')->get();

        $this->data = [
            ['', '', '', '', '', ''], // baris 1 (kosong, untuk logo)
            ['Daftar Member Gym XYZ'], // baris 2 (kosong)

            [''], // baris 3: judul besar

            [], // baris 4: kosong

            ['ID', 'Nama', 'Alamat', 'Telepon', 'Paket', 'Status'], // baris 5: heading
        ];

        foreach ($members as $member) {
            $this->data[] = [
                $member->id,
                $member->name,
                $member->alamat,
                $member->phone,
                $member->paket_nama,
                $member->status,
            ];
        }
    }

    public function array(): array
    {
        return $this->data;
    }

    public function title(): string
    {
        return 'Members';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo Gym');
        $drawing->setPath(public_path('images/logo.png'));
        $drawing->setHeight(60);
        $drawing->setCoordinates('A1');

        return [$drawing];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                $sheet->mergeCells('A2:F2');
                $sheet->setCellValue('A2', 'Daftar Member Prospek Gym');

                // Judul besar
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 18],
                    'alignment' => ['horizontal' => 'center'],
                ]);

                // Heading style
                $sheet->getStyle('A4:F4')->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => 'center'],
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['argb' => 'FFEEF1F7']
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => 'thin'],
                    ],
                ]);

                // Data styling
                $totalData = count($this->data);
                $sheet->getStyle("A5:F$totalData")->applyFromArray([
                    'alignment' => [
                        'vertical' => 'center',
                        'horizontal' => 'left'
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => 'thin']
                    ],
                ]);

                // Rata tengah kolom ID dan Status
                $sheet->getStyle("A5:A$totalData")->getAlignment()->setHorizontal('center');
                $sheet->getStyle("F5:F$totalData")->getAlignment()->setHorizontal('center');

                // Auto-size kolom
                foreach (range('A', 'F') as $col) {
                    $sheet->getDelegate()->getColumnDimension($col)->setAutoSize(true);
                }

                // Optional: freeze header
                $sheet->freezePane('A5');
            }
        ];
    }
}
