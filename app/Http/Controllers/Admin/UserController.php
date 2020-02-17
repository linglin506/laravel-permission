<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *用户列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::get();
        return view('admin.user.index', ['role_list' => $role]);
    }

    /**
     * Display a listing of the resource.
     *创建用户
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::get();
        return view('admin.user.create', ['role_list' => $role]);
    }

    public function store(Request $request)
    {
        //检查用户名和邮箱是否有重复
        $c = User::orWhere(array('name' => $request ->input('name'),'email' =>$request ->input('email'))) ->count();
        if($c > 0){
            return response()->json([
                'code' => '500',
                'msg' => '新增用户失败,账号或邮箱不能重复!',
                'data' => ""
            ]);
        }
        //检查通过创建用户
        $user = new User();
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        if ($request->input('check') == 'on') {
            $user->check = 1;
        } else {
            $user->check = 1;
        }
        $user->role_id = $request->input('role_id');
        $user->save();

        //给用户授权
        $role = Role::find($request->input('role_id'));
        $user->syncRoles($role->name);

        return response()->json([
            'code' => '0',
            'msg' => '新增用户成功!',
            'data' => ""
        ]);
    }

    /**
     * Display a listing of the resource.
     *编辑用户信息
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user_id = $request->id;
        $user = User::find($user_id);
        $role = Role::get();
        return view('admin.user.edit', ['user' => $user, 'role_list' => $role]);
    }

    /**
     * Display a listing of the resource.
     *更新用户信息
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = $request->id;
        $user = User::find($user_id);
        $role = Role::find($request->input('role_id'));
        //改变权限
        $user->syncRoles($role->name);
        //更新数据
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        if ($request->input('check') == 'on') {
            $user->check = 1;
        } else {
            $user->check = 0;
        }
        $user->save();

        return response()->json([
            'code' => '0',
            'msg' => '更新信息成功!',
            'data' => ""
        ]);
    }

    /**
     * Display a listing of the resource.
     *删除用户
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //有两个方式提交删除信息,get -> id, post->json
        if ($request->has('id')) {
            $id = $request->input('id');
            $user = User::find($id);
            if ($user->role_id > 0) {//如果用户有权限
                $role = Role::find($user->role_id);
                //先删除权限
                $user->removeRole($role->name);
            }

            //再删除用户
            if ($user->delete()) {
                return response()->json([
                    'code' => '0',
                    'msg' => '删除用户成功!',
                    'data' => ""
                ]);
            } else {
                return response()->json([
                    'code' => '500',
                    'msg' => '删除用户失败!',
                    'data' => ""
                ]);
            }
        } else {//删除多个
            $data = $request->getContent();
            $data = json_decode($data);
            foreach ($data as $user) {
                $u = User::find($user->id);
                if ($user->role_name > 0) {
                    $role = Role::find($user->role_name);
                    //先删除权限
                    $u->removeRole($role->name);
                }
                //再删除用户
                $u->delete();

            }
            return response()->json([
                'code' => '0',
                'msg' => '删除用户成功!',
                'data' => ""
            ]);
        }
    }
}
