<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CustomerDocument;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCustomerDocumentRequest;
use App\Http\Requests\UpdateCustomerDocumentRequest;
use App\Http\Resources\Admin\CustomerDocumentResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerDocumentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('customer_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerDocumentResource(CustomerDocument::with(['customer'])->get());
    }

    public function store(StoreCustomerDocumentRequest $request)
    {
        $customerDocument = CustomerDocument::create($request->all());

        if ($request->input('document_file', false)) {
            $customerDocument->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
        }

        return (new CustomerDocumentResource($customerDocument))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerDocument $customerDocument)
    {
        abort_if(Gate::denies('customer_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerDocumentResource($customerDocument->load(['customer']));
    }

    public function update(UpdateCustomerDocumentRequest $request, CustomerDocument $customerDocument)
    {
        $customerDocument->update($request->all());

        if ($request->input('document_file', false)) {
            if (!$customerDocument->document_file || $request->input('document_file') !== $customerDocument->document_file->file_name) {
                $customerDocument->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
            }
        } elseif ($customerDocument->document_file) {
            $customerDocument->document_file->delete();
        }

        return (new CustomerDocumentResource($customerDocument))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerDocument $customerDocument)
    {
        abort_if(Gate::denies('customer_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDocument->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
