<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Password;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse as SuccessfulPasswordResetLinkRequestResponseContract;


//use App\Models\User;


class PasswordResetLinkRequestResponse implements SuccessfulPasswordResetLinkRequestResponseContract
{
    /**
     * The response status language key.
     *
     * @var string
     */
    protected $status;

    /**
     * Create a new response instance.
     *
     * @param  string  $status
     * @return void
     */
    public function __construct(string $status, $email)
    {
        /*$this->status = $status == Password::RESET_LINK_SENT
						? true
						: false;*/
		switch($status) {
			case Password::RESET_LINK_SENT:
				$this->status = 'sent';
				break;
				
			default:
				$this->status = $status;
			
		}
						
		$this->email = $email;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return response()
				->view('auth.sent-link', ['status' => $this->status,
											'email' => $this->email]);
    }
}
