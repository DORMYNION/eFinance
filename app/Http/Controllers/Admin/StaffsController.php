<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:staff']);
    }

    public function index()
    {
        $staffs = Role::where('name', 'Staff')->first()->users()->get();

        return view('admin.staffs.index', compact('staffs'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('admin.staffs.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        // $request['bvn'] = rand(0000000,9);
        $request['bvn']                                       = rand(666666666666, 999999999999);
        $request['name']                                      = $request->first_name . ' ' . $request->last_name;
        $request['title']                                     = '';
        $request['gender']                                    = '';
        $request['status']                                    = 'Active';
        $request['address']                                   = '';
        $request['verified']                                  = 1;
        $request['land_mark']                                 = '';
        $request['bank_name']                                 = '';
        $request['account_no']                                = rand(111111111111, 999999999999);;
        $request['mobile_no_1']                               = '';
        $request['mobile_no_2']                               = '';
        $request['verified_at']                               = now();
        $request['account_name']                              = '';
        $request['date_of_birth']                             = '2020-07-13';
        $request['marital_status']                            = '';
        $request['remember_token']                            = null;
        $request['employers_name']                            = '';
        $request['monthly_income']                            = 0.00;
        $request['employers_state']                           = '';
        $request['employment_sector']                         = '';
        $request['employers_address']                         = '';
        $request['state_of_residence']                        = '';
        $request['verification_token']                        = '';
        $request['employers_land_mark']                       = '';
        $request['status_of_residence']                       = '';
        $request['employers_local_government_area']           = '';
        $request['local_government_area_of_residence']        = '';
        
        if ($request->role === "1") {
            $request['role'] = ['1', '2'];
        }
        $user = User::create($request->all());
        $user->roles()->sync($request->input('role', []));

        return redirect()->route('admin.staffs.index')->with('message', 'Staff Successfully Added');
    }

    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);
        $roles = Role::all()->pluck('name', 'id');

        $user->load('roles');

        return view('admin.staffs.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        // dd($request);
        User::where('email', $request->email)->update([
            'password'  => Hash::make($request->password)
        ]);
        // $user->update($request->all());
        // $user->roles()->sync($request->input('role', []));

        return redirect()->route('admin.staffs.index')->with('message', 'Password Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
