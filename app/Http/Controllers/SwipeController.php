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
        $userA=DB::table('users')->find($id);
        $userB=DB::table('users')->find($id2);
        $swipe=DB::table('users')->where('user_A','=',$id,'AND','user_B','=',$id2)->get()->toArray();
        if(count($swipe)==0)
        {
            $swipe=DB::table('swipes')->where('user_A','=',$id2,'AND','user_B','=',$id)->get()->toArray();
            if(count($swipe)==0)
            {
                DB::table('swipes')->insert([
                    'user_A' => $id,
                    'user_B' => $id2
                ]);
                echo($userA->name).' likes: '.$userB->name;
            }
            else
            {
                DB::table('swipes')->where('user_A','=',$id2,'AND','user_B','=',$id)->delete();
                
                DB::table('pairs')->insert([
                    'user_A' => $id,
                    'user_B' => $id2
                ]);
                echo($userA->name).' made a pair with: '.$userB->name;
            }
        }
        else {
            //Since we only have a table with 2 id rows of users, let's get rid of duplicates like this
            echo 'Swipe already exists!';
        }
        
        
    }
    public function swipeleft($id,$id2)
    {
        $userA=DB::table('users')->find($id);
        $userB=DB::table('users')->find($id2);
        echo($userA->name).' does not like: '.$userB->name;
    }

}
