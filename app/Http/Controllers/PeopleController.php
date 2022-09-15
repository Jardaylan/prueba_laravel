<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    public function index()
    {
        $peoples = People::all();

        return view('modules.people',compact('peoples'));
    }
}
