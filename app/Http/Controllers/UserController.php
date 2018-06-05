<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;



class UserController extends Controller
{
	public function signup(Request $request){

		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required',
			'language' => 'required'
		]);

		$user = new User([
			'name'=> $request->input('name'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
			'language' => $request->input('language'),
			]);
		
		$user->save();

		return response()->json([
			'message'=> 'Successfully Created User'
			], 201);
	}



	public function signin(Request $request){

		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
		]);  
		$credentials = $request->only('email', 'password');
		try{
			if(!$token = JWTAuth::attempt($credentials)){
				return response()->json([
						'error' => 'Invalid Credentials'
					], 401);
			}
		} catch (JWTException $e){
			return response()->json([
					'error'=> 'Could not create token!'
				], 500);
		}
		return response()->json([
				'token' => $token
			], 200);
	}

	public function profile(){
    try {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }
    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
        return response()->json(['token_expired'], $e->getStatusCode());
    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        return response()->json(['token_invalid'], $e->getStatusCode());
    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
        return response()->json(['token_absent'], $e->getStatusCode());
    }

    return response()->json(['user' => $user], 200);

}
}