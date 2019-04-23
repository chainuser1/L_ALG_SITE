<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
   
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }
    //override login method
    public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }
        return redirect()->intended($this->redirectPath());
    }
    
    //@override login method from authenticable
    public function login(Request $req){
        $credentials=$req->only('username','password');
        $auth=Auth::attempt($credentials, $req->has('remember'));

        if($auth){
            $req->session()->regenerate();
            return response()->json(['success'=>true,'message'=>'Signed In...'],200);
        }
        return response()->json(['success'=>false,'message'=>'Please check your credentials'],202);
    }
    //@override logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        //redirect after logout to home page
        return redirect('/');

    }
}
