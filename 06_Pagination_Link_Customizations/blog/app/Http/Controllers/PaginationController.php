<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class PaginationController extends Controller
{
    //


    public function index()
    {
        $users = User::paginate(5);
        return view('users', compact('users'));
    }

}
