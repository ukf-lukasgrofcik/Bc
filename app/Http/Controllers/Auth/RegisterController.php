<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Company;
use App\Models\RegistrationLink;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'hash' => ['required', 'string', 'exists:registration_links,hash'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Get registration link
        $registration_link = RegistrationLink::where([
            'hash' => $data['hash'],
            'registered' => 0,
        ])->firstOrFail();

        // Create user
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
        ]);
        // Assign unfillable data
        $user->company_id = $registration_link->company_id;
        $user->workplace_id = $registration_link->workplace_id;
        $user->role = $registration_link->role;
        $user->password = Hash::make($data['password']);
        $user->save();

        // Assign leader/owner
        if($registration_link->role == 'owner'){
            $registration_link->company->owner_id = $user->id;
            $registration_link->company->save();
        }
        if($registration_link->role == 'workplace_leader'){
            $registration_link->workplace->leader_id = $user->id;
            $registration_link->workplace->save();
        }

        // Disable registration link
        $registration_link->registered = 1;
        $registration_link->save();

        return $user;
    }

    // Overriden

    public function showRegistrationForm()
    {
        $registration_link = RegistrationLink::where([
            'hash' => request()->hash,
            'registered' => 0,
        ])->firstOrFail();

        return view('auth.register', compact('registration_link'));
    }

}
