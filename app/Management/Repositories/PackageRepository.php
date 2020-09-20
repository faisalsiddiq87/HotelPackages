<?php

namespace App\Management\Repositories;

use App\Models\Package;
use App\Management\Contracts\Repository\Contract;

class PackageRepository implements Contract
{
    public function getAllPackages()
    {
        return Package::query()->with(['hotel', 'creator']);
    }

    public function findById($id)
    {
        return Package::with(['hotel', 'creator'])->findorFail($id);
    }

    public function store($data, $id = "")
    {
        if ($id) {
            $model = Package::findorFail($id);
        } else {
            $model = new Package;
        }
       
        $model->name = $data['name']; 
        $model->hotel_id = $data['hotel_id'];
        $model->price = $data['price'];
        $model->duration = $data['duration'];
        $model->validity = $data['validity'];
        $model->description = $data['description'];
        $model->created_by = $data['created_by'];
        $model->updated_by = $data['updated_by'];
        $model->save();
        return $model;
    }

    public function delete($id)
    {
        $model = Package::findorFail($id);

        return $model->delete();
    }
}