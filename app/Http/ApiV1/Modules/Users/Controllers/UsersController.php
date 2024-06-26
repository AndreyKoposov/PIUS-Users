<?php
 
namespace App\Http\ApiV1\Modules\Users\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Users\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
 
class UsersController
{
    public $successStatus = 200;
 /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyLaravelApp')-> accessToken; 
            $success['userId'] = $user->id;
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
 
 /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'is_creater' => 'required',
            'is_private' => 'required',
            'biography' => 'required'
        ]);
        if ($validator->fails()) { 
             return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
               $input['password'] = bcrypt($input['password']); 
               $user = User::create($input); 
               $success['token'] =  $user->createToken('MyLaravelApp')->accessToken; 
               $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus); 
    }
 
 /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function userDetails() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    }

    public function test() 
    {
        return response()->json(['success' => 'test answer', $this->successStatus]);
    }
}

?>