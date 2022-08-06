<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="renderer" content="webkit" />
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" /> -->
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template" />
	<title>咖啡网站</title>
	<meta name="keywords"/>
	<meta name="description"/>
	<link rel="stylesheet" type="text/css" href="<?= STA ?>/css/web/StyleSheet.css" />
	<link rel="stylesheet" type="text/css" href="<?= STA ?>/css/web/index.css" />
	<link rel="stylesheet" type="text/css" href="<?= STA ?>/css/web/swiper-bundle.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= STA ?>/css/web/animate.min.css" />

	<script src="<?= STA ?>/js/web/jquery-1.11.1.min.js"></script>
	<script src="http://www.jq22.com/jquery/1.8.3/jquery.min.js"></script>

	<script src="<?= STA ?>/js/web/index.js"></script>

	<script type="text/javascript" src="<?= STA ?>/js/web/jquery.date_input.pack.js"></script>

	<!--[if IE 6]>
	<script src="<?= STA ?>/js/web/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
	<script type="text/javascript">
		DD_belatedPNG.fix('*');
	</script>
	<![endif]-->
	<script type="text/javascript">
		$(function () {
			$('.date_picker').date_input();
		})
	</script>

	<script type="text/javascript" src="<?= STA ?>/lib/layui/layui.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?= STA ?>/js/xadmin.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/upload/jquery_form.js"></script>

</head>

<body>
<div class="max">
	<div class="mhead">
		<!--pc--><div class="loginnew loginnew1">
    		<?php if (empty($ltype)){ ?>
    			<a href="<?= RUN . '/webviews/memberkafei?ltype=2' ?>" class="search_login">
    				<span>英文</span>
    			</a>
    		<?php }else{ ?>
    			<a href="<?= RUN . '/webviews/memberkafei?ltype=1' ?>" class="search_login">
    				<span>Chinese</span>
    			</a>
    		<?php } ?>
    	</div>
		<div class="idea_business_top">
		    
			<a href="<?= RUN . '/' ?>">
				<img src="<?= STA ?>/images/web/logo2.png" alt="" />
			</a>
			<span class="register_en"><?php echo $yuyan2['text1'] ?></span>
			<span class="register_zh"></span>
<!--			<div class="search_box">-->
<!--				<a href="idea_farming.html" class="search_box_link">SOURCE AREA</a>-->
<!--				<span class="search_box_dian"></span>-->
<!--				<a href="idea_business.html" class="search_box_link search_box_on">BAKESHOP</a>-->
<!--			</div>-->
		</div>
		<!---sp-->
		<div class="spidea_business_top">
		    <a href="<?= RUN . '/' ?>">
				<img src="<?= STA ?>/images/web/logo2.png" alt="" />
			</a>
			<div class="search_box">
				<a href="<?= RUN . '/webviews/searchex_xiaolist?stype=1' ?>" class="search_box_link search_box_on"><?php echo $yuyan1['text3'] ?></a>
				<span class="search_box_dian"></span>
				<a href="<?= RUN . '/webviews/searchex_yuanlist?stype=2' ?>" class="search_box_link"><?php echo $yuyan1['text4'] ?></a>
			</div>
			<div class="search_form">
				<input style="color: #fff;" type="text" name="guojia" id="guojia" placeholder="<?php echo $yuyan1['text5'] ?>" />
				<button class="search_form_btu" onclick="guojia()"><?php echo $yuyan1['text6'] ?></button>
			</div>
		</div>
	</div>

	<div class="mcenter">
		<div class="idea_farming_center">
			<div class="inner">
				<div class="idea_farming_section">
					<div class="idea_farming_title">
						<img src="<?= STA ?>/images/web/ico1.png" alt="" />
						<span><?php echo $yuyan2['text6'] ?></span>
					</div>
					<div class="idea_farming_block">
						<div class="idea_farming_area idea_farming_area1">
							<span class="idea_farming_name"><?php echo $yuyan2['text7'] ?>：<font>*</font></span>
							<!--pc-->
							<div class="idea_farming_box">
								<div class="idea_farming_input" id="upload1">
									<input type="hidden" name="avater" id="avater" />
									<img src="<?= STA ?>/images/web/photo1.png" id="avaterimg" name="avaterimg" />
								</div>
