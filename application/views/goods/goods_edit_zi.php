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
			<?php if (!empty($fid)){ ?>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 30%;">
					</label>
					<div class="layui-input-inline" style="width: 300px;">
						<span style="color: red;font-size: 16px;font-weight: bold;">温馨提示：</span><br><span class="x-red">※以下内容翻译由科大讯飞翻译提供。</span>
					</div>
				</div>
			<?php } ?>
			<?php if (empty($fid)){ ?>
				<div class="layui-form-item" style="display:none;">
					<label for="L_pass" class="layui-form-label" style="width: 30%;">
						<span class="x-red">*</span>状态
					</label>
					<div class="layui-input-inline" style="width: 500px;">
						<input type="radio" name="zhuangtai" lay-skin="primary" title="显示"
							   value="1" <?php echo $zhuangtai == 1 ? 'checked' : '' ?>>
						<input type="radio" name="zhuangtai" lay-skin="primary" title="不显示"
							   value="2" <?php echo $zhuangtai == 2 ? 'checked' : '' ?>>
						<input type="radio" name="zhuangtai" lay-skin="primary" title="申请中"
							   value="0" <?php echo $zhuangtai == 0 ? 'checked' : '' ?>>
					</div>
				</div>
			<?php } ?>
            <input type="hidden" id="fid" name="fid" value="<?php echo $fid ?>">
			<input type="hidden" id="goflg" name="goflg" value="0">
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>头像
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<button type="button" class="layui-btn" id="upload1">上传图片</button>
					<div class="layui-upload-list">
						<input type="hidden" name="touxiang" value="<?php echo $touxiang ?>" id="touxiang" lay-verify="touxiang" autocomplete="off"
							   class="layui-input">
						<img class="layui-upload-img" src="<?php echo $touxiang ?>" style="width: 100px;height: 100px;" id="touxiangtouxiang" name="touxiangtouxiang">
						<p id="demoText"></p>
					</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>封面图
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<button type="button" class="layui-btn" id="upload2">上传图片</button>
					<div class="layui-upload-list">
						<input type="hidden" name="nonglogo" value="<?php echo $nonglogo ?>" id="nonglogo" lay-verify="nonglogo" autocomplete="off"
							   class="layui-input">
						<img class="layui-upload-img" src="<?php echo $nonglogo ?>" style="width: 100px;height: 100px;" id="nonglogononglogo" name="nonglogononglogo">
						<p id="demoText"></p>
					</div>
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>性别
				</label>
				<div class="layui-input-inline" style="width: 500px;">
					<input type="radio" name="xingbie" lay-skin="primary" title="男"
						   value="1" <?php echo $xingbie == 1 ? 'checked' : '' ?>>
					<input type="radio" name="xingbie" lay-skin="primary" title="女"
						   value="2" <?php echo $xingbie == 2 ? 'checked' : '' ?>>
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>电话
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="number" id="dianhua" name="dianhua" lay-verify="dianhua"
						   autocomplete="off" value="<?php echo $dianhua ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>邮件
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="youxiang" name="youxiang" lay-verify="youxiang"
						   autocomplete="off" value="<?php echo $youxiang ?>" class="layui-input">
				</div>
			</div>

            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label" style="width: 30%;">
                    <span class="x-red">*</span>名称
                </label>
                <div class="layui-input-inline" style="width: 300px;">
                    <input type="text" id="xingming" name="xingming" lay-verify="xingming"
                           autocomplete="off" value="<?php echo $xingming ?>" class="layui-input">
                </div>
            </div>

			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>大洲
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="zhou" name="zhou" lay-verify="zhou"
						   autocomplete="off" value="<?php echo $zhou ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>国家
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="guojia" name="guojia" lay-verify="guojia"
						   autocomplete="off" value="<?php echo $guojia ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>城市
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="chengshi" name="chengshi" lay-verify="chengshi"
						   autocomplete="off" value="<?php echo $chengshi ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>咖啡名
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="kafeiming" name="kafeiming" lay-verify="kafeiming"
						   autocomplete="off" value="<?php echo $kafeiming ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>采集地点
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="caijididian" name="caijididian" lay-verify="caijididian"
						   autocomplete="off" value="<?php echo $caijididian ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>详细地址
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="xiangxidizhi" name="xiangxidizhi" lay-verify="xiangxidizhi"
						   autocomplete="off" value="<?php echo $xiangxidizhi ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>种植面积
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="zhongzhimianji" name="zhongzhimianji" lay-verify="zhongzhimianji"
						   autocomplete="off" value="<?php echo $zhongzhimianji ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>处理方式
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="chulifangshi" name="chulifangshi" lay-verify="chulifangshi"
						   autocomplete="off" value="<?php echo $chulifangshi ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>处理特点
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="chulitedian" name="chulitedian" lay-verify="chulitedian"
						   autocomplete="off" value="<?php echo $chulitedian ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>红果数量
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="hongguoshuliang" name="hongguoshuliang" lay-verify="hongguoshuliang"
						   autocomplete="off" value="<?php echo $hongguoshuliang ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>海拔高度
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="haibagaodu" name="haibagaodu" lay-verify="haibagaodu"
						   autocomplete="off" value="<?php echo $haibagaodu ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>年产量
				</label>
				<div class="layui-input-inline" style="width: 300px;">
					<input type="text" id="niancanliang" name="niancanliang" lay-verify="niancanliang"
						   autocomplete="off" value="<?php echo $niancanliang ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>收货时间
				</label>
				<div class="layui-input-inline layui-show-xs-block" style="width: 300px;">
					<input type="text" class="layui-input" placeholder="收货时间" value="<?php echo $shouhuoshijian ?>" name="shouhuoshijian" id="shouhuoshijian">
				</div>
			</div>

            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label" style="width: 30%;">
                    <span class="x-red">*</span>简介(建议700文字以内)
                </label>
                <div class="layui-input-inline" style="width: 610px;">
                    <textarea id="jianjie" name="jianjie"  lay-verify="jianjie" class="layui-textarea"><?php echo $jianjie ?></textarea>
                </div>
            </div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>发展史(建议700文字以内)
				</label>
				<div class="layui-input-inline" style="width: 610px;">
					<textarea id="fazhanshi" name="fazhanshi"  lay-verify="fazhanshi" class="layui-textarea"><?php echo $fazhanshi ?></textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_pass" class="layui-form-label" style="width: 30%;">
					<span class="x-red">*</span>主要产品(建议700文字以内)
				</label>
				<div class="layui-input-inline" style="width: 610px;">
					<textarea id="zhuyaochanpin" name="zhuyaochanpin"  lay-verify="zhuyaochanpin" class="layui-textarea"><?php echo $zhuyaochanpin ?></textarea>
				</div>
			</div>
            <?php if (empty($fid)){ ?>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 30%;">
					</label>
					<div class="layui-input-inline" style="width: 300px;">
						<span style="color: red;font-size: 16px;font-weight: bold;">温馨提示：</span><br><span class="x-red">※如果需同步翻译，点击提交按钮之后请耐心等待!成功后会有弹窗提示!。</span>
					</div>
				</div>
			<?php } ?>
            <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
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
    layui.use('upload', function(){
        var $ = layui.jquery
            ,upload = layui.upload;

        //普通图片上传
        var uploadInst = upload.render({
            elem: '#upload1'
            ,url: '<?= RUN . '/upload/pushFIle' ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#touxiangtouxiang').attr('src', result); //图片链接（base64）
                    var img = document.getElementById("touxiangtouxiang");
                    img.style.display="block";
                });
            }
            ,done: function(res){
                if(res.code == 200){
                    $('#touxiang').val(res.src); //图片链接（base64）
                    return layer.msg('上传成功');
                }else {
                    return layer.msg('上传失败');
                }
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
		var uploadInst = upload.render({
			elem: '#upload2'
			,url: '<?= RUN . '/upload/pushFIle' ?>'
			,before: function(obj){
				//预读本地文件示例，不支持ie8
				obj.preview(function(index, file, result){
					$('#nonglogononglogo').attr('src', result); //图片链接（base64）
					var img = document.getElementById("nonglogononglogo");
					img.style.display="block";
				});
			}
			,done: function(res){
				if(res.code == 200){
					$('#nonglogo').val(res.src); //图片链接（base64）
					return layer.msg('上传成功');
				}else {
					return layer.msg('上传失败');
				}
			}
			,error: function(){
				//演示失败状态，并实现重传
				var demoText = $('#demoText');
				demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
				demoText.find('.demo-reload').on('click', function(){
					uploadInst.upload();
				});
			}
		});
        //多图片上传
        upload.render({
            elem: '#uploads'
            ,url: '<?= RUN . '/upload/pushFIle' ?>'
            ,multiple: true
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                var timestamp = (new Date()).valueOf();
                obj.preview(function(index, file, result){
                    $('#imgnew').append('<img id="avaterimg'+ timestamp +'" style="width:100px;height:100px;" src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img"><p id="avaterimgp'+ timestamp +'" style="margin-top: -70px;margin-left: -43px;" class="layui-btn layui-btn-xs layui-btn-danger demo-delete" onclick="jusp('+ timestamp +')">删除</p>')
                });
            }
            ,done: function(res){
                //上传完毕
                if(res.code == 200){
                    var timestamp = (new Date()).valueOf();
                    $('#newinp').append('<input type="hidden" name="avater[]" id="avater'+ timestamp +'" value="'+ res.src +'">')
                    return layer.msg('上传成功');
                }else {
                    return layer.msg('上传失败');
                }
            }
        });
    });
    function jusp(index) {
        $("#avater"+index).remove();
        $("#avaterimg"+index).remove();
        $("#avaterimgp"+index).remove();
    }
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

            $("#tab").validate({
                submitHandler: function (form) {
                    var fid = $("#fid").val();
                    if(fid > 0){
                        $.ajax({
							cache: true,
							type: "POST",
							url: "<?= RUN . '/goods/goods_save_edit' ?>",
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
                    }else{
                        layer.confirm('原语言内容已修改是否同步翻译内容？', {
								title: '温馨提示',
								btn: ['是', '否']
								// 按钮
							},
							function (index) {
								$("#goflg").val(1);
								$.ajax({
									cache: true,
									type: "POST",
									url: "<?= RUN . '/goods/goods_save_edit' ?>",
									data: $('#tab').serialize(),
									async: false,
									error: function (request) {
										alert("error");
									},
									success: function (data) {
										var data = eval("(" + data + ")");
										if (data.success) {
											setTimeout(function(){
                        					   layer.msg(data.msg);
                        					},1000);
											setTimeout(function () {
												cancel();
											},2000);
										} else {
										    setTimeout(function(){
                        					   layer.msg(data.msg);
                        					},1000);
										}
									}
								});
							},
							function (index) {
								$("#goflg").val(0);
								$.ajax({
									cache: true,
									type: "POST",
									url: "<?= RUN . '/goods/goods_save_edit' ?>",
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
					    );
                    }
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
