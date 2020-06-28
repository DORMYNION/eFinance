<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\CustomerNote;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerNoteRequest;
use App\Http\Requests\StoreCustomerNoteRequest;
use App\Http\Requests\UpdateCustomerNoteRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerNotesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_note_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerNotes = CustomerNote::all();

        return view('admin.customerNotes.index', compact('customerNotes'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_note_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customerNotes.create', compact('customers'));
    }

    public function store(StoreCustomerNoteRequest $request)
    {
        $customerNote = CustomerNote::create($request->all());

        return redirect()->route('admin.customer-notes.index');
    }

    public function edit(CustomerNote $customerNote)
    {
        abort_if(Gate::denies('customer_note_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customerNote->load('customer');

        return view('admin.customerNotes.edit', compact('customers', 'customerNote'));
    }

    public function update(UpdateCustomerNoteRequest $request, CustomerNote $customerNote)
    {
        $customerNote->update($request->all());

        return redirect()->route('admin.customer-notes.index');
    }

    public function show(CustomerNote $customerNote)
    {
        abort_if(Gate::denies('customer_note_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerNote->load('customer');

        return view('admin.customerNotes.show', compact('customerNote'));
    }

    public function destroy(CustomerNote $customerNote)
    {
        abort_if(Gate::denies('customer_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerNote->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerNoteRequest $request)
    {
        CustomerNote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}