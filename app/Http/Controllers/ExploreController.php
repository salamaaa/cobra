<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index(){
        $users = User::paginate(7);
        return view('cobra.explore',['users'=>$users]);
    }
}
