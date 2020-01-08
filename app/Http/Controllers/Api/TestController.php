<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;
use App\Models\Token;
use Illuminate\Support\Facades\Auth;
use Validator;
   
class TestController extends BaseController
{
    public function index(Request $request)
    {
        //return 'index'; 
        $user = Auth::user();
        return $this->sendResponse($user, 'User register successfully.');
    }
}