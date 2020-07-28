<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class LoanRepayment extends Model
{
    public $table = 'loan_repayments';

    protected $dates = [
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tenor',
        'amount',
        'status',
        'loan_id',
        'user_id',
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'loan_amount_id',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
    
    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDueDateAttribute($value) {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDueDateAttribute($value) {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
