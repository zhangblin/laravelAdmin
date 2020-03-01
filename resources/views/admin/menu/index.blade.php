<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.static._header")
    <style>
        .layui-btn:not(.layui-btn-lg ):not(.layui-btn-sm):not(.layui-btn-xs) {
            height: 34px;
            line-height: 34px;
            padding: 0 8px;
        }
    </style>
</head>
<body>
<div class="layuimini-container">
    <div class="layuimini-main">
        <div>
            <div class="layui-btn-group">
                <button class="layui-btn" id="btn-add">新增菜单</button>
                <button class="layui-btn" id="btn-expand">全部展开</button>
                <button class="layui-btn" id="btn-fold">全部折叠</button>
            </div>
            <table id="munu-table" class="layui-table" lay-filter="munu-table"></table>
        </div>
    </div>
</div>
<!-- 操作列 -->
<script type="text/html" id="auth-state">
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="edit">修改</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="switchStatus">
    <input type="checkbox" name="status" value="@{{d.status}}" lay-skin="switch" lay-text="启用|停用" lay-filter="switchStatus" @{{ d.status== 1 ? 'checked' : '' }}>
</script>
@include("admin.static._footer")
<script>
    layui.use(['table', 'treetable'], function () {
        var $ = layui.jquery;
        var table = layui.table;
        var treetable = layui.treetable;
        var form = layui.form;
        // 渲染表格
        layer.load(2);
        treetable.render({
            treeColIndex: 1,
            treeSpid: 0,
            treeIdName: 'id',
            treePidName: 'pid',
            elem: '#munu-table',
            url: '{{ route("admin.menuList") }}',
            page: false,
            cols: [[
                {type: 'numbers'},
                {field: 'title', minWidth: 200, title: '权限名称'},
                {field: 'icon',width: 80,align: 'center', title: '图标',templet:function (d) {
                     return '<i class="'+d.icon+'"></i>';
                 }},
                {field: 'href', title: '菜单url'},
                {field: 'created_at', width: 180, align: 'center', title: '添加时间'},
                {field: 'created_at',width: 180,align: 'center',title: '开关',templet: '#switchStatus',unresize: true},
                {templet: '#auth-state', width: 120, align: 'center', title: '操作'}
            ]],
            done: function () {
                layer.closeAll('loading');
            }
        });
        $('#btn-add').click(function () {
            layer.open({
                type: 2
                , title: '新增菜单'
                , content: '{{ route("menu.create") }}'
                , area: ['600px', '470px']
                , shade: [0.8, '#393D49']
            });
        });
        $('#btn-expand').click(function () {
            treetable.expandAll('#munu-table');
        });

        $('#btn-fold').click(function () {
            treetable.foldAll('#munu-table');
        });

        //监听工具条
        table.on('tool(munu-table)', function (obj) {
            var data = obj.data;
            var layEvent = obj.event;

            if (layEvent === 'del') {
                layer.msg('删除' + data.id);
            } else if (layEvent === 'edit') {
                layer.msg('修改' + data.id);
            }
        });
        //监听状态操作
        form.on('switch(switchStatus)', function (obj) {
            layer.tips(this.id + ' ' + this.title + '：' + obj.elem.checked, obj.othis);
        });
    });
</script>
</body>
</html>
