<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return response('delete success', 200);
    }
}
