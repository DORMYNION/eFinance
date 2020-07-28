<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CustomerNote;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerNoteRequest;
use App\Http\Requests\UpdateCustomerNoteRequest;
use App\Http\Resources\Admin\CustomerNoteResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerNotesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_note_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerNoteResource(CustomerNote::with(['customer'])->get());
    }

    public function store(StoreCustomerNoteRequest $request)
    {
        $customerNote = CustomerNote::create($request->all());

        return (new CustomerNoteResource($customerNote))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerNote $customerNote)
    {
        abort_if(Gate::denies('customer_note_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerNoteResource($customerNote->load(['customer']));
    }

    public function update(UpdateCustomerNoteRequest $request, CustomerNote $customerNote)
    {
        $customerNote->update($request->all());

        return (new CustomerNoteResource($customerNote))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerNote $customerNote)
    {
        abort_if(Gate::denies('customer_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerNote->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
