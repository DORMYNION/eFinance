<?php

namespace App\Http\Requests;

use App\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:customers,bvn',
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
                'unique:customers',
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
                'unique:customers',
            ],
        ];
    }
}