<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SetController extends Controller
{
    /*
     *
     */
    public function edit(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('auth.info', ['user' => $user]);
    }

    /*
     *更新信息
     */
    public function updateInfo(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->realname = $request->input('realname');
        if ($request->input('sex') == '男') {
            $user->sex = 0;
        } else {
            $user->sex = 1;
        }
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        if ($user->save()) {
            return response()->json(['code' => 0, 'msg' => '更新成功!']);
        }
        return response()->json(['code' => 500, 'msg' => '更新失败!']);
    }

    /*
     * 修改密码
     */
    public function password(Request $request)
    {

        return view('auth.password');

    }

    /*
     *
     */
    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        /*if (Hash::make($request->input('oldPassword')) != $user->password) {
            return response()->json(['code' => 501, 'msg' => '验证密码失败!']);
        }*/

        if ($request->input('repassword') != $request->input('password')) {
            return response()->json(['code' => 500, 'msg' => '验证密码失败!']);
        }

        $user->password = Hash::make($request->input('password'));
        if ($user->save()) {
            return response()->json(['code' => 0, 'msg' => '密码修改成功!']);
        }

        return response()->json(['code' => 500, 'msg' => '密码修改失败!']);
    }
}
