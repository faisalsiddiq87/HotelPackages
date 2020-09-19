<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Management\Services\PackageService;

class PackageApiController extends Controller
{
   public function __construct()
   {
      $this->service = new PackageService;
   }

   /**
     * Get All packages
     *
     * @param  [integer] page
     * @param  [integer] limit
     */
    public function findAll(Request $request)
    {
      return response()->json($this->service->findAll($request->all()), 200);
    }

    /**
     * Find package by Id
     *
     * @param  $id query string
     * @return [string] description
     */
    public function findById($id)
    {
      return response()->json($this->service->findById($id), 200);
    }

   /**
     * Create/Update package
     *
     * @param  [integer] hotel_id
     * @param  [integer] name
     * @param  [decimal] price
     * @param  [string] duration
     * @param  [date] validity
     * @param  $id query string
     * @return [string] description
     */
    public function store(Request $request, $id = null)
    {
      return response()->json($this->service->store($request->all(), $id), 200);
    }

    /**
     * Delete package
     *
     * @param  $id query string
     * @return [string] message
     */
    public function delete($id)
    {
      return response()->json($this->service->delete($id), 200);
    }
}