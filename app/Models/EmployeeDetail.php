<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
      'emp_id',
        'fullName',
        'email',
        'hiring_position',
        'dob',
        'gender',
        'contact_no',
        'address',
        'current_pay',
        'assets',
        'date_of_joining',
        'photo',
        'adhar_card',
        'cv',
        'bank_account_no',
        'ifsc_code',
        'bank_name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            if (empty($employee->emp_id)) {
                $latest = self::latest('id')->first();
                $nextId = $latest ? $latest->id + 1 : 1;
                $employee->emp_id = 'EMP' . str_pad($nextId, 4, '0', STR_PAD_LEFT); 
                // e.g., EMP0001, EMP0002
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
