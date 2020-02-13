<!DOCTYPE html>
<html>
<head>
    @include("admin.static._header")
    <style>
        .layui-form-item .layui-input-company {
            width: auto;
            padding-right: 10px;
            line-height: 38px;
        }
    </style>
</head>
<body>
<div class="layuimini-container">
    <div class="layuimini-main">

        <div class="layui-form layuimini-form">
            <div class="layui-form-item">
                @csrf
                {{ method_field('PATCH') }}
                <label class="layui-form-label required">姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="required" lay-reqtext="管理账号不能为空"
                           placeholder="请输入管理账号" value="{{ $user->name }}" class="layui-input">
                </div>
            </div>
            {{--            <div class="layui-form-item">--}}
            {{--                <label class="layui-form-label required">手机</label>--}}
            {{--                <div class="layui-input-block">--}}
            {{--                    <input type="number" name="phone" lay-verify="required" lay-reqtext="手机不能为空" placeholder="请输入手机"  value="" class="layui-input">--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-block">
                    <input type="email" name="email" placeholder="请输入邮箱" value="{{ Auth::user()->email }}"
                           class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label required">密码</label>
                <div class="layui-input-block">
                    <input type="password" name="password" placeholder="请输入密码" value="" class="layui-input">
                    <tip>填写密码,为空则不修改。</tip>
                </div>
            </div>

            {{--                <div class="layui-form-item">--}}
            {{--                    <label class="layui-form-label required">新的密码</label>--}}
            {{--                    <div class="layui-input-block">--}}
            {{--                        <input type="password" name="new_password" lay-verify="required" lay-reqtext="新的密码不能为空" placeholder="请输入新的密码"  value="" class="layui-input">--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <div class="layui-form-item">
                <label class="layui-form-label required">确认新密码</label>
                <div class="layui-input-block">
                    <input type="password" name="password_confirmation" lay-verify="required" lay-reqtext="确认密码不能为空"
                           placeholder="请确认密码" value="" class="layui-input">
                </div>
            </div>
            {{--                <div class="layui-form-item layui-form-text">--}}
            {{--                    <label class="layui-form-label">备注信息</label>--}}
            {{--                    <div class="layui-input-block">--}}
            {{--                        <textarea name="remark" class="layui-textarea" placeholder="请输入备注信息"></textarea>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="saveBtn">确认保存</button>
                </div>
            </div>

        </div>
    </div>
</div>
@include("admin.static._footer")
<script>
    layui.use(['form', 'layuimini'], function () {
        var form = layui.form,
            layer = layui.layer,
            layuimini = layui.layuimini;

        //监听提交
        form.on('submit(saveBtn)', function (data) {
            // var index = layer.alert(JSON.stringify(data.field), {
            //     title: '最终的提交信息'
            // }, function () {
            //     layer.close(index);
            //     layuimini.closeCurrentTab();
            // });
            $.ajax({
                type: 'POST',
                url: '{{ route("user.update",$user->id) }}',
                data: data.field,
                success: function (res) {
                    if (res.code === 200) {
                        layer.msg(res.msg, function () {
                            location.reload();
                        });
                    }
                },
                error: function (res) {
                    console.log(res.responseJSON.errors);
                    if (res.responseJSON.errors) {
                        let error = "";
                        for (let i in res.responseJSON.errors) {
                            error += res.responseJSON.errors[i] + "<br/>";
                        }

                        layer.msg(error);
                    } else {
                        layer.msg(res.status + " " + res.responseJSON.message);
                    }

                    return false;
                }
            });

        });
    });
</script>
</body>
</html>
