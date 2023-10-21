<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function passwordChange()
    {
        return view('admin.profile.password_change');
    }

    public function passwordChangePost(Request $request)
    {
        $request->validate([
            'old_password'=>'required|min:8',
            'new_password' => 'required|min:8|same:password_confirmation',
            'password_confirmation' => 'required|min:8',
        ]);
        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
            if (Auth::attempt(['email' => $user->email, 'password' => $request->new_password])) {
                return redirect()->route('admin.password_change')
                    ->with('success','Password changed');
            }
            return redirect()->route('login')
                ->with('error','Something wrong, Please try again.');

        }

        return redirect()->route('admin.password_change')
            ->with('error','Old Password does not match');
    }
}
