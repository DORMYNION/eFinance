@extends('layouts.admin2')
@section('styles')
<style>
    body{
        font-family: 'Muli', sans-serif;
        margin:0;
        padding:0;
    }
    a{
        text-decoration:none;
    }
        #thecont{
        width:100%;
        height:auto;
        display:flex;
        align-items: flex-start;
        align-items: stretch;
        border-bottom:1px solid #ccc;
        background:#fff;
        }
        #contleft{
        width:60%;
        background:#fff;
        border-right:1px solid #ddd;
        padding-left:5%;
        padding-right:5%;
        padding-top:40px;
        padding-bottom:60px;
        }
        #contright{
        width:40%;
        background:#f1f1f1;
        padding-left:5%;
        padding-right:5%;
        padding-top:40px;
        padding-bottom:60px;
        }
        #itemhead{
        width:100%;
        height:60px;
        line-height: 60px;
        font-size:17px;
        font-weight:600;
        color:#222;
        }
        #itemhead2{
        width:100%;
        height:60px;
        line-height: 60px;
        font-size:17px;
        font-weight:600;
        color:#222;
        border-bottom:1px solid #ccc;
        }
        #item{
        width:100%;
        height:60px;
        line-height: 60px;
        font-size:15px;
        font-weight:400;
        color:#888;
        border-top:1px solid #eee;
        display:flex;
        align-items:center;
        justify-content: space-between;
        }
        #item2{
        width:100%;
        height:60px;
        line-height: 60px;
        font-size:15px;
        font-weight:400;
        color:#888;
        border-top:1px solid #ccc;
        display:flex;
        align-items:center;
        justify-content: space-between;
        }
        #itemleft{
        width:50%;
        color:#555;
        }
        #itemright{
        width:50%;
        text-align:right;
        font-weight:600;
        line-height: 20px;
        color:#000;
        }
        #itemleft2{
        width:50%;
        color:#444;
        font-weight:600;
        }
        #itemright2{
        width:50%;
        text-align:right;
        font-weight:600;
        line-height: 20px;
        color:#444;
        }
        #thespacer{
        width:100%;
        height:90px;
        }
        #imagearea{
        width:100%;
        height:auto;
        display:flex;
        align-items: flex-start;
        border-bottom:1px solid #eee;
        padding-top:50px;
        padding-bottom:50px;
        background:#fff;
        }
        #imageleft{
        width:50%;
        background:#fff;
        padding-left:5%;
        padding-right:5%;
        }
        #imageright{
        width:50%;
        background:#fefefe;
        padding-left:5%;
        padding-right:5%;
        text-align:right;
        margin-top:90px;
        }
        #imageright img{
        height:120px;
        }
        #backtoall{
        width:100px;
        height:40px;
        background:green;
        color:#fff;
        font-size:15px;
        line-height:40px;
        text-align:center;
        margin-bottom:50px;
        }
        a #backtoall{
        text-decoration:none;
        color:#fff;
        }
        a:hover #backtoall{
        background:#81983b;
        }
        .namefont{
        font-size:24px;
        color:#888
        }
        .contentfont{
        font-size:15px;
        font-weight:400;
        color:#888;
        line-height:23px;
        padding-top:15px;
        }
        #loanhead{
        width:100%;
        font-size:15px;
        font-weight:600;
        color:#000;
        padding-top:30px;
        }
        #loaninfo{
        width:100%;
        font-size:15px;
        color:#555;
        padding-top:5px;
        }
        #loanamount{
        width:100%;
        font-size:25px;
        font-weight:300;
        color:green;
        }
        #approve{
        width:100px;
        height:40px;
        color:#fff;
        background:green;
        line-height: 40px;
        text-align:center;
        border:0px;
        font-family: 'Muli', sans-serif;
        cursor: pointer;
        font-size:15px;
        }
        #approve:hover{
        background:#79a220;
        }
        #deny{
        width:100px;
        height:40px;
        color:#fff;
        background:red;
        line-height:40px;
        text-align:center;
        border:0px;
        font-family: 'Muli', sans-serif;
        cursor: pointer;
        font-size:15px;
        }
        #deny:hover{
        background:#d70d0d;
        }
        #view{
        width:70px;
        height:30px;
        color:#fff;
        background:#000;
        line-height: 30px;
        text-align:center;
        border:0px;
        font-family: 'Muli', sans-serif;
        cursor: pointer;
        font-size:15px;
        margin-top:35px;
        }
        #view:hover{
        background:#444;
        }
        #item{
        width:100%;
        height:60px;
        line-height: 60px;
        font-size:15px;
        font-weigh:400;
        color:#888;
        border-top:1px solid #eee;
        display:flex;
        align-items:center;
        justify-content: space-between;
        }
        #historycont{
        width:100%;
        height:auto;
        font-size:15px;
        font-weigh:400;
        border-bottom:1px solid #ccc;
        display:flex;
        justify-content: space-between;
        padding-bottom:30px;
        }
        #historyitem{
        width:50%;
        color:#aaa;
        }
