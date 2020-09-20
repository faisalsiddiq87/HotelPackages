<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Management\Services\AuthService;

/**
 * @group  Dashboard
 *
 */
class HomeController extends Controller
{
   public function __construct()
   {
      $this->service = new AuthService;
   }

   /**
     * Dashboard
     *
     */
    public function index(Request $request)
    {
      $user = Auth::user();

      return view('dashboard.index', ['user' => $user]);
    }

}