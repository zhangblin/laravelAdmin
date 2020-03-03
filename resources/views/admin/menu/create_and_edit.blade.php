<!DOCTYPE html>
<html>
<head>
    @include("admin.static._header")
</head>
<body>
<div class="layuimini-container">
    <div class="layuimini-main">
        <form class="layui-form" action="">
            @if($menu->id)
                <input type="hidden" name="_method" value="PUT">
            @endif

            @csrf
            <div class="layui-form-item">
                <label class="layui-form-label">菜单名称</label>
                <div class="layui-input-block">
                    <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入菜单名称" class="layui-input" value="{{ old('title', $menu->title ) }}">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">上级菜单</label>
                <div class="layui-input-block">
                    <select name="pid" lay-search>
                        <option value="0">一级菜单</option>
                        @foreach ($menuList as $list)
                            <option value=" {{ $list->id }}"  {{ $menu->pid == $list->id ? 'selected' : '' }}> {{ $list->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单图标</label>
                <div class="layui-input-block">
                    <input type="text" name="icon" placeholder="请输入菜单图标"  class="layui-input" value="{{ old('icon', $menu->icon ) }}">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单URL</label>
                <div class="layui-input-block">
                    <input type="text" name="href"   placeholder="请输入菜单URL" class="layui-input" value="{{ old('href', $menu->href ) }}">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">target</label>
                <div class="layui-input-block">
                    <select name="target" lay-search>
                        <option value="_self" {{ $menu->target == '_self' ? 'selected' : '' }}>_self</option>
                        <option value="_blank" {{ $menu->target == '_blank' ? 'selected' : '' }}>_blank</option>
                        <option value="_parent" {{ $menu->target == '_parent' ? 'selected' : '' }}>_parent</option>
                        <option value="_top" {{ $menu->target == '_top' ? 'selected' : '' }}>_top</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-block">
                    <input type="text" name="order"  placeholder="排序" class="layui-input" value="{{ old('order', $menu->order ) }}">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-block">
                    <input type="checkbox" name="status" lay-skin="switch" lay-text="启用|停用" value="1"  {{ $menu->status === 1 ? 'checked' : '' }}>
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
        @if($menu->id)
           var url = '{{ route('menu.update', $menu->id) }}';
         @else
           var url = '{{ route('menu.store') }}';
         @endif
        //监听提交
        form.on('submit(demo1)', function (data) {
            $.ajax({
                type: 'POST',
                url: url,
                data: data.field,
                success: function (res) {
                    if (res.code === 200) {
                        layer.msg(res.msg, function () {
                            parent.location.reload();
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
