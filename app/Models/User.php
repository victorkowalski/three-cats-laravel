<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Token;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAccessToken()
    {
        $validAccessToken = $this->getValidAccessToken();

        return $validAccessToken ? $validAccessToken : $this->createNewOrUpdateAccessToken();

    }

    protected function getValidAccessToken()
    {
        $token = Token::where('user_id', $this->id)
        ->where('expired_at', '>', time())
        ->first();

        return $token;
    }

    protected function createNewOrUpdateAccessToken()
    {
        $token = Token::where('user_id', $this->id)->first();

        return $token ? $this->updateAccessToken($token) : $this->createNewAccessToken();
    }

    protected function createNewAccessToken()
    {
        $token = new Token();
        $token->user_id = $this->id;
        $token->generateToken($this->getRandomTime());
        return $token->save() ? $token : null;
    }

    protected function updateAccessToken($token)
    {
        $token->generateToken(getRandomTime());
        return $token->save() ? $token : null;
    }

    private function getRandomTime()
    {        
        return Carbon::now()->addHours(24);
    }
}
