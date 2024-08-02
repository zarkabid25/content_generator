<?php

namespace App\Http\Controllers;

use App\Mail\EmailHasVerified;
use App\Models\Plan;
use App\Models\Template;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        // If there's no DB connection setup
        if (!env('DB_DATABASE')) {
            return redirect()->route('install');
        }

        // If the user is logged-in, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // If there's a custom site index
        if (config('settings.index')) {
            return redirect()->to(config('settings.index'), 301)->header('Cache-Control', 'no-store, no-cache, must-revalidate');
        }

        // If there's a payment processor enabled
        if (paymentProcessors()) {
            $plans = Plan::where('visibility', 1)->orderBy('position')->orderBy('id')->get();
        } else {
            $plans = null;
        }

        $templates = Template::global()->premade()->orderBy('name', 'asc')->get();

        $customTemplates = Template::global()->custom()->orderBy('name', 'asc')->get();

        return view('home.index', ['plans' => $plans, 'templates' => $templates, 'customTemplates' => $customTemplates]);
    }

    public function emailVerification($is_verified, $email)
    {
        $user = User::where('email', decrypt($email))->first();
        
        if($user){
            $plan = Plan::where('visibility', 1)->where('name', 'Consumer')->value('id');

            if(decrypt($is_verified) == 'yes' && !empty($plan)){
                User::where('email', decrypt($email))
                        ->update([
                                'email_verified_at' => now(), 
                                'plan_id' => $plan
                        ]);
               
                $details = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'title' => 'Email Verified',
                    'message' => 'Dear <b>' . ucwords($user->name) . '</b>, your email address <b>' . $user->email . '</b> has been verified. 
                                  You can now login with that email.'
                ];
                
                Mail::to(decrypt($email))->send(new EmailHasVerified($details));

                return redirect('/')->with('success', 'Email has verified successfully.');
            } 
            else{
                $details = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'title' => 'Email Not Verified',
                    'message' => 'Dear <b>' . ucwords($user->name) . '</b>, we are regret to inform you that your email address <b>' . $user->email . '</b> has not been verified.'
                ];

                Mail::to(decrypt($email))->send(new EmailHasVerified($details));

                return redirect('/')->with('error', 'Email has not verified.');
            }
        } 
        else{
            return redirect('/')->with('error', 'User not found.');
        }
    }
}
