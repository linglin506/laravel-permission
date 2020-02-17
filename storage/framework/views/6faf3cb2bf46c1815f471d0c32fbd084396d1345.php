<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>月报管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    报告月份
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input" id="laydate-type-month" placeholder="yyyy-MM"
                               name="yuefen">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">单位名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" placeholder="请输入" autocomplete="on" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <button class="layui-btn layuiadmin-btn-admin" lay-submit lay-filter="LAY-search">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>

            </div>
        </div>
        <div class="layui-card-body">

            <table id="LAY-table" lay-filter="LAY-table"></table>
            <script type="text/html" id="table-toolbar-header">
                <div class="layui-btn-group">
                    <button class="layui-btn layui-btn-sm" lay-event="batchdel">删除</button>
                    <button class="layui-btn layui-btn-sm" lay-event="add">创建</button>
                </div>
            </script>

            <script type="text/html" id="progressTpl">
                <div class="layui-progress layuiadmin-order-progress" lay-showPercent="yes" lay-filter="progress-"+ {{ d.id }} +"">
                <div class="layui-progress-bar layui-bg-blue" lay-percent=" {{ d.progress }}%"></div>
                </div>
            </script>


            <script type="text/html" id="table-toolbar-inner">
                <div class="layui-btn-group">

                    <a class="layui-btn layui-btn-xs" lay-event="children">详情</a>


                    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i
                                class="layui-icon layui-icon-release"></i>发送</a>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report.yuebao.destroy')): ?>
                        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i
                                    class="layui-icon layui-icon-delete"></i>删除</a>
                    <?php endif; ?>
                </div>
            </script>
        </div>
    </div>
</div>

<script src="/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: '/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'report_yuebao', 'table', 'laydate'], function () {
        var $ = layui.$
            , form = layui.form
            , table = layui.table;

        var laydate = layui.laydate;


        //年月选择器
        laydate.render({
            elem: '#laydate-type-month'
            , type: 'month'
        });


    });
</script>
</body>
</html>

