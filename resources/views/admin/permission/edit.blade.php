<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑权限</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
    <style>
        /*图标展示*/
        .site-doc-icon {
            width: 1050px;
            background-color: #fff
        }

        .site-doc-icon li {
            cursor: pointer;
            display: inline-block;
            vertical-align: middle;
            width: 127px;
            height: 105px;
            line-height: 25px;
            padding: 20px 0;
            margin-right: -1px;
            margin-bottom: -1px;
            border: 1px solid #e2e2e2;
            font-size: 14px;
            text-align: center;
            color: #666;
            transition: all .3s;
            -webkit-transition: all .3s;
        }

        .site-doc-anim li {
            height: auto;
        }

        .site-doc-icon li .layui-icon {
            display: inline-block;
            font-size: 36px;
        }

        .site-doc-icon li .doc-icon-name,
        .site-doc-icon li .doc-icon-code {
            color: #c2c2c2;
        }

        .site-doc-icon li .doc-icon-code xmp {
            margin: 0
        }

        .site-doc-icon li .doc-icon-fontclass {
            height: 40px;
            line-height: 20px;
            padding: 0 5px;
            font-size: 13px;
            color: #333;
        }

        .site-doc-icon li:hover {
            background-color: #f2f2f2;
            color: #000;
        }

    </style>
</head>
<body>

<div class="layui-form" lay-filter="layuiadmin-form-permission" id="layuiadmin-form-permission"
     style="padding: 20px 30px 0 0;">
    {{csrf_field()}}
    <div class="layui-form-item">
        <label class="layui-form-label">父级</label>
        <div class="layui-input-block">
            <select name="parent_id">
                <option value="0">顶级权限</option>
                @forelse($permissions as $perm)
                    <option value="{{$perm['id']}}" {{ isset($permission->id) && $perm['id'] == $permission->parent_id ? 'selected' : '' }} >{{$perm['display_name']}}</option>
                    @if(isset($perm['_child']))
                        @foreach($perm['_child'] as $childs)
                            <option value="{{$childs['id']}}" {{ isset($permission->id) && $childs['id'] == $permission->parent_id ? 'selected' : '' }} >
                                &nbsp;&nbsp;|--{{$childs['display_name']}}</option>
                            @if(isset($childs['_child']))
                                @foreach($childs['_child'] as $lastChilds)
                                    <option value="{{$lastChilds['id']}}" {{ isset($permission->id) && $lastChilds['id'] == $permission->parent_id ? 'selected' : '' }} >
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--{{$lastChilds['display_name']}}</option>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @empty
                @endforelse
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <input type="text" name="name" value="{{$permission->name}}" lay-verify="required" class="layui-input"
                   placeholder="如：system.index">
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">显示名称</label>
        <div class="layui-input-block">
            <input type="text" name="display_name" value="{{$permission->display_name}}" lay-verify="required"
                   class="layui-input" placeholder="如：系统管理">
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">路由</label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" name="route" value="{{$permission->route}}"
                   placeholder="如：admin.member">
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">图标</label>
        <div class="layui-input-inline">
            <input class="layui-input" type="hidden" name="icon_id">
        </div>
        <div class="layui-form-mid layui-word-aux" id="icon_box">
            <i class="layui-icon {{$permission->icon->class??''}}"></i> {{$permission->icon->name??''}}
        </div>
        <div class="layui-form-mid layui-word-aux">
            <button type="button" class="layui-btn layui-btn-xs" onclick="showIconsBox()">选择图标</button>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">描述</label>
        <div class="layui-input-block">
            <textarea type="text" name="descr" autocomplete="off" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item layui-hide">
        <button class="layui-btn" lay-submit lay-filter="LAY-user-permission-submit" id="LAY-user-permission-submit">
            提交
        </button>
    </div>
</div>

<script src="/layuiadmin/layui/layui.js"></script>
<script src="/js/jquery.min.js"></script>
<script>
    layui.config({
        base: '/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'form', 'element', 'layer', 'table', 'upload', 'laydate'], function () {
        var $ = layui.$
            , form = layui.form;
    })
</script>

<script>
    //选择图标
    function chioceIcon(obj) {
        var icon_id = $(obj).data('id');
        $("input[name='icon_id']").val(icon_id);
        $("#icon_box").html('<i class="layui-icon ' + $(obj).data('class') + '"></i> ' + $(obj).data('name'));
        layer.closeAll();
    }

    //弹出图标
    function showIconsBox() {
        var index = layer.load();
        $.get("{{route('admin.icons')}}", function (res) {
            layer.close(index);
            if (res.code == 0 && res.data.length > 0) {
                var html = '<ul class="site-doc-icon">';
                $.each(res.data, function (index, item) {
                    html += '<li onclick="chioceIcon(this)" data-id="' + item.id + '" data-class="' + item.class + '" data-name="' + item.name + '" >';
                    html += '   <i class="layui-icon ' + item.class + '"></i>';
                    html += '   <div class="doc-icon-name">' + item.name + '</div>';
                    html += '   <div class="doc-icon-code"><xmp>' + item.unicode + '</xmp></div>';
                    html += '   <div class="doc-icon-fontclass">' + item.class + '</div>';
                    html += '</li>'
                });
                html += '</ul>';
                layer.open({
                    type: 1,
                    title: '选择图标',
                    area: ['510px', '450px'],
                    content: html
                })
            } else {
                layer.msg(res.msg);
            }
        }, 'json')
    }
</script>

</body>
</html>