<!--								<span>请上传您的靓照<font>*</font></span>-->
							</div>
							<!--sp-->
							<div class="spidea_farming_input">
								<input type="file" name="" id="" />
								<img src="<?= STA ?>/images/web/header2.png" alt="" />
							</div>
						</div>
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text8'] ?>：</span>
							<div class="idea_farming_info idea_farming_border">
								<img src="<?= STA ?>/images/web/ico2.png" alt="" />
								<input type="text" name="mingcheng" id="mingcheng" placeholder="<?php echo $yuyan2['text8'] ?>" />
							</div>
						</div>
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text9'] ?>：</span>
							<div class="idea_farming_info idea_farming_border">
								<img src="<?= STA ?>/images/web/ico3.png" alt="" />
								<input type="text" name="dianhua" id="dianhua" placeholder="<?php echo $yuyan2['text9'] ?>" />
							</div>
						</div>
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text10'] ?>：</span>
							<div class="idea_farming_info idea_farming_border">
								<img src="<?= STA ?>/images/web/ico4.png" alt="" />
								<input type="text" name="youxiang" id="youxiang" placeholder="<?php echo $yuyan2['text10'] ?>" />
							</div>
						</div>
					</div>
					<div class="idea_farming_title">
						<img src="<?= STA ?>/images/web/ico1.png" alt="" />
						<span><?php echo $yuyan2['text11'] ?></span>
					</div>
					<div class="idea_farming_block">
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text12'] ?>：</span>
							<div class="idea_farming_info idea_farming_info1" id="box">
								<select class="layui-form-label" id="form1" name="zhou">
									<option>大洲</option>
								</select>
								<select class="layui-form-label" id="form2" name="guojia">
									<option>国家</option>
								</select>
								<select class="layui-form-label" id="form3" name="chengshi">
									<option>城市</option>
								</select>
							</div>
						</div>
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text13'] ?>：</span>
							<div class="idea_farming_info idea_farming_border">
								<img src="<?= STA ?>/images/web/ico5.png" alt="" />
								<input type="text" name="leixing" id="leixing" placeholder="<?php echo $yuyan2['text13'] ?>" />
							</div>
						</div>
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text14'] ?>：</span>
							<div class="idea_farming_info idea_farming_border">
								<img src="<?= STA ?>/images/web/ico6.png" alt="" />
								<input type="text" name="xiangxidizhi" id="xiangxidizhi" placeholder="<?php echo $yuyan2['text14'] ?>" />
							</div>
						</div>
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text15'] ?>：</span>
<!--							<div class="idea_farming_info idea_farming_border">-->
<!--								<img src="--><?//= STA ?><!--/images/web/ico7.png" alt="" />-->
<!--								<select name="" id="">-->
<!--									<option value="">请选择烘焙机型号</option>-->
<!--									<option value="">请选择烘焙机型号</option>-->
<!--									<option value="">请选择烘焙机型号</option>-->
<!--								</select>-->
<!--							</div>-->
							<div class="idea_farming_info idea_farming_border">
								<img src="<?= STA ?>/images/web/ico7.png" alt="" />
								<input type="text" name="xinghao" id="xinghao" placeholder="<?php echo $yuyan2['text15'] ?>" />
							</div>
						</div>
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text16'] ?>：</span>
<!--							<div class="idea_farming_two">-->
<!--								<div class="idea_farming_info idea_farming_border">-->
<!--									<img src="--><?//= STA ?><!--/images/web/ico5.png" alt="" />-->
<!--									<select name="" id="">-->
<!--										<option value="">请选择       周/月</option>-->
<!--										<option value="">请选择       周/月</option>-->
<!--										<option value="">请选择       周/月</option>-->
<!--									</select>-->
<!--								</div>-->
<!--								<div class="idea_farming_info idea_farming_border">-->
<!--									<img src="--><?//= STA ?><!--/images/web/ico5.png" alt="" />-->
<!--									<select name="" id="">-->
<!--										<option value="">采购量选择</option>-->
<!--										<option value="">采购量选择</option>-->
<!--										<option value="">采购量选择</option>-->
<!--									</select>-->
<!--								</div>-->
<!--							</div>-->
							<div class="idea_farming_info idea_farming_border">
								<img src="<?= STA ?>/images/web/ico7.png" alt="" />
								<input type="text" name="caigouliang" id="caigouliang" placeholder="<?php echo $yuyan2['text16'] ?>" />
							</div>
						</div>
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text17'] ?>：</span>
							<div class="idea_farming_info idea_farming_border">
								<img src="<?= STA ?>/images/web/ico6.png" alt="" />
								<input type="text" name="caigoushijian" id="caigoushijian" placeholder="<?php echo $yuyan2['text17'] ?>" />
							</div>
						</div>
						<div class="idea_farming_area">
							<span class="idea_farming_name"><?php echo $yuyan2['text18'] ?>：</span>
