<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use App\Notifications\WelcomeSMSNotification;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'unique:users,email',
            'country' => 'required',
            'phone_number' => 'required',
        ]);

        $user = User::createNewUser($request->all());

        $user->notify(new WelcomeEmailNotification());
        $user->notify(new WelcomeSMSNotification());

        return redirect('welcome');
    }
}
