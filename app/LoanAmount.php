<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class LoanAmount extends Model {

    public $table = 'loan_amounts';

    protected $dates = [
        'due_date',
        'created_at',
        'updated_at',
        'disbursed_date',
    ];

    protected $fillable = [
        'paid',
        'total',
        'status',
        'balance',
        'loan_id',
        'user_id',
        'due_date',
        'interest',
        'sub_total',
        'created_at',
        'updated_at',
        'loan_tenor',
        'loan_amount',
        'disbursed_date',
        'repayment_option',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function loan() {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function getLoanDateAttribute($value) {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLoanDateAttribute($value) {
        $this->attributes['disbursed_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDueDateAttribute($value) {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDueDateAttribute($value) {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}