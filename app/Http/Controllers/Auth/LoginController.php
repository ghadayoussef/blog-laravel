<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */


     ////////////github

    // public function redirectToProvider()
    // {
    //     return Socialite::driver('github')->redirect();
    // }
    ////////////////google

     public function redirectToProvider()
     {
         return Socialite::driver('github')->redirect();
     }
     /**
      * Obtain the user information from GitHub.
      *
      * @return \Illuminate\Http\Response
      */
     public function handleProviderCallback()
     {
         //$user = Socialite::driver('github')->user();
         // dd($user);
         try {
             $user = Socialite::driver('github')->user();
            // dd($user);
         } catch (Exception $e) {
             return Redirect::to('auth/github');
         }
         $authUser = $this->findOrCreateUser($user);
         Auth::login($authUser,true);
         return Redirect::to('home');
        
     }
     private function findOrCreateUser($githubUser)
     {
         if ($authUser = User::where('github_id', $githubUser->id)->first()) {
             return $authUser;
             
         }
         User::create([
             'name' => $githubUser->name,
             'email' => $githubUser->email,
             'github_id' => $githubUser->id,
             'avatar' => $githubUser->avatar
         ]);
         //return redirect()->route('posts.index');
         return Redirect::to('home');
     }
 




    // public function handleProviderCallback($driver)
    // {
    // try {
    //     $user = Socialite::driver($driver)->user();
    // } catch (\Exception $e) {
    //     return redirect()->route('home');
    // }
    // //dd($user);


    // // $existingUser = User::where('provider_id', $user->id->first());
    // // if ($existingUser) {
    // //     Auth::login($existingUser,true);
    // //     return Redirect::to('home');
    // // }
    // // else {
    // //     $newUser                    = new User;
    // //     $newUser->provider_name     = $driver;
    // //     $newUser->provider_id       = $user->id;
    // //     $newUser->name              = $user->name;
    // //     $newUser->email             = $user->email;
    // //     $newUser->save();

    // //     Auth::login($newUser,true);
    // //     return Redirect::to('home');
    // // }

    // // return redirect()->route('home');
    // //dd($user);
    // $authUser = $this->findOrCreateUser($user);
    // //dd($authUser);
    
    //      Auth::login($authUser,true);
    //      return Redirect::to('home');
    // }


    

    // private function findOrCreateUser($githubUser)
    // {
    //     if ($authUser = User::where('github_id', $githubUser->id)->first()) {
    //         return $authUser;
            
    //     }
    //     User::create([
    //         'name' => $githubUser->name,
    //         'email' => $githubUser->email,
    //         'github_id' => $githubUser->id,
    //         //'provider_name' => $githubUser->provider_name
    //     ]);
    //     //return redirect()->route('posts.index');
    //     return Redirect::to('home');

    // }


//     public function handleProviderCallback($provider)
//     {
//         $getInfo = Socialite::driver($provider)->user();
         
//         $user = $this->createUser($getInfo,$provider);
 
//         auth()->login($user);
 
//         return redirect()->to('/home');
 
//     }
//    function createUser($getInfo,$provider){
 
//      $user = User::where('provider_id', $getInfo->id)->first();
 
//      if (!$user) {
//          $user = User::create([
//             'name'     => $getInfo->name,
//             'email'    => $getInfo->email,
//             'provider' => $provider,
//             'provider_id' => $getInfo->id
//         ]);
//       }
//       return $user;
//    }
}
