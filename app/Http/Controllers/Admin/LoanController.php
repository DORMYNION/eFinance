<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLoanRequest;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Loan;
use App\LoanAmount;
use App\LoanRepayment;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::where('status', 'Approved')->get();

        $loans->load('user');

        // dd($loans);

        return view('admin.loans.index', compact('loans'));
    }

    public function create()
    {
        // abort_if(Gate::denies('loan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        // abort_if(Gate::denies('loan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        // abort_if(Gate::denies('loan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->load('customer', 'loanLoanAmounts');

        return view('admin.loans.show', compact('loan'));
    }

    public function disburse(Request $request)
    {
        $loan = Loan::find($request->id);

        // dd($loan);
        Loan::where('id', $loan->id)->update(['status' => 'Disbursed']);

        $loan_amount = LoanAmount::create([
            'total'          => $loan->total,
            'loan_id'        => $loan->id,
            'user_id'        => $loan->user_id,
            'interest'       => $loan->interest,
            'loan_tenor'     => $loan->loan_duration,
            'loan_amount'    => $loan->loan_amount,
            'balance'        => $loan->total,
            'status'         => 'Not Paid',
            'disbursed_date' => $loan->updated_at,
            'due_date'       => Carbon::now()->addMonths($loan->loan_duration)->format('Y-m-d'),
        ]);
        
        if ($loan_amount) {
            for ($i=1; $i <= $loan_amount->loan_tenor; $i++) {             
                $loan_repayment = LoanRepayment::create([
                    'tenor'             => $i,
                    'amount'            => round($loan_amount->total / $loan_amount->loan_tenor, 2),
                    'status'            => 'Pending',
                    'loan_id'           => $loan_amount->loan_id,
                    'user_id'           => $loan_amount->user_id,
                    'due_date'          => Carbon::parse($loan_amount->updated_at)->addMonths($i)->format('Y-m-d'),
                    'loan_amount_id'    => $loan_amount->id,
                ]);
            }
        }
        return back();
    }

    public function decline(UpdateLoanRequest $request, Loan $loan)
    {
        // abort_if(Gate::denies('loan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $a = $request->all();
        // dd($a['id']);
        Loan::where('id', $a['id'])->update(['status' => $a['status']]);

        // dd($request->status);

        if($request->status === 'Disbursed') {
            $getLoan = Loan::where('id', $request->id)->get();

            $dueDate = Carbon::now()->addMonths($getLoan[0]->loan_duration)->format('Y-m-d H:i:s');

            DB::table('loan_amounts')->insert([
                'total'          => $getLoan[0]->total,
                'loan_id'        => $getLoan[0]->id,
                'interest'       => $getLoan[0]->interest,
                'loan_tenor'     => $getLoan[0]->loan_duration,
                'loan_amount'    => $getLoan[0]->loan_amount,
                'disbursed_date' => Carbon::now(),
                'due_date'       => $dueDate,
            ]);

        }

        // $loan->update($request->all());

        return back();
    }

    public function destroy(Loan $loan)
    {
        // abort_if(Gate::denies('loan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loan->delete();

        return back();
    }

    public function massDestroy(MassDestroyLoanRequest $request)
    {
        Loan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
