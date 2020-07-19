<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Str;
use Esputnik;

class AuthController extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $previous_url = $request->session()->previousUrl();
        return view('login', compact('previous_url'));
    }

    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['password'] = bcrypt($credentials['password']);
        DB::beginTransaction();
        try {
            $user = User::create($credentials);
            UserProfile::create([
                'user_id' => $user->id, 'firstname' => $request->input('firstname')
            ]);
            $user->addRole();
            DB::commit();
            Auth::login($user);
            return redirect()->route('home');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
        }

    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $previous_url = $request->input('previous_url');
            if ($previous_url == route('login')) {
                return redirect()->route('home');
            } else {
                return redirect()->intended($previous_url);
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function restore_password()
    {
        return view('restore_password');
    }

    public function restore(Request $request)
    {
        $email = $request->input('email');
        $user = User::where(['email' => $email])->first();
        if ($user) {
            $password = Str::random(6);
            $data = [
                'password' => $password,
                'name' => $user->profile->firstname,
                'email' => $email
            ];
            Esputnik::createUserInES($user, "Пользователи обучающего портала");
            Esputnik::sendEmail(2270356, $data, 5);

            $user->password = bcrypt($password);
            $user->save();

            return redirect()->route('forgot.email.sent');
        } else {
            return redirect()->route('forgot.email.wrong');
        }
    }

    public function forgot_email_sent()
    {
        return view('restore_success');
    }

    public function forgot_email_wrong()
    {
        return view('restore_failed');
    }
}
