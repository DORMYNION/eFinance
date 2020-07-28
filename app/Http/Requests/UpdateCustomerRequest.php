<?php

namespace App\Http\Requests;

use App\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'bvn'                                => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:customers,bvn,' . request()->route('customer')->id,
            ],
            'title'                              => [
                'required',
            ],
            'first_name'                         => [
                'required',
            ],
            'last_name'                          => [
                'required',
            ],
            'gender'                             => [
                'required',
            ],
            'date_of_birth'                      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'mobile_no_1'                        => [
                'required',
            ],
            'email'                              => [
                'required',
                'unique:customers,email,' . request()->route('customer')->id,
            ],
            'address'                            => [
                'required',
            ],
            'land_mark'                          => [
                'required',
            ],
            'state_of_residence'                 => [
                'required',
            ],
            'local_government_area_of_residence' => [
                'required',
            ],
            'status_of_residence'                => [
                'required',
            ],
            'monthly_income'                     => [
                'required',
            ],
            'employment_sector'                  => [
                'required',
            ],
            'employers_name'                     => [
                'required',
            ],
            'employers_address'                  => [
                'required',
            ],
            'employers_land_mark'                => [
                'required',
            ],
            'employers_state'                    => [
                'required',
            ],
            'employers_local_government_area'    => [
                'required',
            ],
            'bank_name'                          => [
                'required',
            ],
            'account_name'                       => [
                'required',
            ],
            'account_no'                         => [
                'required',
                'unique:customers,account_no,' . request()->route('customer')->id,
            ],
        ];
    }
}