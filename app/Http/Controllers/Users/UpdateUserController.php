<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UpdateUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $id = $request->input('id');
        DB::beginTransaction();
        try {
            User::where('id', $id)->update($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
