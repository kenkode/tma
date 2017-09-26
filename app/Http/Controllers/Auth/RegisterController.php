<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Mail;
use App\Mail\Registration;
use App\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/dashboard';

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {

        $name = $request->username;

        Mail::to($request->email)->send(new Registration($name));

        //dd("Mail Sent");

        if( count(Mail::failures()) == 0 ) {

        $organization = new Organization;
        $organization->name = $request->name;
        $organization->address = $request->address;
        $organization->phone = $request->phone;
        $organization->is_nairobi = $request->nairobi;
        $organization->is_central = $request->central;
        $organization->is_western = $request->western;
        $organization->is_nyanza = $request->nyanza;
        $organization->is_coast = $request->coast;
        $organization->is_rift = $request->rift;
        $organization->is_eastern = $request->eastern;
        $organization->is_northeastern = $request->neast;

        $organization->save();

        $user = new User;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = 0;
        $user->user_confirm = 0;
        $user->terms = $request->terms;
        $user->type = $request->type;
        $user->organization_id = $organization->id;

        $user->save();
        }
        return 1;
    }

    protected function confirmation($name)
    {
      $user = User::where('name',$name)->first();
      $user->user_confirm = 1;
      $user->update();

      return redirect('/')->withFlashMessage("Email Confirmation Successful!");
    }

}
