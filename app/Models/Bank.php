<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'bank_name',
        'ifsc_code',
        'acc_no',
        'branch_name',
    ];
}
