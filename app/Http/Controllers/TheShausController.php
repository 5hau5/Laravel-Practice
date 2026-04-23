<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TheShausController extends Controller
{
    public function shausing()
    {
        $text = "yes";
        return view('shaus.shaus', compact('text'));
    }
}
