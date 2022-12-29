<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GetAllUsersController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = User::all();
        return $users->toJson();
    }
}
