<?php

namespace App\Http\Controllers\Store\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | store that recently registered with the application. Emails may also
    | be re-sent if the store didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect stores after verification.
     *
     * @var string
     */
    protected $redirectTo = '/store';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('store.auth');
        $this->middleware('signed')->only('store.verify');
        $this->middleware('throttle:6,1')->only('store.verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->user('store')->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('store.auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        if (! hash_equals((string) $request->route('id'), (string) $request->user('store')->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user('store')->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user('store')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user('store')->markEmailAsVerified()) {
            event(new Verified($request->user('store')));
        }

        return redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        if ($request->user('store')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user('store')->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
