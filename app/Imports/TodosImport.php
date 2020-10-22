<?php

namespace App\Imports;

use App\Todo;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class TodosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = Date::excelToDateTimeObject($row['order_date']);
        $date = $date->format('Y-m-d');

        return new Todo([
            'order_no'     => $row['order_no'],
            'buyer_name'    => $row['buyer_name'],
            'buyer_phone' => $row['buyer_phone'],
            'buyer_address' => $row['buyer_address'],
            'consign_no' => $row['consign_no'],
            'order_date' => $date,
        ]);
    }
}