</style>


@endsection
@section('content')

<div id="imagearea">
  <div id="imageleft">
    <a href="{{ route('admin.users.index') }}">
        <div id="backtoall">Back to All</div>
    </a>
    <div class="namefont">{{ $user->first_name }} {{ $user->last_name }}</div>
    <div class="contentfont">
      Bvn: {{ $user->bvn }}<br>
      Mobile: {{ $user->mobile_no_1 }}<br>
      Email: {{ $user->email }}<br>
    </div><!--contentfont-->
  </div><!--imageleft-->

  <div id="imageright">
    @if($user->profile_image)
        <a href="{{  $user->profile_image->getUrl() }}" target="_blank">
            <img class="img-fluid no-border" src="{{  $user->profile_image->getUrl() }}"  alt="{{ $user->name }} Profile Image">
        </a>
    @else
        <img class="img-fluid no-border" src="{{ asset('img/profile/default.jpeg') }}" alt="{{ $user->name }} Profile Image">
    @endif


  </div><!--imageright-->
</div><!--imagearea-->

<div id="thecont">
    <div id="contleft">
      <div id="itemhead">Contact Information</div><!--item-->
  
      <div id="item">
        <div id="itemleft">Gender</div>
        <div id="itemright">{{ App\User::GENDER_SELECT[$user->gender] ?? '' }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">State of Residence</div>
        <div id="itemright">{{ App\User::STATE_OF_RESIDENCE_SELECT[$user->state_of_residence] ?? '' }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Date of Birth</div>
        <div id="itemright">{{ $user->date_of_birth }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Alternative No</div>
        <div id="itemright">{{ $user->mobile_no_2 }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Address</div>
        <div id="itemright">{{ $user->address }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Land Mark</div>
        <div id="itemright">{{ $user->land_mark }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">LGA of Residence</div>
        <div id="itemright">{{ App\User::LOCAL_GOVERNMENT_AREA_OF_RESIDENCE_SELECT[$user->state_of_residence] ?? '' }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">State of Residence</div>
        <div id="itemright">{{ App\User::STATE_OF_RESIDENCE_SELECT[$user->state_of_residence] ?? '' }}</div>
      </div><!--item-->
  
  
      <div id="thespacer"></div>
      <div id="itemhead">Employment Details</div><!--item-->
  
      <div id="item">
        <div id="itemleft">Monthly Income</div>
        <div id="itemright">{{ number_format($user->monthly_income, 2) }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Employment Sector</div>
        <div id="itemright">{{ App\User::EMPLOYMENT_SECTOR_SELECT[$user->employment_sector] ?? '' }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Employer's Name</div>
        <div id="itemright">{{ $user->employers_name }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Company Address</div>
        <div id="itemright">{{ $user->employers_address }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Land Mark</div>
        <div id="itemright">{{ $user->employers_land_mark }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">LGA</div>
        <div id="itemright">{{ App\User::EMPLOYERS_LOCAL_GOVERNMENT_AREA_SELECT[$user->employers_local_government_area] ?? '' }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">State</div>
        <div id="itemright">{{ App\User::EMPLOYERS_STATE_SELECT[$user->employers_state] ?? '' }}</div>
      </div><!--item-->
  
      <div id="thespacer"></div>
      <div id="itemhead">Banking Details</div><!--item-->
  
      <div id="item">
        <div id="itemleft">Bank Name</div>
        <div id="itemright">{{ App\User::BANK_NAME_SELECT[$user->bank_name] ?? '' }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Account Name</div>
        <div id="itemright">{{ $user->account_name }}</div>
      </div><!--item-->
  
      <div id="item">
        <div id="itemleft">Account Number</div>
        <div id="itemright">{{ $user->account_no }}</div>
      </div><!--item-->

      <div id="item">
        <div id="itemleft">Payment Method</div>
        <div id="itemright">{{ $user->payment_method }}</div>
      </div><!--item-->
  
    </div><!--contleft-->

    <div id="contright">
      <div id="itemhead2">Latest loan application</div><!--item-->
      @if ($current_loan)
        @if($current_loan->status === 'Pending')
            <div id="loanhead">Loan Status</div>
            <div id="loaninfo">{{ $current_loan->status }}</div>

            <div id="loanhead">Loan Amount</div>
            <div id="loanamount">NGN {{ number_format($current_loan->loan_amount, 2) }}</div>
    
            <div id="loanhead">Request Date</div>
            <div id="loaninfo">{{ $current_loan->created_at }}</div>
    
            <div id="loanhead">Loan Tenor</div>
            <div id="loaninfo">{{ $current_loan->loan_duration }} Month(s)</div>
    
            <div id="loanhead">Repayment Option</div>
            <div id="loaninfo">{{ $current_loan->repayment_option }} </div>
    
            <div id="loanhead">Interest</div>
            <div id="loaninfo">NGN {{ number_format($current_loan->interest, 2) }}</div>
    
            <div id="loanhead">Total Payback Amount</div>
            <div id="loaninfo">NGN {{ number_format($current_loan->total, 2) }}</div><p>
    
              @can('admin')
                
            
              <div id="item">
                <button id="deny" data-toggle="modal" data-target="#declineLoanModal">Decline</button>
                @if ($user->payment_method !== null)
                    <button id="approve" data-toggle="modal" data-target="#approveLoanModal">Approve</button>
                @else
                  <p>No payment method.</p>
                @endif
              </div><!--item-->
              @endcan
        @elseif($current_loan->status === 'Approved')
            <div>
            <p class="">Awaiting user's response </p>
            </div>
                    <div id="item">
            <form action="{{ route('admin.loans.decline', $current_loan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="status" value="Expired">
                <input type="hidden" name="id" value="{{ $current_loan->id }}">
                <input type="submit" id="deny" value="Cancel Loan">
            </form>
            {{-- <button id="approve" data-toggle="modal" data-target="#approveLoanModal">Approve</button> --}}
            </div><!--item-->
        @elseif($current_loan->status === 'Awaiting Disbursment')
              <div id="loanhead">Loan Status</div>
              <div id="loaninfo">{{ $current_loan->status }}</div>

              <div id="loanhead">Loan Amount</div>
              <div id="loanamount">NGN {{ number_format($current_loan->loan_amount, 2) }}</div>

              <div id="loanhead">Request Date</div>
              <div id="loaninfo">{{ $current_loan->created_at }}</div>

              <div id="loanhead">Loan Tenor</div>
              <div id="loaninfo">{{ $current_loan->loan_duration }} Month</div>

              <div id="loanhead">Repayment Option</div>
              <div id="loaninfo">{{ $current_loan->repayment_option }} </div>

              <div id="loanhead">Interest</div>
              <div id="loaninfo">NGN {{ number_format($current_loan->interest, 2) }}</div>

              <div id="loanhead">Total Payback Amount</div>
              <div id="loaninfo">NGN {{ number_format($current_loan->total, 2) }}</div><p>
              <div id="item">
              <form action="{{ route('admin.loans.disburse', $current_loan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                  <input type="hidden" name="_method" value="PATCH">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="status" value="Disbursed">
                  <input type="hidden" name="id" value="{{ $current_loan->id }}">

                  <input type="hidden" name="plan" value={{ $user->plan_code }}>  
                  <input type="hidden" name="customer" value="{{ $user->customer_code }}"> 
                  @if ($current_loan->repayment_option == 'Interest and Principal payable at maturity' )
                    <input type="hidden" name="start_date" value="{{ Carbon\Carbon::now()->addMonths($current_loan->loan_duration)->format('c') }}">   
                  @else
                    <input type="hidden" name="start_date" value="{{ Carbon\Carbon::now()->addMonths(1)->format('c') }}">   
                  @endif
                  <input type="hidden" name="authorization" value={{ $user->authorization_code }}> 
                  

                  <input type="submit" id="approve" value="Disburse">
              </form>
              </div><!--item-->
        @elseif($current_loan->status === 'Disbursed')
              <div id="loanhead">Loan Status</div>
              <div id="loaninfo">{{ $current_loan->status }}</div>

              <div id="loanhead">Loan Amount</div>
              <div id="loanamount">NGN {{ number_format($current_loan->loan_amount, 2) }}</div>

              <div id="loanhead">Request Date</div>
              <div id="loaninfo">{{ $current_loan->created_at }}</div>

              <div id="loanhead">Loan Tenor</div>
              <div id="loaninfo">{{ $current_loan->loan_duration }} Month</div>

              <div id="loanhead">Repayment Option</div>
              <div id="loaninfo">{{ $current_loan->repayment_option }} </div>

              <div id="loanhead">Interest</div>
              <div id="loaninfo">NGN {{ number_format($current_loan->interest, 2) }}</div>

              <div id="loanhead">Total Payback Amount</div>
              <div id="loaninfo">NGN {{ number_format($current_loan->total, 2) }}</div><p>
              
              <div id="item">
                <button id="approve" data-toggle="modal" data-target="#payLoanModal">Pay Offline</button>
              </div><!--item-->
              <div class="card mt-4" style="margin-left: -10%;margin-right: -10%;">
                <div class="card-header"> Repayment Plan</div>
                <div class="card-body  p-0">
                    <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($current_loan->loanRepayments as $key => $loanRepayment)
                          <tr>
                              <td>{{ number_format($loanRepayment->amount, 2) }}</td>
                              <td>{{ $loanRepayment->due_date }}</td>
                              <td>{{ $loanRepayment->status }}</td>
                              <td>
                                @if ($loanRepayment->status === 'Pending')
                                  <form action="{{ route('admin.loans.flag', $loanRepayment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="status" value="Overdue">
                                    <input type="hidden" name="id" value="{{ $loanRepayment->id }}">                                    
                  
                                    <input type="submit" id="deny" value="Flag">
                                  </form>
                                @elseif($loanRepayment->status === 'Overdue')
                                  <form action="{{ route('admin.payments.store', $loanRepayment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    {{-- <input type="hidden" name="_method" value="PATCH"> --}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="status" value="Paid">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="loan_id" value="{{ $current_loan->id }}">
                                    <input type="hidden" name="loan_amount_id" value="{{ $current_loan->loanAmounts[0]->id }}">
                                    <input type="hidden" name="loan_repayment_id" value="{{ $loanRepayment->id }}">                                     
                                    <input type="hidden" name="amount" value="{{ $loanRepayment->amount }}">                                    
                                    <input type="hidden" name="payment_method" value="Bank Transfer">                                    
                                    <input type="hidden" name="reference" value="Due to Late Payment">                                    
                  
                                    <input type="submit" id="approve" value="Pay Offline">
                                  </form>
                                @else
                                    
                                @endif
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
              </div> 
        @elseif($current_loan->status === 'Partially Paid')
          <div id="loanhead">Loan Status</div>
          <div id="loaninfo">{{ $current_loan->status }}</div>

          <div id="loanhead">Total Payback Amount</div>
          <div id="loaninfo">NGN {{ number_format($current_loan->total, 2) }}</div><p>

          <div id="loanhead">Balance</div>
          <div id="loaninfo">NGN {{ number_format($current_loan->loanAmounts[0]->balance, 2) }}</div><p>
          
          <div id="item">
            <button id="approve" data-toggle="modal" data-target="#payLoanModal">Pay Offline</button>
          </div><!--item-->
          <div class="card mt-4" style="margin-left: -10%;margin-right: -10%;">
            <div class="card-header"> Repayment Plan</div>
            <div class="card-body  p-0">
                <table class="table table-responsive-sm">
                <thead>
                    <tr>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($current_loan->loanRepayments as $key => $loanRepayment)
                      <tr>
                          <td>{{ number_format($loanRepayment->amount, 2) }}</td>
                          <td>{{ $loanRepayment->due_date }}</td>
                          <td>{{ $loanRepayment->status }}</td>
                          <td>
                            @if ($loanRepayment->status === 'Pending')
                              <form action="{{ route('admin.loans.flag', $loanRepayment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="status" value="Overdue">
                                <input type="hidden" name="id" value="{{ $loanRepayment->id }}">                                    
              
                                <input type="submit" id="deny" value="Flag">
                              </form>
                            @elseif($loanRepayment->status === 'Overdue')
                              <form action="{{ route('admin.payments.store', $loanRepayment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                {{-- <input type="hidden" name="_method" value="PATCH"> --}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="status" value="Paid">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="hidden" name="loan_id" value="{{ $current_loan->id }}">
                                <input type="hidden" name="loan_amount_id" value="{{ $current_loan->loanAmounts[0]->id }}">
                                <input type="hidden" name="loan_repayment_id" value="{{ $loanRepayment->id }}">                                     
                                <input type="hidden" name="amount" value="{{ $loanRepayment->amount }}">                                    
                                <input type="hidden" name="payment_method" value="Bank Transfer">                                    
                                <input type="hidden" name="reference" value="Due to Late Payment">                                    
              
                                <input type="submit" id="approve" value="Pay Offline">
                              </form>
                            @else
                                
                            @endif
                          </td>
                      </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
          </div> 
        @endif
      @else
          <p class="text-center">No Active loan</p>
      @endif
  
      <div id="thespacer"></div>
      <div id="itemhead">{{ $user->first_name }} {{ $user->last_name }}'s Documents</div><!--item-->

      @foreach($user->userDocuments as $key => $userDocument)
        @if ($userDocument->document_file !== null)
          <div id="item2" data-entry-id="{{ $userDocument->id }}" style="line-height: 1.65">
         
            <a href="{{  $userDocument->document_file->getUrl() }}" target="_blank"><b>{{ App\Document::DOCUMENT_TYPE_SELECT[$userDocument->document_type] ?? '' }} </b> ({{ $userDocument->status }})</a>
            </div><!--item2-->
            @if ($userDocument->status === 'Pending')
                <div id="item">
                    <form action="{{ route('admin.documents.update', $userDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="status" value="Rejected">
                        <input type="hidden" name="id" value="{{ $userDocument->id }}">
                        <input type="submit" id="" value="Reject" style="line-height: 20px; ">
                    </form>
                    <form action="{{ route('admin.documents.update', $userDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="status" value="Approved">
                        <input type="hidden" name="id" value="{{ $userDocument->id }}">
                        <input type="submit" id="" value="Approve" style="line-height: 20px;">
                    </form>
                </div><!--item-->
            @endif
          @else
          <div id="item" style="line-height: 1.3">
            <a href="#" target="_blank"><b>{{ App\Document::DOCUMENT_TYPE_SELECT[$userDocument->document_type] ?? '' }} </b><br>Link not found or no document selected</a>
          </div>
          @if ($userDocument->status === 'Pending')
          <div id="item">
            <form action="{{ route('admin.documents.update', $userDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="status" value="Rejected">
                <input type="hidden" name="id" value="{{ $userDocument->id }}">
                <input type="submit" id="" value="Reject" style="line-height: 20px; ">
            </form>
          </div>
          @endif
        @endif
      @endforeach
  
  
      <div id="thespacer"></div>
      <div id="itemhead2">Loan History</div><!--itemhead2-->
  
        @foreach($user->userLoans as $key => $loan)
            @php
                $sate_join = strtotime($loan->created_at);
                $date_applied = date('F d, Y', $sate_join);
            @endphp
            <div id="historycont" data-entry-id="{{ $loan->id }}">
              <div id="historyitem">
                <div id="loanhead">Loan Amount</div>
                <div id="loaninfo">{{ number_format($loan->loan_amount, 2) ?? '' }}</div>
  
                <div id="loanhead">Application Date</div>
                <div id="loaninfo">{{ $date_applied }}</div>
              </div><!--historyitem-->
  
              <div id="historyitem">
                <div id="loanhead">Status</div>
                <div id="loaninfo">{{ App\Loan::STATUS_SELECT[$loan->status] ?? '' }}</div>
  
                {{-- <div id="view">view</div> --}}
              </div><!--historyitem-->
            </div><!--historycont-->
        @endforeach

        
      <div id="thespacer"></div>
      <div id="itemhead2">Other Details</div><!--itemhead2-->
      <div id="historycont" data-entry-id="{{ $loan->id }}">
        <div id="historyitem">
          @if (isset($loan->approved_by_id))
          <div id="loanhead">Approved By</div>
          <div id="loaninfo">{{ $loan->approvedBy->name }}</div>
        @endif
          
        @if (isset($loan->disbursed_by_id))
          <div id="loanhead">Disbursed By</div>
          <div id="loaninfo">{{ $loan->disbursedBy->name }}</div>
        @endif
        </div><!--historyitem-->
        
        <div id="historyitem">
          @if (isset($loan->approved_by_id))
            <div id="loanhead">Approved Date</div>
            <div id="loaninfo">{{ date('F d, Y', strtotime($loan->approved_at)) }}</div>
          @endif
          
          @if (isset($loan->disbursed_by_id))
            <div id="loanhead">Disbursed Date</div>
            <div id="loaninfo">{{ date('F d, Y', strtotime($loan->disbursed_at)) }}</div>
          @endif
        </div><!--historyitem-->
      </div><!--historycont-->

  
    </div><!--contright-->
</div><!--thecont--> 

    <!-- Approve Loan Modal has Paystack -->
    @if($current_loan && $current_loan->status === 'Pending')
        <div class="modal fade" id="approveLoanModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="approveLoanModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="approveLoanModalLabel">Approve Loan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                    <form method="POST" action="{{ route("admin.loans.update", [$current_loan->id]) }}" enctype="multipart/form-data" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                        <div class="modal-body">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="name" value="{{ $current_loan->loan_amount }} Loan "> 
                            <input type="hidden" name="email" value="{{ $user->email }}"> 
                            <input type="hidden" name="amount" id="paystack_amount"> 
                            <input type="hidden" name="description" value="{{ $user->name }}">
                            <input type="hidden" name="interval" value="monthly">  
                            <input type="hidden" name="invoice_limit" id="paystack_durati">
                            <input type="hidden" name="send_invoices" value="true">
                            <input type="hidden" name="send_sms" value="true">
                            <input type="hidden" name="currency" value="NGN">
        
                            <div class="form-group">
                                <label class="required" for="loan_amount">{{ trans('cruds.loan.fields.loan_amount') }}</label>
                                    {{-- <input class="slider {{ $errors->has('loan_amount') ? 'is-invalid' : '' }}" type="range" name="loan_amount" value="{{ old('loan_amount', $current_loan->loan_amount) }}" id="loan_amount" min="100000" max="20000000" step="10000"> --}}
                                    <input class="form-control {{ $errors->has('loan_amount') ? 'is-invalid' : '' }}" type="number" name="loan_amount" id="loan_amount" value="{{ old('loan_amount', $current_loan->loan_amount) }}" step="0.01" required> 
                                @if($errors->has('loan_amount'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('loan_amount') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.loan_amount_helper') }}</span>
                            </div>
                            <p>Value: <span id="vamount"></span></p>
        
                            <div class="form-group">
                                <label class="required" for="loan_duration">{{ trans('cruds.loan.fields.loan_duration') }}</label>
                                <input class="slider {{ $errors->has('loan_duration') ? 'is-invalid' : '' }}" type="range" name="loan_duration" value="{{ old('loan_duration', $current_loan->loan_duration) }}" id="loan_duration" min="1" max="9" step="1">
                                {{-- <input class="form-control {{ $errors->has('loan_duration') ? 'is-invalid' : '' }}" type="number" name="loan_duration" id="loan_duration" value="{{ old('loan_duration', $current_loan->loan_duration) }}" step="1" required> --}}
                                @if($errors->has('loan_duration'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('loan_duration') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.loan_duration_helper') }}</span>
                            </div>
                            <p>Value: <span id="vdays"></span></p>

                            <div class="form-group">
                              <label class="required" for="interest_rate">Interest Rate(%)</label>
                              <input class="form-control {{ $errors->has('interest_rate') ? 'is-invalid' : '' }}" type="number" name="interest_rate" id="interest_rate" value="6" step="0.01" required oninput="interestValue(this.value)">
                              @if($errors->has('interest_rate'))
                                  <div class="invalid-feedback">
                                      {{ $errors->first('interest_rate') }}
                                  </div>
                              @endif
                              <span class="help-block">{{ trans('cruds.loan.fields.interest_helper') }}</span>
                          </div>
        
                            <div class="form-group">
                                <label class="required" for="interest">{{ trans('cruds.loan.fields.interest') }}</label>
                                <input class="form-control {{ $errors->has('interest') ? 'is-invalid' : '' }}" type="number" name="interest" id="interest" value="{{ old('interest', $current_loan->interest) }}" step="0.01" required readonly>
                                @if($errors->has('interest'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('interest') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.interest_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="total">{{ trans('cruds.loan.fields.total') }}</label>
                                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $current_loan->total) }}" step="0.01" required readonly>
                                @if($errors->has('total'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('total') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.loan.fields.total_helper') }}</span>
                            </div>
                            <input type="hidden" name="status" value="Approved">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-lg btn-success">Approve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Decline Loan Modal -->
    @if($current_loan && $current_loan->status === 'Pending')
        <div class="modal fade" id="declineLoanModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="declineLoanModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="declineLoanModalLabel">Decline Loan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('admin.loans.decline', $current_loan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                      <div class="modal-body">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="status" value="Declined">
                        <input type="hidden" name="id" value="{{ $current_loan->id }}">

                        <div class="form-group">
                          <label class="required" for="decline_reason">Reason for Loan Decline</label>
                          <textarea class="form-control {{ $errors->has('decline_reason') ? 'is-invalid' : '' }}" name="decline_reason" id="decline_reason"  required></textarea>
                          @if($errors->has('decline_reason'))
                              <div class="invalid-feedback">
                                  {{ $errors->first('decline_reason') }}
                              </div>
                          @endif
                          <span class="help-block">{{ trans('cruds.loan.fields.interest_helper') }}</span>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-lg btn-danger">Decline</button>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
      @endif

    @if ($current_loan->status === 'Disbursed' || $current_loan->status === 'Partially Paid')
        <div class="modal fade" id="payLoanModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="payLoanModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="payLoanModalLabel">Record Payment</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                    <div class="modal-body">
                        @csrf
                        
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="loan_id" value="{{ $current_loan->id }}">
                        <input type="hidden" name="loan_amount_id" value="{{ $current_loan->loanAmounts[0]->id }}">

                        <div class="form-group">
                          <label class="required">{{ trans('cruds.payment.fields.payment_method') }}</label>
                          <select class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method" id="payment_method" required>
                              <option value disabled {{ old('payment_method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                              @foreach(App\Payment::PAYMENT_METHOD_SELECT as $key => $label)
                                  <option value="{{ $key }}" {{ old('payment_method', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                              @endforeach
                          </select>
                          @if($errors->has('payment_method'))
                              <div class="invalid-feedback">
                                  {{ $errors->first('payment_method') }}
                              </div>
                          @endif
                          <span class="help-block">{{ trans('cruds.payment.fields.payment_method_helper') }}</span>
                        </div>

                        <div class="form-group">
                          <label class="required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                          <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                          @if($errors->has('amount'))
                              <div class="invalid-feedback">
                                  {{ $errors->first('amount') }}
                              </div>
                          @endif
                          <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
                        </div>

                        <div class="form-group">
                          <label class="required" for="reference">Reference No</label>
                          <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', '') }}" required>
                          @if($errors->has('reference'))
                              <div class="invalid-feedback">
                                  {{ $errors->first('reference') }}
                              </div>
                          @endif
                          {{-- <span class="help-block">{{ trans('cruds.payment.fields.reference_helper') }}</span> --}}
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-lg btn-success">Record Payment</button>
                    </div>
                </form>
              </div>
          </div>
        </div>
    @endif
    @endsection
    @section('scripts')
    @parent
    <script>
        var amount = document.getElementById("loan_amount");
        var vamount = document.getElementById("vamount");
        var paystack_amount = document.getElementById("paystack_amount");
        var days = document.getElementById("loan_duration");
        var vdays = document.getElementById("vdays");
        
        var interestrate = document.getElementById("interest_rate").value;
        var dispCharges = document.getElementById("interest");
        var dispTotal = document.getElementById("total");

        vamount.innerHTML = numberWithCommas(amount.value);

        @php
            $d =round(($current_loan->total/$current_loan->loan_duration) * 100) ; 
        @endphp

        paystack_amount.value = {{ $d }};
        
        @if($current_loan->repayment_option == 'Interest and Principal payable at maturity' )
          paystack_amount.value = {{ $current_loan->total * 100}};
          paystack_durati.value = 1; 
        @else
          paystack_amount.value = {{ $d }};
          paystack_durati.value = days.value; 
        @endif
    
        vdays.innerHTML = numberWithCommas(days.value);
        document.getElementById("interest").value = dispCharges.innerHTML  = {{ $current_loan->interest }};
        document.getElementById("total").value = dispTotal.innerHTML  = {{ $current_loan->total }}; 
    
        amount.oninput = function() {
          var interestrate = document.getElementById("interest_rate").value;
            // paystack_amount.value = this.value;
            vamount.innerHTML = this.value;
            calLoan(interestrate);
        }
        days.oninput = function() {
          var interestrate = document.getElementById("interest_rate").value;
            // paystack_amount.value = this.value;
            vdays.innerHTML = this.value;
            calLoan(interestrate);
        }
        
        function interestValue(value) {
          calLoan(value)
        }
    
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    
        function calLoan(value=interestrate) {
            var intAmount = parseInt(amount.value);
            var intDays = parseInt(days.value);
            var intDay = 1;
            
            interest = Math.abs((intAmount/100)*value)
            total = intAmount + interest;
            
            if(intDays>1){
                diff=(total-intAmount)*(intDays-1);
            }else{
                diff=0;
            }
            total=diff+total;
            charges= total-intAmount;

            dispCharges.innerHTML  = numberWithCommas(charges.toFixed(0));
            dispTotal.innerHTML  = numberWithCommas(total.toFixed(0));
            document.getElementById("interest").value = charges.toFixed(0);
            document.getElementById("total").value = total.toFixed(0);

            @if($current_loan->repayment_option == 'Interest and Principal payable at maturity' )
              paystack_durati.value = 1; 
              paystack_amount.value = (total * 100).toFixed(0);;
            @else
              paystack_amount.value = ((total / intDays) * 100).toFixed(0);
              paystack_durati.value = intDays; 
            @endif
        }
    
    </script>
    @endsection