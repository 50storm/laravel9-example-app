<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CreateUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        DB::beginTransaction();
        try {
            var_dump($request->all());
            User::create($request->all());
            DB::commit();
            var_dump("commit");
        } catch (\Exception $e) {
            var_dump("rollback");
            DB::rollback();
        }
    }
}
