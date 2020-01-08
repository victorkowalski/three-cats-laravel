<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::viaRequest('email', function ($request) {

            return User::where('email', $request->email)->first();
        });

        //
        /*Auth::viaRequest('custom-token', function ($request) {

            return User::where('token', $request->token)->first();
        });*/
        /* last one -----------------------
        Auth::viaRequest('custom-token', function ($request) {
            //return User::where('token', $request->token)->first();
            return User::where('id', 1)->first();
        });*/
/*
        Auth::viaRequest('custom-token', function ($request) {
            $token = $request->bearerToken();
            
            $user = User::where('id', 1)->first();
            return $user;
*/

            //$secret = config('auth.auth_jwt_secret_key');
        /*
            if ($token && strlen($token) > 0) {
                try {
                    $user = JWT::decode($token, $secret, array("HS256"));
                    if (!$user) throw new \Exception;
                } catch (\Exception $e) {
                    return null;
                }
        
                return DB::table("users")->where("id", $user->user->id)->first();
            }
        
            return null;*/
        //});
    }
}

//boot
/*
        $this->app['auth']->viaRequest('api', function ($request) {
           if ($request->header('Authorization')) { 
                $key = explode(' ',$request->header('Authorization'));
                $user = Users::where('api_key', $key[1])->first();
                if(!empty($user)){
                    $request->request->add(['userid' => $user->id]);
                    
                }
                return $user;
            }           
        });
    */