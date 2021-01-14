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

        //If record exists update, else create
        $todo = Todo::updateOrCreate(
            ['order_no' => $row['order_no']],
            [
                'buyer_name' => ucwords($row['buyer_name']),
                'buyer_phone' => $row['buyer_phone'],
                'buyer_address' => ucwords($row['buyer_address']),
                'buyer_state' => ucwords($row['buyer_state']),
                'refund_reason' => ucwords($row['refund_reason']),
                'price' => $row['price'],
                'consign_no' => $row['consign_no'],
                'order_date' => $date,
                'refund_applied' => empty($row['refund_applied']) ? 0 : 1,
            ]
        );
        return $todo;

        /*return new Todo([
            'order_no' => $row['order_no'],
            'buyer_name' => ucwords($row['buyer_name']),
            'buyer_phone' => $row['buyer_phone'],
            'buyer_address' => ucwords($row['buyer_address']),
            'consign_no' => $row['consign_no'],
            'order_date' => $date,
            'refund_applied' => empty($row['refund_applied']) ? 0 : 1,
        ]);*/
    }
}
