<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showOne($id)
    {
        $pages = [
            1 => 'страница 1',
            2 => 'страница 2',
            3 => 'страница 3',
            4 => 'страница 4',
            5 => 'страница 5',
        ];

        foreach ($pages as $key=>$page)
        {
            if ($id == $key)
            {
                return $page;
            }
        }

        return "Страницы с таким номером нет";
    }

    public function showAll()
    {
        return "ShowAll";
    }

    public function test($num1, $num2)
    {
        return $num1+$num2;
    }

    public function viewTest()
    {
        $text = 'Ссылка на Гугел';
        $href = 'https://www.google.com/';

        $arr = [1, 9, 3, 'example', 23];

        $city = 'New-York';

        $location = array('country' => 'England', 'city' => 'London');

        $year = "2012"; $month = "03"; $day = "09";

        $str = '<p style="background: cadetblue">строка</p>';
        return view('test',
            [
                'href' => $href,
                'text' => $text,
                'arr' => $arr,
                'city' => $city,
                'location' => $location ?? null,
                'year'=>$year, 'month'=>$month, 'day'=>$day,
                'str'=>$str
            ]);


    }
}
