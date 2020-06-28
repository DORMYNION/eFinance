<?php

namespace App\Http\Requests;

use App\LoanAmount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLoanAmountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('loan_amount_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'loan_id'   => [
                'required',
                'integer',
            ],
            'sub_total' => [
                'required',
            ],
            'interest'  => [
                'required',
            ],
            'total'     => [
                'required',
            ],
            'loan_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'due_date'  => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}