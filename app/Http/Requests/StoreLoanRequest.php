<?php

namespace App\Http\Requests;

use App\Loan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLoanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('loan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'customer_id'      => [
                'required',
                'integer',
            ],
            'loan_exist'       => [
                'required',
            ],
            'purpose_of_loan'  => [
                'required',
            ],
            'repayment_option' => [
                'required',
            ],
            'loan_amount'      => [
                'required',
            ],
            'loan_duration'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'interest'         => [
                'required',
            ],
            'total'            => [
                'required',
            ],
            'status'           => [
                'required',
            ],
        ];
    }
}