<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SwipeController extends Controller
{
    public function index()
    {
        return view('swipe');
    }
    public function swiperight($id,$id2)
    {
        $userA=DB::table('users')->where('id','=',$id)->get()->toArray();
        $userB=DB::table('users')->where('id','=',$id2)->get()->toArray();
        //echo($user[0]->id);
        echo($userA[0]->name).' likes: '.$userB[0]->name;
    }
    public function swipeleft($id,$id2)
    {
        $userA=DB::table('users')->where('id','=',$id)->get()->toArray();
        $userB=DB::table('users')->where('id','=',$id2)->get()->toArray();
        //echo($user[0]->id);
        echo($userA[0]->name).' does not like: '.$userB[0]->name;
    }

}
