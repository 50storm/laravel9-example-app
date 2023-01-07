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
            // $user = User::find($id);
            // $user->fill($request->all());
            // $user->update();
            User::where('id', $id)->update($request->all());
            DB::commit();
            var_dump("commit");
        } catch (\Exception $e) {
            var_dump("rollback");
            DB::rollback();
        }
    }
}
