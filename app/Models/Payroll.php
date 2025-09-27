<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'period_start',
        'period_end',
        'basic',
        'TA',
        'DA',
        'allowances',
        'net_pay',
        'leaves',
        'notes',
    ];

    protected $casts = [
        'period_start' => 'date',
        'period_end' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeeDetail::class, 'employee_id');
    }

    /**
     * Calculate net pay based on components and leaves
     */
    public function calculateNetPay($leaves = 0)
    {
        $totalSalary = $this->basic + $this->TA + $this->DA + $this->allowances;

        // Deduction for leaves (simple: pro-rate per day)
        $daysInMonth = $this->period_start->daysInMonth;
        $perDaySalary = $totalSalary / $daysInMonth;
        $leaveDeduction = $perDaySalary * $leaves;

        $this->net_pay = round($totalSalary - $leaveDeduction, 2);

        return $this->net_pay;
    }
}
