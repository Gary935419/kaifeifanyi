<!DOCTYPE html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>我的管理后台-咖啡</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
    <link rel="stylesheet" href="<?= STA ?>/css/font.css">
    <link rel="stylesheet" href="<?= STA ?>/css/xadmin.css">
    <script type="text/javascript" src="<?= STA ?>/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?= STA ?>/js/xadmin.js"></script>
    <script type="text/javascript" src="<?= STA ?>/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?= STA ?>/js/jquery.validate.js"></script>
    <script type="text/javascript" src="<?= STA ?>/js/upload/jquery_form.js"></script>
</head>
<body>
<div class="layui-fluid" style="padding-top: 66px;">
    <div class="layui-row">
        <form method="post" class="layui-form" action="" name="basic_validate" id="tab">
            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label" style="width: 30%;">
                    <span class="x-red">*</span>注册
                </label>
                <div class="layui-input-inline" style="width: 300px;">
                    <input type="text" id="text1" name="text1" lay-verify="text1"
                           autocomplete="off" value="<?php echo $text1 ?>" class="layui-input">
                </div>
            </div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>登录
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text2" name="text2" lay-verify="text2"
						   autocomplete="off" value="<?php echo $text2 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>消费地
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text3" name="text3" lay-verify="text3"
						   autocomplete="off" value="<?php echo $text3 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>原产地
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text4" name="text4" lay-verify="text4"
						   autocomplete="off" value="<?php echo $text4 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>请输入搜索信息
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text5" name="text5" lay-verify="text5"
						   autocomplete="off" value="<?php echo $text5 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>搜索
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text6" name="text6" lay-verify="text6"
						   autocomplete="off" value="<?php echo $text6 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>源野·一个关于咖啡生豆原产地与咖啡生豆消费市场的小众搜索引擎
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text7" name="text7" lay-verify="text7"
						   autocomplete="off" value="<?php echo $text7 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>全部
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text8" name="text8" lay-verify="text8"
						   autocomplete="off" value="<?php echo $text8 ?>" class="layui-input">
				</div>
			</div>
            <div class="layui-form-item">
                <label class="layui-form-label" style="width: 30%;">
                </label>
                <div class="layui-input-inline" style="width: 300px;">
                    <span class="x-red">※</span>请确认输入的数据是否正确。
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label" style="width: 30%;">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    确认提交
                </button>
            </div>
        </form>
    </div>
</div>
<script>
layui.use(['laydate', 'form'],
        function() {
            var laydate = layui.laydate;
            //执行一个laydate实例
            laydate.render({
                elem: '#shouhuoshijian' //指定元素
            });
        });
</script>
<script>
    layui.use(['form','layedit', 'layer'],
        function () {
            var form = layui.form,
                layer = layui.layer;
            var layedit = layui.layedit;
            layedit.set({
                uploadImage: {
                    url: '<?= RUN . '/upload/pushFIletextarea' ?>',
                    type: 'post',
                }
            });
            var editIndex1 = layedit.build('fazhanshi', {
                height: 300,
            });
			var editIndex2 = layedit.build('zhuyaochanpin', {
				height: 300,
			});
			var editIndex3 = layedit.build('jianjie', {
				height: 300,
			});
            //自定义验证规则
            form.verify({
                // gname: function (value) {
                //     if ($('#gname').val() == "") {
                //         return '请输入资讯名称。';
                //     }
                // },
				//
                // gsort: function (value) {
                //     if ($('#gsort').val() == "") {
                //         return '请输入资讯排序。';
                //     }
                // },
                // gimg: function (value) {
                //     if ($('#gimg').val() == "") {
                //         return '请上传资讯列表图。';
                //     }
                // },
                // gcontent: function(value) {
                //     // 将富文本编辑器的值同步到之前的textarea中
                //     layedit.sync(editIndex1);
                //     if ($('#gcontent').val() == "") {
                //         return '请输入资讯简介。';
                //     }
                // },
            });

            $("#tab").validate({
                submitHandler: function (form) {
                    $.ajax({
                        cache: true,
                        type: "POST",
                        url: "<?= RUN . '/goods/goods_save_edit_fanyi' ?>",
                        data: $('#tab').serialize(),
                        async: false,
                        error: function (request) {
                            alert("error");
                        },
                        success: function (data) {
                            var data = eval("(" + data + ")");
                            if (data.success) {
                                layer.msg(data.msg);
                                setTimeout(function () {
                                    cancel();
                                }, 2000);
                            } else {
                                layer.msg(data.msg);
                            }
                        }
                    });
                }
            });
        });

    function cancel() {
        //关闭当前frame
        xadmin.close();
    }
</script>
</body>
</html>
