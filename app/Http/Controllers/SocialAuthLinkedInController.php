<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
use Exception;

class SocialAuthLinkedInController extends Controller
{
  public function redirect(){
    return Socialite::driver('linkedin')->redirect();
  }

  public function callback()
  {
    try {
      $linkedinUser = Socialite::driver('linkedin')->user();
      $existUser  = User::where('email',$googleUser->email)->first;


      if($existUser){
        Auth::loginUsingId($existUser->id);
      } else {
        $user = new User;
        $user->name = $linkedinUser->name;
        $user->email = $linkedinUser->email;
        $user->linkedin_id = $linkedinUser->id;
        $user->password = md5(rand(1,10000));
        $user->save();
        Auth::loginUsingId($user->id);
      }
      return redirect()->to('/dashboard');

    }catch (Exception $e) {
      return 'error';
    }
  }
}
