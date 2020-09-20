<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Management\Services\AuthService;

/**
 * @group  Auth Section
 *
 * APIs for managing auth users
 */
class AuthController extends Controller
{
   public function __construct()
   {
      $this->service = new AuthService;
   }

   /**
     * Create user
     *
     * @bodyParam  [string] name
     * @bodyParam  [string] email
     * @bodyParam  [string] password
     * @bodyParam  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
      return response()->json($this->service->signUp($request->all()), 200);
    }
  
   /**
     * Login user and create token
     *
     * @bodyParam  [string] email
     * @bodyParam  [string] password
     * @bodyParam  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
      return response()->json($this->service->authenticate($request), 200);
    }
  
   /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
      return response()->json($this->service->logout($request), 200);
    }
  
   /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($this->service->user($request), 200);
    }
}