<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanAmountRequest;
use App\Http\Requests\UpdateLoanAmountRequest;
use App\Http\Resources\Admin\LoanAmountResource;
use App\LoanAmount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoanAmountApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('loan_amount_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoanAmountResource(LoanAmount::with(['loan'])->get());
    }

    public function store(StoreLoanAmountRequest $request)
    {
        $loanAmount = LoanAmount::create($request->all());

        return (new LoanAmountResource($loanAmount))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LoanAmount $loanAmount)
    {
        abort_if(Gate::denies('loan_amount_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LoanAmountResource($loanAmount->load(['loan']));
    }

    public function update(UpdateLoanAmountRequest $request, LoanAmount $loanAmount)
    {
        $loanAmount->update($request->all());

        return (new LoanAmountResource($loanAmount))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LoanAmount $loanAmount)
    {
        abort_if(Gate::denies('loan_amount_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loanAmount->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}