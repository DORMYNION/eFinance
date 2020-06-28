<?php

namespace App\Http\Requests;

use App\CustomerNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomerNoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customer_notes,id',
        ];
    }
}
