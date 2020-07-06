<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Loan extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'loans';

    const LOAN_EXIST_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const REPAYMENT_OPTION_SELECT = [
        'Monthly' => 'Monthly',
        'Bullet'  => 'Bullet',
    ];

    const STATUS_SELECT = [
        'Pending'   => 'Pending',
        'Reviewing' => 'Reviewing',
        'Approved'  => 'Approved',
        'Declined'  => 'Declined',
    ];

    const CUSTOMER_TYPE_SELECT = [
        'New'   => 'New',
        'Old' => 'Old',
    ];

    protected $fillable = [
        'customer_id',
        'loan_exist',
        'loan_exist_type',
        'loan_exist_amount',
        'purpose_of_loan',
        'repayment_option',
        'loan_amount',
        'loan_duration',
        'interest',
        'total',
        'viewed',
        'status',
        'customer_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const LOAN_EXIST_TYPE_SELECT = [
        'Mortgage'      => 'Mortgage',
        'Overdraft'     => 'Overdraft',
        'Business'      => 'Business',
        'Car Loan'      => 'Car Loan',
        'Personal Loan' => 'Personal Loan',
        'Credit Card'   => 'Credit Card',
        'Others'        => 'Others',
    ];

    const PURPOSE_OF_LOAN_SELECT = [
        'Portable Goods'        => 'Portable Goods',
        'Travel/Holiday'        => 'Travel/Holiday',
        'School Fees'           => 'School Fees',
        'Rent'                  => 'Rent',
        'Household Maintenance' => 'Household Maintenance',
        'Fashion'               => 'Fashion',
        'Medical'               => 'Medical',
        'Wedding/Events'        => 'Wedding/Events',
        'Other Expenses'        => 'Other Expenses',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        Loan::observe(new \App\Observers\LoanActionObserver);
    }

    public function loanLoanAmounts()
    {
        return $this->hasMany(LoanAmount::class, 'loan_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}