<?php

namespace App\Http\Requests;

use App\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'loan_id'        => [
                'required',
                'integer',
            ],
            'loan_amount_id' => [
                'required',
                'integer',
            ],
            'payment_method' => [
                'required',
            ],
            'amount'         => [
                'required',
            ],
            'paid_at'        => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'transaction'    => [
                'required',
            ],
        ];
    }
}