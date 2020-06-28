<?php

namespace App\Http\Requests;

use App\CustomerDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomerDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customer_documents,id',
        ];
    }
}
