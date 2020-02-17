<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示顶级权限
        $permission = Permission::where('parent_id', '0')->get();
        $pp = $this->tree();
        return view('admin.permission.index', ['permission' => $permission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->tree();
        return view('admin.permission.create', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $permissions = $this->tree();
        $id = $request->id;
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permissions', 'permission'));
    }

    /**
     * Display a listing of the resource.
     *更新权限信息
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->parent_id = $request->input('parent_id');
        $permission->display_name = $request->input('display_name');
        $permission->route = $request->input('route');
        if ($request->input('icon_id') > 0) {
            $permission->icon_id = $request->input('icon_id');
        }
        $permission->save();
        return response()->json([
            'code' => '0',
            'msg' => '更新信息成功!',
            'data' => ""
        ]);
    }

    /*
     * 新建权限
     */
    public function store(Request $request)
    {
        //检查名称有无重复
        $c = Permission::orWhere(array('name' => $request->input('name')))->count();
        if ($c > 0) {
            return response()->json([
                'code' => '500',
                'msg' => '新增权限失败,名称不能有重复!',
                'data' => ""
            ]);
        }
        //创建权限
        $res = Permission::create(array(
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'route' => $request->input('route'),
            'icon_id' => $request->input('icon_id'),
            'parent_id' => $request->input('parent_id'),
            'guard_name' => 'web'
        ));
        if ($res) {
            return response()->json([
                'code' => '0',
                'msg' => '新增权限成功!',
                'data' => ""
            ]);
        } else {
            return response()->json([
                'code' => '500',
                'msg' => '新增权限失败!',
                'data' => ""
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除权限
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if (empty($id)) {
            return response()->json(['code' => 1, 'msg' => '请选择需要删除的权限!']);
        }
        $permission = Permission::find($id);
        if (!$permission) {
            return response()->json(['code' => -1, 'msg' => '权限不存在!']);
        }
        //如果有子权限，则禁止删除
        if (Permission::where('parent_id', $id)->first()) {
            return response()->json(['code' => 500, 'msg' => '存在子权限禁止删除!']);
        }

        if ($permission->delete()) {
            return response()->json(['code' => 0, 'msg' => '权限删除成功!']);
        }
        return response()->json(['code' => 500, 'msg' => '权限删除失败']);
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
