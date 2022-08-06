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
					<span class="x-red">*</span>农场名称
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text8" name="text8" lay-verify="text8"
						   autocomplete="off" value="<?php echo $text8 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>农户性别
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text9" name="text9" lay-verify="text9"
						   autocomplete="off" value="<?php echo $text9 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>农场电话
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text10" name="text10" lay-verify="text10"
						   autocomplete="off" value="<?php echo $text10 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>农场邮箱
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text11" name="text11" lay-verify="text11"
						   autocomplete="off" value="<?php echo $text11 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>农场信息
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text12" name="text12" lay-verify="text12"
						   autocomplete="off" value="<?php echo $text12 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>地区选择
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text13" name="text13" lay-verify="text12"
						   autocomplete="off" value="<?php echo $text13 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>咖啡名称
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text14" name="text14" lay-verify="text14"
						   autocomplete="off" value="<?php echo $text14 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>采集地点
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text15" name="text15" lay-verify="text15"
						   autocomplete="off" value="<?php echo $text15 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>详细地址
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text16" name="text16" lay-verify="text16"
						   autocomplete="off" value="<?php echo $text16 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>种植面积
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text17" name="text17" lay-verify="text17"
						   autocomplete="off" value="<?php echo $text17 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>处理方式
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text18" name="text18" lay-verify="text18"
						   autocomplete="off" value="<?php echo $text18 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>处理特点
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text19" name="text19" lay-verify="text19"
						   autocomplete="off" value="<?php echo $text19 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>红果数量
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text20" name="text20" lay-verify="text20"
						   autocomplete="off" value="<?php echo $text20 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>海拔高度
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text21" name="text21" lay-verify="text21"
						   autocomplete="off" value="<?php echo $text21 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>收货时间
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text22" name="text22" lay-verify="text22"
						   autocomplete="off" value="<?php echo $text22 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>年产量
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text23" name="text23" lay-verify="text23"
						   autocomplete="off" value="<?php echo $text23 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>农场封面图
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text24" name="text24" lay-verify="text24"
						   autocomplete="off" value="<?php echo $text24 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>完成内容提交
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text25" name="text25" lay-verify="text25"
						   autocomplete="off" value="<?php echo $text25 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>发展史
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text26" name="text26" lay-verify="text26"
						   autocomplete="off" value="<?php echo $text26 ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>主要产品
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="text27" name="text27" lay-verify="text27"
						   autocomplete="off" value="<?php echo $text27 ?>" class="layui-input">
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
                        url: "<?= RUN . '/goods/goods_save_edit_fanyi2' ?>",
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
