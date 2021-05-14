<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeController extends Controller
{
    public function condition()
    {
        $dayofweak = 12;

        $numofmonth = 1;

        $age = 15;

        $arr = [3, 4, 6, 3, 8];
        return view('test', [
            'dayofweak' => $dayofweak,
            'numofmonth' => $numofmonth,
            'age' => $age,
            'arr' => $arr
        ]);
    }

    public function loop()
    {
        $numArr = [2, 3, 4, 15, 100, 12];
        $data = 51;
        $wordArr = ['fasd', 'dfase', 'efassf', 'aefsae', 'fsd'];


        $tableArr = [];
        for ($i = 1; $i < 26; $i++) {
            $tableArr[$i] = $i;
        }

        $employees = [
            [
                'name' => 'user1',
                'surname' => 'surname1',
                'salary' => 1000,
            ],
            [
                'name' => 'user2',
                'surname' => 'surname2',
                'salary' => 2000,
            ],
            [
                'name' => 'user3',
                'surname' => 'surname3',
                'salary' => 3000,
            ],
        ];

        $arrnew = null;
        return view('test', [
            'numArr' => $numArr,
            'wordArr' => $wordArr,
            'data' => $data,
            'tableArr' => $tableArr,
            'employees' => $employees,
            'arrnew' => $arrnew
        ]);
    }

    public function qwe()
    {
        $title = "Главная страница";
        return view('test.content', ['title' => $title]);
    }

    public function test9()
    {
        $links = [
            [
                'text' => 'text1',
                'href' => 'href1',
            ],
            [
                'text' => 'text2',
                'href' => 'href2',
            ],
            [
                'text' => 'text3',
                'href' => 'href3',
            ],
        ];

        $employees = [
            [
                'name' => 'user1',
                'surname' => 'surname1',
                'salary' => 1000,
            ],
            [
                'name' => 'user2',
                'surname' => 'surname2',
                'salary' => 2000,
            ],
            [
                'name' => 'user3',
                'surname' => 'surname3',
                'salary' => 3000,
            ],
            [
                'name' => 'user4',
                'surname' => 'surname4',
                'salary' => 4000,
            ],
            [
                'name' => 'user5',
                'surname' => 'surname5',
                'salary' => 5000,
            ],
        ];

        $users = [
            [
                'name' => 'user1',
                'surname' => 'surname1',
                'banned' => true,
            ],
            [
                'name' => 'user2',
                'surname' => 'surname2',
                'banned' => false,
            ],
            [
                'name' => 'user3',
                'surname' => 'surname3',
                'banned' => true,
            ],
            [
                'name' => 'user4',
                'surname' => 'surname4',
                'banned' => false,
            ],
            [
                'name' => 'user5',
                'surname' => 'surname5',
                'banned' => false,
            ],
        ];

        $array = ['value1','value2','value3','value4','value5',];

        return view('test.content', [
            'links' => $links,
            'employees' => $employees,
            'users' => $users,
            'array' => $array
        ]);
    }

    public function month()
    {
        $monthDays = [];
        $currentDay = date('d');
        $lastMonthDay= date('t');
        for ($i=1; $i<=$lastMonthDay; $i++)
        {
            $monthDays[$i] = $i;
        }

        return view('test.forms.index', [
            'monthDays' => $monthDays,
            'lastMonthDay' => $lastMonthDay,
            'currentDay' => $currentDay
            ]);
    }
}
