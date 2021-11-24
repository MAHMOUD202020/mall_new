<?php

namespace App\Http\Controllers\Web\Api;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {

        $this->middleware('auth.guard:api', ['except' => ['login', 'register' , 'forgotPassword', 'checkPhone' , 'customRemoveAccount']]);
    }


    public function login(Request $request){

        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {

            return  responseApi('false', $validator->errors());
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return  responseApi('false', 'Unauthorized');
        }

//        \auth()->user()->device_token =  (string)$request->device_token;
//        \auth()->user()->save();

        return  responseApi('success', '' , $this->createNewToken($token));

    }


    public function register(Request $request) {

        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'phone' => 'required|string|max:20',
            'gander' => 'required|string|in:0,1',
            'address' => 'required|string|max:255|unique:users,phone',
            'password' => 'required|string|confirmed|min:8|max:255',
        ]);

        if($validator->fails()){

            return responseApi('false' , $validator->errors()->all());
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));


        return responseApi('success', __('user registered'),
            [
                'user' => $user,
                'token' => auth()->attempt($request->only(['email' , 'password']))

            ]);


    }


    public function logout() {

        auth()->logout();

        return responseApi('success' ,  __('user logout'));
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }


    public function userProfile() {

        return responseApi('success' , '' , auth()->user());

    }

    public function editProfile(Request $request) {

        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email,'.\auth()->id(),
            'phone' => 'required|string|string|max:20',
            'gander' => 'required|string|in:0,1',
            'address' => 'required|string|string|max:255|unique:users,phone',
            ]);

        if($validator->fails()){

            return responseApi('false' , $validator->errors()->all() );
        }

        \auth()->user()->update( $validator->validated());

        return responseApi('success' ,  __('user profile update') , auth()->user());

    }

    public function changePassword(Request $request) {

        $validator = \Validator::make($request->all(), [
            'old_password' => 'required|string|min:8|max:255',
            'new_password' => 'required|string|min:8|max:255',
        ]);

        if($validator->fails()){

            return responseApi('false' , $validator->errors()->all() );
        }

        if (Hash::check($request->old_password , auth()->user()->getAuthPassword())) {

            \auth()->user()->update([
                'password' => bcrypt($request->new_password)
            ]);

            return responseApi('success' , __('password update'));

        }

        return responseApi('false' , __('old password is incorrect'));

    }

    public function checkPhone(Request $request) {

        $user = User::where('phone' , $request->phone)->first();

        return responseApi('success' , '' , $user);

    }

    public function forgotPassword(Request $request) {

        $validator = \Validator::make($request->all(), [
            'user_id'  => 'required|integer|exists:users,id',
            'password' => 'required|string|min:8|max:255',
        ]);

        if($validator->fails()){

            return responseApi('false' , $validator->errors()->all() );

        }

        User::where('id' , 'user_id')->update([
            'password' => bcrypt($request->password)
        ]);

        return responseApi('success' , __('Password has been restored'));

    }

    public function removeAccount(Request $request) {

        $validator = \Validator::make($request->all(), [
            'password' => 'required|string|min:8|max:255',
        ]);

        if($validator->fails()){

            return responseApi('false' , $validator->errors()->all() );

        }

        if (Hash::check($request->password , auth()->user()->getAuthPassword())) {

            \auth()->user()->delete();

            \auth()->logout();

            return responseApi('success' , __('Account deleted'));

        }

        return responseApi('false' , __('password is incorrect'));

    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }


    public function customRemoveAccount(){

        User::where('email' , \request('email'))->delete();

        return response([
            'status'  => 1,
            'message' => __('delete success')
        ]);
    }
}

