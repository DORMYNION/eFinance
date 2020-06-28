<?php

namespace App\Http\Requests;

use App\CustomerNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCustomerNoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_note_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
            ],
            'note'        => [
                'required',
            ],
        ];
    }
}
