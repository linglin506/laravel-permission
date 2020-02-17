<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>设置我的信息</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
</head>
<body>
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">设置我的资料</div>
          <div class="layui-card-body" pad15>
            <div class="layui-form" lay-filter="">
              <div class="layui-form-item">
                {{csrf_field()}}
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-inline">
                  <input type="text" name="name" value="{{$user ->name}}" readonly class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">不可修改,用于系统登陆名.</div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-inline">
                  <input type="text" name="realname" value="{{$user ->realname}}" lay-verify="name" autocomplete="off" placeholder="请输入姓名" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-block">
                  @if($user ->sex == 0)
                    <input type="radio" name="sex" value="男" title="男" checked>
                    <input type="radio" name="sex" value="女" title="女" >
                  @else

                  <input type="radio" name="sex" value="男" title="男">
                  <input type="radio" name="sex" value="女" title="女" checked>
                    @endif
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">手机</label>
                <div class="layui-input-inline">
                  <input type="text" name="phone" value="{{$user->phone}}" lay-verify="phone" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-inline">
                  <input type="text" name="email" value="{{$user -> email}}" lay-verify="email" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">简介</label>
                <div class="layui-input-block">
                  <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
                </div>
              </div>
              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="setmyinfo">确认修改</button>
                  <button type="reset" class="layui-btn layui-btn-primary">重置表单</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/layuiadmin/layui/layui.js"></script>
  <script>
  layui.config({
    base: '/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index','form', 'set']);
  </script>
</body>
</html>