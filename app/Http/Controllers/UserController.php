<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserContest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create()
    {
        return view('/register');
    }
    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create($validatedData);

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/profile_pictures'), $imageName);
            
            $user->image = $imageName;

            $user->save();
        }
        

        return redirect('/login')->with('sucesso', 'Usuário cadastrado com sucesso');
    }

    public function updateImage(Request $request)
    {
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path('img/profile_pictures'), $imageName);
            
            $user = Auth::user();

            $user->image = $imageName;

            $user->save();
        }

        return back()->with('sucesso', 'Imagem alterada com sucesso');
    }

    public function show(User $user)
    {
        
        return view('/show',['user' => $user]);
    }

    public function history()
    {
        $user = Auth::user();
        $user_contests = UserContest::all()->where('user_id', $user->id);
        return view('/history',['user' => $user, 'user_contests' => $user_contests]);
    }

    public function forgotPassword()
    {
        return view('forgot-password');
    }

    public function forgotPasswordEmail(Request $request)
    {
        $request->validate(['email'=>'required|email']);

        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT ? back()->with('sucesso', ''.__($status)) : back()->with('sucesso', ''.__($status));
    }

    public function passwordResetForm(string $token)
    {
        return view('reset-password',['token'=>$token]);
    }

    public function passwordReset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();

                event(new PasswordReset($user));
            }
        );
        if($status === Password::PASSWORD_RESET){
            return back()->with('sucesso', ''.__($status));
        }
        return redirect('/login')->with('sucesso', 'Senha Alterada com sucesso');
    }
}