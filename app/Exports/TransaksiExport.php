<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Transaksi::all(['id', 'produk_id', 'quantity', 'created_at']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Produk',
            'Quantity',
            'Tanggal Dibuat',
        ];
    }
}
