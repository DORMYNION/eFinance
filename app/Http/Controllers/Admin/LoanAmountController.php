<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLoanAmountRequest;
use App\Http\Requests\StoreLoanAmountRequest;
use App\Http\Requests\UpdateLoanAmountRequest;
use App\Loan;
use App\LoanAmount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoanAmountController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('loan_amount_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanAmounts = LoanAmount::all();

        return view('admin.loanAmounts.index', compact('loanAmounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('loan_amount_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loans = Loan::all()->pluck('viewed', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.loanAmounts.create', compact('loans'));
    }

    public function store(StoreLoanAmountRequest $request)
    {
        $loanAmount = LoanAmount::create($request->all());

        return redirect()->route('admin.loan-amounts.index');
    }

    public function edit(LoanAmount $loanAmount)
    {
        abort_if(Gate::denies('loan_amount_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loans = Loan::all()->pluck('viewed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $loanAmount->load('loan');

        return view('admin.loanAmounts.edit', compact('loans', 'loanAmount'));
    }

    public function update(UpdateLoanAmountRequest $request, LoanAmount $loanAmount)
    {
        $loanAmount->update($request->all());

        return redirect()->route('admin.loan-amounts.index');
    }

    public function show(LoanAmount $loanAmount)
    {
        abort_if(Gate::denies('loan_amount_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanAmount->load('loan');

        return view('admin.loanAmounts.show', compact('loanAmount'));
    }

    public function destroy(LoanAmount $loanAmount)
    {
        abort_if(Gate::denies('loan_amount_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanAmount->delete();

        return back();
    }

    public function massDestroy(MassDestroyLoanAmountRequest $request)
    {
        LoanAmount::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
