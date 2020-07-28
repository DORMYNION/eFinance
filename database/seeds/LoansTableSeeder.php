<?php

use App\Loan;
use Illuminate\Database\Seeder;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Loan::create([
        //     'user_id'                   => 2,
        //     'loan_exist'                => 'No',
        //     'loan_exist_type'           => null,
        //     'loan_exist_amount'         => null,
        //     'purpose_of_loan'           => 'Portable Goods',
        //     'repayment_option'          => 'Monthly',
        //     'loan_amount'               => 100000.00,
        //     'loan_duration'             => 1,
        //     'interest'                  => 6000.00,
        //     'total'                     => 106000.00,
        //     'viewed'                    => 0,
        //     'status'                    => 'Due',
        // ]);
        // Loan::create([
        //     'user_id'                   => 2,
        //     'loan_exist'                => 'No',
        //     'loan_exist_type'           => null,
        //     'loan_exist_amount'         => null,
        //     'purpose_of_loan'           => 'Portable Goods',
        //     'repayment_option'          => 'Monthly',
        //     'loan_amount'               => 100000.00,
        //     'loan_duration'             => 1,
        //     'interest'                  => 6000.00,
        //     'total'                     => 106000.00,
        //     'viewed'                    => 0,
        //     'status'                    => 'Pending',
        // ]);
        // Loan::create([
        //     'user_id'                   => 2,
        //     'loan_exist'                => 'No',
        //     'loan_exist_type'           => null,
        //     'loan_exist_amount'         => null,
        //     'purpose_of_loan'           => 'Portable Goods',
        //     'repayment_option'          => 'Monthly',
        //     'loan_amount'               => 100000.00,
        //     'loan_duration'             => 1,
        //     'interest'                  => 6000.00,
        //     'total'                     => 106000.00,
        //     'viewed'                    => 0,
        //     'status'                    => 'Declined',
        // ]);
        // Loan::create([
        //     'user_id'                   => 2,
        //     'loan_exist'                => 'No',
        //     'loan_exist_type'           => null,
        //     'loan_exist_amount'         => null,
        //     'purpose_of_loan'           => 'Portable Goods',
        //     'repayment_option'          => 'Monthly',
        //     'loan_amount'               => 100000.00,
        //     'loan_duration'             => 1,
        //     'interest'                  => 6000.00,
        //     'total'                     => 106000.00,
        //     'viewed'                    => 0,
        //     'status'                    => 'Reviewing',
        // ]);
        // Loan::create([
        //     'user_id'                   => 2,
        //     'loan_exist'                => 'No',
        //     'loan_exist_type'           => null,
        //     'loan_exist_amount'         => null,
        //     'purpose_of_loan'           => 'Portable Goods',
        //     'repayment_option'          => 'Monthly',
        //     'loan_amount'               => 100000.00,
        //     'loan_duration'             => 1,
        //     'interest'                  => 6000.00,
        //     'total'                     => 106000.00,
        //     'viewed'                    => 0,
        //     'status'                    => 'Disbursed',
        // ]);
        // Loan::create([
        //     'user_id'                   => 2,
        //     'loan_exist'                => 'No',
        //     'loan_exist_type'           => null,
        //     'loan_exist_amount'         => null,
        //     'purpose_of_loan'           => 'Portable Goods',
        //     'repayment_option'          => 'Monthly',
        //     'loan_amount'               => 100000.00,
        //     'loan_duration'             => 1,
        //     'interest'                  => 6000.00,
        //     'total'                     => 106000.00,
        //     'viewed'                    => 0,
        //     'status'                    => 'Paid',
        // ]);
        // Loan::create([
        //     'user_id'                   => 2,
        //     'loan_exist'                => 'No',
        //     'loan_exist_type'           => null,
        //     'loan_exist_amount'         => null,
        //     'purpose_of_loan'           => 'Portable Goods',
        //     'repayment_option'          => 'Monthly',
        //     'loan_amount'               => 100000.00,
        //     'loan_duration'             => 1,
        //     'interest'                  => 6000.00,
        //     'total'                     => 106000.00,
        //     'viewed'                    => 0,
        //     'status'                    => 'Paid',
        // ]);
        // Loan::create([
        //     'user_id'                   => 2,
        //     'loan_exist'                => 'No',
        //     'loan_exist_type'           => null,
        //     'loan_exist_amount'         => null,
        //     'purpose_of_loan'           => 'Portable Goods',
        //     'repayment_option'          => 'Monthly',
        //     'loan_amount'               => 100000.00,
        //     'loan_duration'             => 1,
        //     'interest'                  => 6000.00,
        //     'total'                     => 106000.00,
        //     'viewed'                    => 0,
        //     'status'                    => 'Awaiting Disbursment',
        // ]);
        // Loan::create([
        //     "user_id"                   => 2,
        //     "viewed"                    => 0,
        //     "loan_amount"               => 100000.00,
        //     "status"                    => "Declined",
        //     "customer_type"             => "New",
        //     "loan_exist"                => "No",
        //     "loan_exist_type"           => null,
        //     "loan_exist_amount"         => null,
        //     "purpose_of_loan"           => "Other Expenses",
        //     "repayment_option"          => "Monthly",
        //     "loan_duration"             => 1,
        //     "interest"                  => 6000.00,
        //     "total"                     => 106000.00,
        // ]);
        // Loan::create([
        //     "user_id"                   => 3,
        //     "viewed"                    => 0,
        //     "loan_amount"               => 1440000.00,
        //     "status"                    => "Pending",
        //     "customer_type"             => "New",
        //     "loan_exist"                => "No",
        //     "loan_exist_type"           => null,
        //     "loan_exist_amount"         => null,
        //     "purpose_of_loan"           => "Travel\/Holiday",
        //     "repayment_option"          => "Monthly",
        //     "loan_duration"                => 2,
        //     "interest"                  => 172800.00,
        //     "total"                     => 1612800.00,
        // ]);
        // Loan::create([
        //     "user_id"                   => 4,
        //     "viewed"                    => 0,
        //     "loan_amount"               => 2000000.00,
        //     "status"                    => "Approved",
        //     "customer_type"             => "New",
        //     "loan_exist"                => "No",
        //     "loan_exist_type"           => null,
        //     "loan_exist_amount"         => null,
        //     "purpose_of_loan"           => "Other Expenses",
        //     "repayment_option"          => "Bullet",
        //     "loan_duration"             => 3,
        //     "interest"                  => 18000.00,
        //     "total"                     => 2018000.00,
        // ]);
        // Loan::create([
        //     "user_id"                   => 5,
        //     "viewed"                    => 0,
        //     "loan_amount"               => 2000000.00,
        //     "status"                    => "Approved",
        //     "customer_type"             => "New",
        //     "loan_exist"                => "No",
        //     "loan_exist_type"           => null,
        //     "loan_exist_amount"         => null,
        //     "purpose_of_loan"           => "Other Expenses",
        //     "repayment_option"          => "Bullet",
        //     "loan_duration"             => 2,
        //     "interest"                  => 240000.00,
        //     "total"                     => 2240000.00,
        // ]);
        // Loan::create([
        //     "user_id"                   => 5,
        //     "viewed"                    => 0,
        //     "loan_amount"               => 1000000.00,
        //     "status"                    => "Pending",
        //     "customer_type"             => "New",
        //     "loan_exist"                => "No",
        //     "loan_exist_type"           => null,
        //     "loan_exist_amount"         => null,
        //     "purpose_of_loan"           => "Other Expenses",
        //     "repayment_option"          => "Bullet",
        //     "loan_duration"             => 6,
        //     "interest"                  => 36000.00,
        //     "total"                     => 1036000.00,
        // ]);
    }
}