<!--							<div class="idea_farming_info idea_farming_border">-->
<!--								<img src="--><?//= STA ?><!--/images/web/ico8.png" alt="" />-->
<!--								<select name="" id="">-->
<!--									<option value="">请选择处理特点</option>-->
<!--									<option value="">请选择处理特点</option>-->
<!--									<option value="">请选择处理特点</option>-->
<!--								</select>-->
<!--							</div>-->
							<div class="idea_farming_info idea_farming_border">
								<img src="<?= STA ?>/images/web/ico8.png" alt="" />
								<input type="text" name="chulitedian" id="chulitedian" placeholder="<?php echo $yuyan2['text18'] ?>" />
							</div>
						</div>
					</div>
					<div class="idea_farming_title">
						<img src="<?= STA ?>/images/web/ico1.png" alt="" />
						<span><?php echo $yuyan2['text19'] ?></span>
					</div>
					<div class="idea_farming_block">
						<div class="idea_farming_kuai">
							<div class="idea_farming_box">
								<div class="idea_farming_input" id="upload2">
									<input type="hidden" name="dianlogo" id="dianlogo" />
									<img src="<?= STA ?>/images/web/photo2.png" id="dianlogoimg" name="dianlogoimg" />
								</div>
							</div>
						</div>
					</div>
					<button class="idea_farming_btu" onclick="insertmenmber()"><?php echo $yuyan2['text20'] ?></button>
				</div>
			</div>
		</div>
		
<!--		<span class="idea_farming_small">京公网安备11000002000001号</span>-->
	</div>

	<div class="mfoot">

	</div>


	<script src="<?= STA ?>/js/web/data.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?= STA ?>/js/web/myjs.js" type="text/javascript" charset="utf-8"></script>
</div><!--  / .max-->
<script>
	function guojia() {
		window.location.href='/webviews/searchex_xiaolist?guojia='+$('#guojia').val();
	}
