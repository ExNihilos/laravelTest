<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function show($id)
    {
        $developer = Developer::find($id);

        return view('GamePortal.developer.show', [
            'developer' => $developer
        ]);
    }
}
