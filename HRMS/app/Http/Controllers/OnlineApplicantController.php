<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OnlineApplicant;

class OnlineApplicantController extends Controller
{
    //
    function showaboutme()
    {
        return view('aboutme');
    }
}