</script>
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
					$('#avaterimg').attr('src', result); //图片链接（base64）
				});
			}
			,done: function(res){
				if(res.code == 200){
					$('#avater').val(res.src); //图片链接（base64）
					return layer.msg(res.msg);
				}else {
					return layer.msg(res.msg);
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

		//普通图片上传
		var uploadInst = upload.render({
			elem: '#upload2'
			,url: '<?= RUN . '/upload/pushFIle' ?>'
			,before: function(obj){
				//预读本地文件示例，不支持ie8
				obj.preview(function(index, file, result){
					$('#dianlogoimg').attr('src', result); //图片链接（base64）
				});
			}
			,done: function(res){
				if(res.code == 200){
					$('#dianlogo').val(res.src); //图片链接（base64）
					return layer.msg(res.msg);
				}else {
					return layer.msg(res.msg);
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
			elem: '#test2'
			,url: '/upload/'
			,multiple: true
			,before: function(obj){
				//预读本地文件示例，不支持ie8
				obj.preview(function(index, file, result){
					$('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
				});
			}
			,done: function(res){
				//上传完毕
			}
		});

		//指定允许上传的文件类型
		upload.render({
			elem: '#test3'
			,url: '/upload/'
			,accept: 'file' //普通文件
			,done: function(res){
				console.log(res)
			}
		});
		upload.render({ //允许上传的文件后缀
			elem: '#test4'
			,url: '/upload/'
			,accept: 'file' //普通文件
			,exts: 'zip|rar|7z' //只允许上传压缩文件
			,done: function(res){
				console.log(res)
			}
		});
		upload.render({
			elem: '#test5'
			,url: '/upload/'
			,accept: 'video' //视频
			,done: function(res){
				console.log(res)
			}
		});
		upload.render({
			elem: '#test6'
			,url: '/upload/'
			,accept: 'audio' //音频
			,done: function(res){
				console.log(res)
			}
		});

		//设定文件大小限制
		upload.render({
			elem: '#test7'
			,url: '/upload/'
			,size: 60 //限制文件大小，单位 KB
			,done: function(res){
				console.log(res)
			}
		});

		//同时绑定多个元素，并将属性设定在元素上
		upload.render({
			elem: '.demoMore'
			,before: function(){
				layer.tips('接口地址：'+ this.url, this.item, {tips: 1});
			}
			,done: function(res, index, upload){
				var item = this.item;
				console.log(item); //获取当前触发上传的元素，layui 2.1.0 新增
			}
		})

		//选完文件后不自动上传
		upload.render({
			elem: '#test8'
			,url: '/upload/'
			,auto: false
			//,multiple: true
			,bindAction: '#test9'
			,done: function(res){
				console.log(res)
			}
		});

		//拖拽上传
		upload.render({
			elem: '#test10'
			,url: '/upload/'
			,done: function(res){
				console.log(res)
			}
		});

		//多文件列表示例
		var demoListView = $('#demoList')
				,uploadListIns = upload.render({
			elem: '#testList'
			,url: '/upload/'
			,accept: 'file'
			,multiple: true
			,auto: false
			,bindAction: '#testListAction'
			,choose: function(obj){
				var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
				//读取本地文件
				obj.preview(function(index, file, result){
					var tr = $(['<tr id="upload-'+ index +'">'
						,'<td>'+ file.name +'</td>'
						,'<td>'+ (file.size/1014).toFixed(1) +'kb</td>'
						,'<td>等待上传</td>'
						,'<td>'
						,'<button class="layui-btn layui-btn-xs demo-reload layui-hide">重传</button>'
						,'<button class="layui-btn layui-btn-xs layui-btn-danger demo-delete">删除</button>'
						,'</td>'
						,'</tr>'].join(''));

					//单个重传
					tr.find('.demo-reload').on('click', function(){
						obj.upload(index, file);
					});

					//删除
					tr.find('.demo-delete').on('click', function(){
						delete files[index]; //删除对应的文件
						tr.remove();
						uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
					});

					demoListView.append(tr);
				});
			}
			,done: function(res, index, upload){
				if(res.code == 0){ //上传成功
					var tr = demoListView.find('tr#upload-'+ index)
							,tds = tr.children();
					tds.eq(2).html('<span style="color: #5FB878;">上传成功</span>');
					tds.eq(3).html(''); //清空操作
					return delete this.files[index]; //删除文件队列已经上传成功的文件
				}
				this.error(index, upload);
			}
			,error: function(index, upload){
				var tr = demoListView.find('tr#upload-'+ index)
						,tds = tr.children();
				tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
				tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
			}
		});

		//绑定原始文件域
		upload.render({
			elem: '#test20'
			,url: '/upload/'
			,done: function(res){
				console.log(res)
			}
		});

	});
</script>
<script>
	function insertmenmber() {
		$.ajax({
			cache: true,
			type: "POST",
			url: "<?= RUN . '/webviews/insertkafeidian' ?>",
			data: {
				touxiang:$('#avater').val(),
				mingcheng:$('#mingcheng').val(),
				dianhua:$('#dianhua').val(),
				youxiang:$('#youxiang').val(),
				zhou:$("#form1 option:selected").text(),
				guojia:$("#form2 option:selected").text(),
				chengshi:$("#form3 option:selected").text(),
				leixing:$('#leixing').val(),
				xiangxidizhi:$('#xiangxidizhi').val(),
				xinghao:$('#xinghao').val(),
				caigouliang:$('#caigouliang').val(),
				caigoushijian:$('#caigoushijian').val(),
				chulitedian:$('#chulitedian').val(),
				dianlogo:$('#dianlogo').val()
			},
			async: false,
			error: function (request) {
				alert("error");
			},
			success: function (data) {
				var data = eval("(" + data + ")");
				if (data.result){
					layer.msg(data.msg);
					setTimeout(function(){
						window.location.href='/';
					},1000);
				}else {
					layer.msg(data.msg);
				}
			}
		});
	}
</script>
</body>

</html>
