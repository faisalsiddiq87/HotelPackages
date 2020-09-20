<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Management\Services\PackageService;

/**
 * @group  Package
 *
 */
class PackageController extends Controller
{
  public function __construct()
  {
    $this->service = new PackageService;
  }

  /**
   * Create Package screen
   *
   */
  public function create(Request $request, $id = "")
  {
    $user = Auth::user();
    $data = ['user' => $user];

    if ($id) {
      $package = $this->service->findById($id);
      $data['model'] = $package['data'];
    }
    
    return view('package.index', $data);
  }

  /**
   * Package Detail Screen
   *
   */
  public function view(Request $request, $id)
  {
    $user = Auth::user();
    $package = $this->service->findById($id);
    return view('package.view', ['user' => $user, 'model' => $package['data']]);
  }
}