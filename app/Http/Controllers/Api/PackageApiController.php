<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Management\Services\PackageService;

/**
 * @group  Package management
 *
 * APIs for managing hotel packages
 */
class PackageApiController extends Controller
{
   public function __construct()
   {
      $this->service = new PackageService;
   }

   /**
     * Get All packages
     *
     * @urlParam [integer] page
     * @urlParam [integer] limit
     */
    public function findAll(Request $request)
    {
      return response()->json($this->service->findAll($request->all()), 200);
    }

    /**
     * Find package by Id
     *
     * @queryParam $id required to get data
     * @return [string] description
     */
    public function findById($id)
    {
      return response()->json($this->service->findById($id), 200);
    }

   /**
     * Create/Update package
     *
     * @bodyParam  [integer] hotel_id
     * @bodyParam  [integer] name
     * @bodyParam  [decimal] price
     * @bodyParam  [string] duration
     * @bodyParam  [date] validity
     * @queryParam  $id required for update
     * @bodyParam [string] description
     */
    public function store(Request $request, $id = null)
    {
      return response()->json($this->service->store($request->all(), $id), 200);
    }

    /**
     * Delete package
     *
     * @queryParam $id required for deletion
     * @return [string] message
     */
    public function delete($id)
    {
      return response()->json($this->service->delete($id), 200);
    }
}