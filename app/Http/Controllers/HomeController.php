<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $ranters = DB::table('model_has_roles')->where('role_id', 1)->get();
        $owners = DB::table('model_has_roles')->where('role_id', 2)->get();
        $properties = Property::all();
        return view('home.home', compact('ranters', 'owners', 'properties'));
    }
}
