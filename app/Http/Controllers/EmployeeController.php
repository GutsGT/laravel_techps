<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;

class EmployeeController extends Controller{

    private User $user;
    private Employee $employee;

    public function enterForm(){

        $formParams = [
            "method" => "store", 
            "title" => "Criação de Funcionário"
        ];

        return view("employee-form")
            ->with("formParams",  $formParams)
            ->with("title", $formParams["title"]);
    }

}
