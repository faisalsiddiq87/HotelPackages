<?php

namespace App\Management\Validations;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class PackageValidation
{
    public function validate($inputs) 
    {
        $rules = [
        'name' => 'required|string',
        'hotel_id' => 'required|integer|exists:hotels,id',
        'price' => 'required|numeric',
        'duration' => 'required|string',
        'validity' => 'required|date',
        'description' => 'required'
        ];

        $validator = Validator::make($inputs, $rules);
        
        $response = true;

        if ($validator->fails()) {
            $response = ['errors' => $validator->errors()];
        }

        return $response;
    }
}