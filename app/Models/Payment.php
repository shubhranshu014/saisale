<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
protected $fillable = [
    'supplier_id',
    'amount',
    'payment_mode',
    'receipt_no',
    'description',
    'payment_date',
    'bank_id',
    'upi_id',
    'cheque_no',
    'cheque_bank_name',
];

public function supplier()
{
    return $this->belongsTo(Supplier::class);
}

public function bank()
{
    return $this->belongsTo(Bank::class);
}
}
