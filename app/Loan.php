<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Loan extends Model {
    use SoftDeletes, Auditable;

    public $table = 'loans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'customer_id',
        'viewed',
        'loan_amount',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'Pending'   => 'Pending',
        'Reviewing' => 'Reviewing',
        'Approved'  => 'Approved',
        'Declined'  => 'Declined',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public function loanLoanAmounts() {
        return $this->hasMany(LoanAmount::class, 'loan_id', 'id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}