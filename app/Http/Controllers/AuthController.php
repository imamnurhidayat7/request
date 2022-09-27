<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Alert;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLoginPage(){
        return Socialite::driver('keycloak')->redirect(); 
        //return view('auth.login');  
    }

    public function redirect(Request $request){
        $keycloak_user = Socialite::driver('keycloak')->user();
        // $test = Socialite::driver('keycloak')->getRole();

        // dd($test);
        $user = User::updateOrCreate([
            'keycloak_id' => $keycloak_user->id,
        ], [
            'name' => $keycloak_user->name,
            'email' => $keycloak_user->email,
            'keycloak_token' => $keycloak_user->token,
            'keycloak_refresh_token' => $keycloak_user->refreshToken,
        ]);
     
        Auth::login($user);
        Session::put('name', $user->name);
        Session::put('id', $user->id);

        if($user->role == 'admin'){
            return redirect('admin/dashboard');
        }
        else{
            if(Session::get('url') != null){
                //dd(Session::get('url')['intended']);
                return redirect(Session::get('url')['intended']);
            }
            else{
                return redirect('/');
            }
        }
    }


    public function redirectLogout(){
        return redirect('/login');
    }


    public function login(Request $request){
       
        //dd(md5($request->password));
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email',$email)->first();

        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password) || md5($password) == $data->password){
                
                Session::put('id',$data->id);
                Session::put('nama',$data->name);
                
                Auth::login($data);

                if(Session::get('url') != null){
                    //dd(Session::get('url')['intended']);
                    return redirect(Session::get('url')['intended']);
                }
                else{
                    return redirect('admin/dashboard');
                }
                
            }
            else{
                dd($data);
                //Alert::error('Password Salah');
                return redirect()->back();
            }
            
        }
        else{
            Alert::error('Email tidak terdaftar');
                return redirect()->back();
        }
    }

    public function keluar(Request $request){
		// return redirect('login');
        Auth::logout(); // Logout of your app
        Session::flush();
        $redirectUri = 'http://localhost:8000/'; // The URL the user is redirected to
        return redirect(Socialite::driver('keycloak')->getLogoutUrl($redirectUri)); // Redirect to Keycloak
	}

}
