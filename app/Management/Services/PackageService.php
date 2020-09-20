<?php

namespace App\Management\Services;

use App\Management\Validations\PackageValidation;
use Illuminate\Support\Facades\Auth;
use App\Management\Repositories\PackageRepository;
use App\Management\Contracts\Service\Contract;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Carbon\Carbon;
use Datatables;

class PackageService implements Contract
{
    private $repository;

    private $validator;

    public function __construct()
    {
        $this->repository = new PackageRepository;

        $this->validator = new PackageValidation;
    }

    public function findAll($data)
    {
        return Datatables::of($this->repository->getAllPackages($data)->get())->make(true);
    }

    public function findById($id)
    {
        $package  = $this->repository->findById($id);

        return ['data' =>$package, 'message' => 'Package data found.' ];
    }

    public function store($data, $id = "")
    {
        $response = $this->validator->validate($data, true);
        $userId = Auth::id();

        if ($response === true) {
            $data['created_by'] = $data['updated_by'] = $userId;
            $user = $this->repository->store($data, $id);
            $response = ['data' => $user, 'message' => $id ? 'Successfully Updated Package.' : 'Successfully Created Package.'];
        }

        return $response;
    }

    public function delete($data, $id = "")
    {
        $this->repository->delete($data, $id);

        return ['data' =>[], 'message' => 'Package deleted Successfully' ];
    }

    public function findAllHotels()
    {
        return ['data' =>Hotel::all(), 'message' => 'Hotels Data Found.' ];
    }
}