<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $titles = DB::table('users')->get();
 
        print_r($titles);
    }
    public function createuser($name)
    {
        DB::table('users')->insert([
            'name' => $name
        ]);
        echo $name.' user created';
    }
}
