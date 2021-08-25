<?php

//namespace Laravel\Fortify\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Password;
//use Illuminate\Support\Facades\Route;

//use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Contracts\FailedPasswordResetLinkRequestResponse;
use Laravel\Fortify\Contracts\RequestPasswordResetLinkViewResponse;
use Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse;

//use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Http\Responses\PasswordResetLinkRequestResponse;


class MyPasswordResetLinkController extends PasswordResetLinkController
{
	protected $redirectTo = '/';
    

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Responsable
     */
    public function store(Request $request): Responsable
    {
		//file_put_contents('debug/value.txt', "\n request name: " . $request->name . "\n", FILE_APPEND);

		//$email = User::where('name', $request->name)->value('email');
		$email = DB::table('users')->where('name', $request->name)->value('email');
		
        //$request->validate([Fortify::email() => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = $this->broker()->sendResetLink(
            //$request->only(Fortify::email())
			['email' => $email]
        );
		
		/*
        return $status == Password::RESET_LINK_SENT
                    ? app(SuccessfulPasswordResetLinkRequestResponse::class, ['status' => $status])
                    : app(FailedPasswordResetLinkRequestResponse::class, ['status' => $status]);*/
		return app(PasswordResetLinkRequestResponse::class, ['status' => $status,
																'email' => $email]);
    }

   
}
