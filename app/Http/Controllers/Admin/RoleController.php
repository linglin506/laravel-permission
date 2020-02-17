<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'display_name']);
        if (Role::create($data)) {
            return response()->json([
                'code' => '0',
                'msg' => '添加角色成功!',
                'data' => ""
            ]);
        }
        return response()->json([
            'code' => '500',
            'msg' => '添加角色失败!',
            'data' => ""
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $role = Role::find($request->id);
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $role = Role::find($request->id);
        $data = $request->only(['name', 'display_name']);
        if ($role->update($data)) {
            return response()->json(['code' => 0, 'msg' => '更新成功!']);
        }
        return response()->json(['code' => 500, 'msg' => '更新失败!']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        if (empty($id)) {
            return response()->json(['code' => 500, 'msg' => '请选择删除项!']);
        }
        if (Role::destroy($id)) {
            return response()->json(['code' => 0, 'msg' => '删除成功!']);
        }
        return response()->json(['code' => 500, 'msg' => '删除失败!']);
    }

    /**
     * 分配权限
     */
    public function permission(Request $request)
    {
        $role = Role::find($request->id);
        $permissions = $this->tree();
        foreach ($permissions as $key1 => $item1) {
            $permissions[$key1]['own'] = $role->hasPermissionTo($item1['id']) ? 'checked' : false;
            if (isset($item1['_child'])) {
                foreach ($item1['_child'] as $key2 => $item2) {
                    $permissions[$key1]['_child'][$key2]['own'] = $role->hasPermissionTo($item2['id']) ? 'checked' : false;
                    if (isset($item2['_child'])) {
                        foreach ($item2['_child'] as $key3 => $item3) {
                            $permissions[$key1]['_child'][$key2]['_child'][$key3]['own'] = $role->hasPermissionTo($item3['id']) ? 'checked' : false;
                        }
                    }
                }
            }

        }
        return view('admin.role.permission', compact('role', 'permissions'));
    }

    /**
     * 存储权限
     */
    public function assignPermission(Request $request)
    {
        $role = Role::find($request->id);
        $permissions = $request->input('permissions');

        if (empty($permissions)) {
            $role->permissions()->detach();
            return response()->json(['code' => 0, 'msg' => '角色权限更新成功!']);
        }
        $role->syncPermissions($permissions);
        return response()->json(['code' => 0, 'msg' => '角色权限更新成功!']);
    }


    /**
     * 处理权限分类
     */
    public function tree($list = [], $pk = 'id', $pid = 'parent_id', $child = '_child', $root = 0)
    {
        if (empty($list)) {
            $list = Permission::get()->toArray();
        }
        // 创建Tree
        $tree = array();
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }
}
