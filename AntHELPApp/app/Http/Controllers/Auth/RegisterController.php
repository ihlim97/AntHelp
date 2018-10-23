<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'my_kad_no' => 'required|digits_between:12,14',
            'mobile_no' => 'required|numeric',
            'address' => 'required|string|max:255'
        ], [
            'my_kad_no.required' => 'The NRIC field is required.',
            'my_kad_no.digits_between' => 'A NRIC must be between 12 and 14 digits.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (!$data['is_service_provider']) {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'my_kad_no' => $data['my_kad_no'],
                'mobile_no' => $data['mobile_no'],
                'address' => $data['address'],
                'password' => Hash::make($data['password']),
            ]);
        } else {
            return ServiceProvider::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'my_kad_no' => $data['my_kad_no'],
                'mobile_no' => $data['mobile_no'],
                'address' => $data['address'],
                'password' => Hash::make($data['password']),
            ]);
        }
        
    }
}
