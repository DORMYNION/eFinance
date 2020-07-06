<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLoanRequest;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Loan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('loan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loans = Loan::all();
        dd($loans);

        return view('admin.loans.index', compact('loans'));
    }

    public function create()
    {
        abort_if(Gate::denies('loan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.loans.create', compact('customers'));
    }

    public function store(StoreLoanRequest $request)
    {
        $loan = Loan::create($request->all());

        return redirect()->route('admin.loans.index');
    }

    public function edit(Loan $loan)
    {
        abort_if(Gate::denies('loan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->load('customer');

        return view('admin.loans.edit', compact('loan'));
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $loan->update($request->all());

        return back();
    }

    public function show(Loan $loan)
    {
        abort_if(Gate::denies('loan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->load('customer', 'loanLoanAmounts');

        return view('admin.loans.show', compact('loan'));
    }

    public function decline(UpdateLoanRequest $request, Loan $loan)
    {
        abort_if(Gate::denies('loan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $a = $request->all();
        // dd($a['id']);
        Loan::where('id', $a['id'])->update(['status' => $a['status']]);

        // $loan->update($request->all());

        return back();
    }

    public function destroy(Loan $loan)
    {
        abort_if(Gate::denies('loan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->delete();

        return back();
    }

    public function massDestroy(MassDestroyLoanRequest $request)
    {
        Loan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
