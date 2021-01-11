<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'order_no', 'buyer_name', 'buyer_phone', 'buyer_address', 'buyer_state', 'price', 'consign_no', 'order_date', 'refund_applied', 'refund_reason'
    ];
}
