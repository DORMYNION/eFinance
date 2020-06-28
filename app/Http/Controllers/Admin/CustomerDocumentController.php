<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\CustomerDocument;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCustomerDocumentRequest;
use App\Http\Requests\StoreCustomerDocumentRequest;
use App\Http\Requests\UpdateCustomerDocumentRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CustomerDocumentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('customer_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDocuments = CustomerDocument::all();

        return view('admin.customerDocuments.index', compact('customerDocuments'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customerDocuments.create', compact('customers'));
    }

    public function store(StoreCustomerDocumentRequest $request)
    {
        $customerDocument = CustomerDocument::create($request->all());

        if ($request->input('document_file', false)) {
            $customerDocument->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $customerDocument->id]);
        }

        return redirect()->route('admin.customer-documents.index');
    }

    public function edit(CustomerDocument $customerDocument)
    {
        abort_if(Gate::denies('customer_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customerDocument->load('customer');

        return view('admin.customerDocuments.edit', compact('customers', 'customerDocument'));
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

        return redirect()->route('admin.customer-documents.index');
    }

    public function show(CustomerDocument $customerDocument)
    {
        abort_if(Gate::denies('customer_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDocument->load('customer');

        return view('admin.customerDocuments.show', compact('customerDocument'));
    }

    public function destroy(CustomerDocument $customerDocument)
    {
        abort_if(Gate::denies('customer_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerDocumentRequest $request)
    {
        CustomerDocument::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('customer_document_create') && Gate::denies('customer_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CustomerDocument();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
