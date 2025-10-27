<?php
namespace App\Actions\Department;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CreateDepartment
{
    public function CreateDepartment(array $data)
    {
        $validate = Validator::make($data,[
            
        ]);
    }
}