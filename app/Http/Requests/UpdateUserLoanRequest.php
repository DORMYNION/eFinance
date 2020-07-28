<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserLoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'loan_exist'       => [
            //     'required',
            // ],
            // 'purpose_of_loan'  => [
            //     'required',
            // ],
            // 'repayment_option' => [
            //     'required',
            // ],
            // 'loan_duration'    => [
            //     'required',
            //     'integer',
            //     'min:-2147483648',
            //     'max:2147483647',
            // ],
            // 'interest'         => [
            //     'required',
            // ],
            // 'total'            => [
            //     'required',
            // ],
            'status'           => [
                'required',
            ],
        ];
    }
}