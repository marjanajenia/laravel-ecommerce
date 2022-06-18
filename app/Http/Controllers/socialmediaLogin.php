<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class socialmediaLogin extends Controller
{
    public function togoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function googleinfostore(){
        
        try{
            $googleUser=Socialite::driver('google')->user();
            $findUser=User::where('socialId', $googleUser->id)->first();           
            if($findUser){
                Auth::login($findUser);
                return redirect()->intended(RouteServiceProvider::HOME);
            }
            else{
                $tableField= new User();
                // $tableField->fname='Google User';
                $tableField->name=$googleUser->name;
                $tableField->email=$googleUser->email;
                $tableField->role='3';
                $tableField->socialId=$googleUser->id;
                $tableField->password=encrypt($googleUser->id);
                $tableField->save();
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
        catch(Exception $e){
            dd($e->getMessage());
        }
     }

    // facebook
    public function tofacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookinfostore(){
        
        try{
            $facebookUser=Socialite::driver('facebook')->user();
            $findUser=User::where('socialId', $facebookUser->id)->first();           
            if($findUser){
                Auth::login($findUser);
                return redirect()->intended(RouteServiceProvider::HOME);
            }
            else{
                $tableField= new User();
                // $tableField->fname='Google User';
                $tableField->name=$facebookUser->name;
                $tableField->email=$facebookUser->email;
                $tableField->role='3';
                $tableField->socialId=$facebookUser->id;
                $tableField->password=encrypt($facebookUser->id);
                $tableField->save();
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
        catch(Exception $e){
            dd($e->getMessage());
        }
     }
}
