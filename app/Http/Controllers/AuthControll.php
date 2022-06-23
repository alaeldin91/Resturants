<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControll extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'min:4', 'confirmed']


        ]);



        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);


        if ($user->save()) {
            return response()->json(['message' => 'the Successfull Registered', 'status_code' => 201], 201);
        } else {
            return response()->json(['message' => 'the Error Occured', 'status_code' => 500], 500);
        }
    }
    public function addAdministrator(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'min:4'],
            'password_confirmation' => 'required|same:password',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);


        $user = new User();
        $path = $request->file('image')->store('owners_images');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'owner';
        $user->image = $path;


        if ($user->save()) {
            return response()->json(['message' => 'the Successfull Created', 'status_code' => 200], 200);
        } else {
            return response()->json(['message' => 'the Error Occured', 'status_code' => 500], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            'remeber_me' => 'boolean'
        ]);
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'unAuthorized', 'status_code' => 401], 401);
        }

        $user = $request->user();

        if ($user->role === 'owner') {
            $tokenData = $user->createToken(' personal access tokens', ['do-anything']);
        } else {
            $tokenData = $user->createToken(' personal access tokens', ['can-create']);
        }
        $token = $tokenData->token;
        if ($request->remeber_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        if ($token->save()) {
            return response()->json(['user' => $user, 'access_token' => $tokenData->accessToken, 'token_type' => 'Bearer', 'token_scope' => $tokenData->token->scopes[0], 'expires_at' => Carbon::parse($tokenData->token->expires_at)->toDateTimeString(), 'staus_code' => 200], 200);
        } else {
            return response()->json(['message' => 'some error please try again', 'status_code' => 500], 500);
        }
    }
    public function  logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Logout Successfully', 'status_code' => 200], 200);
    }
    public function getOwner()
    {
        $user = User::where('role', 'owner')->paginate(20)->toArray();
        return array_reverse($user);;
    }
    public function deleteOwner($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'delete Owner Successfully']);
    }
    public function updateAdmin(Request $request,$id)
    {
        $user = User::findOrFail($id);
       
        $user->update($request->all());
        return response()->json(['nessage'=>'Successfully Update Admin','data'=>$user]);
    }
    public function editAdmin($id){
       $user = User::findOrFail($id);

      return  response()->json(['User'=>$user]);
    }
}
