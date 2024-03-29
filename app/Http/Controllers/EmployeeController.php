<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employees;

    public function __construct()
    {
        $this->employees = [
            1 => [
                'name' => 'user1',
                'surname' => 'surname1',
                'salary' => 1000,
            ],
            2 => [
                'name' => 'user2',
                'surname' => 'surname2',
                'salary' => 2000,
            ],
            3 => [
                'name' => 'user3',
                'surname' => 'surname3',
                'salary' => 3000,
            ],
            4 => [
                'name' => 'user4',
                'surname' => 'surname4',
                'salary' => 4000,
            ],
            5 => [
                'name' => 'user5',
                'surname' => 'surname5',
                'salary' => 5000,
            ],
        ];

    }

    public function showOne($id)
    {
        foreach ($this->employees as $key=>$value)
        {
            if ($key==$id)
            {
                return "Name: ".$value['name']."<br>".
                    "Surname: ".$value['surname']."<br>".
                    "Salary: ".$value['salary'];
            }
        }
    }

    public function showField($id, $field)
    {
        foreach ($this->employees as $key=>$value)
        {
            if ($key==$id)
            {
                return "ID: "."$key ".$value["$field"]."<br>";
            }
        }
    }

}
