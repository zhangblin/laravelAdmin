<!DOCTYPE html>
<html>
<head>
    @include("admin.static._header")
</head>
<body>
<div class="layuimini-container">
    <div class="layuimini-main">
        <form class="layui-form" action="">
            @csrf
            <div class="layui-form-item">
                <label class="layui-form-label">菜单名称</label>
                <div class="layui-input-block">
                    <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入菜单名称" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上级菜单</label>
                <div class="layui-input-block">
                    <select name="pid" lay-search>
                        <option value="0">一级菜单</option>
                        <option value="1">阅读</option>
                        <option value="2">游戏</option>
                        <option value="3">音乐</option>
                        <option value="4">旅行</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单图标</label>
                <div class="layui-input-block">
                    <input type="text" name="icon" placeholder="请输入菜单图标"  class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">控制器</label>
                <div class="layui-input-block">
                    <input type="text" name="controller"   placeholder="请输入控制器" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">方法</label>
                <div class="layui-input-block">
                    <input type="text" name="action"   placeholder="请输入标题" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-block">
                    <input type="text" name="order"  placeholder="排序" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block" style="text-align: center;margin-left: 0px;">
                    <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>

    </div>
</div>

@include("admin.static._footer")
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use(['form', 'layedit', 'laydate'], function () {
        var form = layui.form
            , layer = layui.layer;

        //监听提交
        form.on('submit(demo1)', function (data) {
            $.ajax({
                type: 'POST',
                url: '{{ route("menu.store") }}',
                data: data.field,
                success: function (res) {
                    if (res.code === 200) {
                        layer.msg(res.msg, function () {
                            location.reload();
                        });
                    }
                },
                error: function (res) {
                    if(res.responseJSON.errors){
                        let error="";
                        for(let i in res.responseJSON.errors){
                            error+=res.responseJSON.errors[i]+"<br/>";
                        }
                        layer.msg(error);
                    }else{
                        layer.msg(res.status + " " + res.responseJSON.message);
                    }

                    return false;
                }
            });
            return false;
        });


    });
</script>

</body>
</html>
