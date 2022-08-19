
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
	<script type="text/javascript" src="<?= STA ?>/js/web/height_line.js"></script>
	<script src="<?= STA ?>/js/web/index.js"></script>

	<!--[if IE 6]>
	<script src="<?= STA ?>/js/web/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
	<script type="text/javascript">
		DD_belatedPNG.fix('*');
	</script>
	<![endif]-->


	<script type="text/javascript" src="<?= STA ?>/lib/layui/layui.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?= STA ?>/js/xadmin.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/upload/jquery_form.js"></script>

</head>

<body>
<div class="max">
	<div class="mhead">

	</div>

	<div class="mcenter">
		<div class="register_yuanpassword">
			<div class="register_section">
				<a href="<?= RUN . '/' ?>">
					<img src="<?= STA ?>/images/web/logo2.png" alt="" />
				</a>
				<span class="register_en"><?php echo $yuyan2['text1'] ?></span>
				<span class="register_zh"></span>
				<span class="register_title"><?php echo $yuyan4['text1'] ?></span>
				<div action="" class="register_form layui-form">
					<div class="register_box">
						<img src="<?= STA ?>/images/web/ico14.png" alt=""/>
						<span style="color: red;margin-right: 5px;">*</span>
						<input type="text" maxlength="30" id="youxiang" name="youxiang" lay-verify="youxiang" placeholder="<?php echo $yuyan4['text2'] ?>" />
					</div>
					<div class="register_box">
						<img src="<?= STA ?>/images/web/ico13.png" alt=""/>
						<span style="color: red;margin-right: 5px;">*</span>
						<input type="text" maxlength="30" id="shoujihao" name="shoujihao" lay-verify="shoujihao" placeholder="<?php echo $yuyan4['text9'] ?>" />
					</div>
					<div class="register_box">
						<img style="width: 25px;" src="<?= STA ?>/images/web/mail-open.png" alt=""/>
						<span style="color: red;margin-right: 5px;">*</span>
						<div class="register_yan">
							<input type="text" maxlength="30" id="yanzhengma" name="yanzhengma" lay-verify="yanzhengma" />
							<button class="register_yan_btu" onclick="sendyanzhengma()"><?php echo $yuyan4['text8'] ?></button>
						</div>
					</div>
					<div class="register_box">
						<img style="width: 25px;"  src="<?= STA ?>/images/web/edit-name.png" alt=""/>
						<span style="color: red;margin-right: 5px;">*</span>
						<input type="text" maxlength="30" id="xing" name="xing" lay-verify="xing" placeholder="<?php echo $yuyan4['text10'] ?>" />
					</div>
					<div class="register_box">
						<img style="width: 25px;"  src="<?= STA ?>/images/web/edit-name.png" alt=""/>
						<span style="color: red;margin-right: 5px;">*</span>
						<input type="text" maxlength="30" id="ming" name="ming" lay-verify="ming" placeholder="<?php echo $yuyan4['text11'] ?>" />
					</div>
					<div class="register_box">
						<img style="width: 25px;" src="<?= STA ?>/images/web/building-one.png" alt=""/>
						<input type="text" maxlength="30" id="gsming" name="gsming" lay-verify="gsming" placeholder="<?php echo $yuyan4['text12'] ?>" />
					</div>
					<div class="register_box">
						<img style="width: 25px;" src="<?= STA ?>/images/web/building-one.png" alt=""/>
						<input type="text" maxlength="30" id="gsdizhi" name="gsdizhi" lay-verify="gsdizhi" placeholder="<?php echo $yuyan4['text13'] ?>" />
					</div>
					<div class="register_box">
						<img style="width: 25px;" src="<?= STA ?>/images/web/building-one.png" alt=""/>
						<input type="text" maxlength="30" id="gsjianjie" name="gsjianjie" lay-verify="gsjianjie" placeholder="<?php echo $yuyan4['text14'] ?>" />
					</div>
					<div class="register_box">
						<img src="<?= STA ?>/images/web/ico15.png" alt=""/>
						<span style="color: red;margin-right: 5px;">*</span>
						<input type="password" id="mima" name="mima" lay-verify="mima" placeholder="<?php echo $yuyan4['text3'] ?>" />
					</div>
					<div class="register_box">
						<img src="<?= STA ?>/images/web/ico15.png" alt=""/>
						<span style="color: red;margin-right: 5px;">*</span>
						<input type="password" id="querenmima" name="querenmima" lay-verify="querenmima" placeholder="<?php echo $yuyan4['text4'] ?>" />
					</div>
					<button class="register_btu" onclick="insertmenmber()"><?php echo $yuyan4['text5'] ?></button>
					<a href="<?= RUN . '/webviews/yuanzhucelogin' ?>" class="register__login"><?php echo $yuyan4['text6'] ?></a>
				</div>
			</div>
			<div class="loginnew">
    		<?php if (empty($ltype)){ ?>
    			<a href="<?= RUN . '/webviews/yuanzhuce?ltype=2' ?>" class="search_login">
    				<span>英文</span>
    			</a>
    		<?php }else{ ?>
    			<a href="<?= RUN . '/webviews/yuanzhuce?ltype=1' ?>" class="search_login">
    				<span>Chinese</span>
    			</a>
    		<?php } ?>

    	</div>
		</div>
	</div>

	<div class="mfoot">

	</div>


</div><!--  / .max-->

<script>
	function sendyanzhengma() {
		$.ajax({
			cache: true,
			type: "POST",
			url: "<?= RUN . '/webviews/sendemail' ?>",
			data: {email:$('#youxiang').val(),leixing:2},
			async: false,
			error: function (request) {
				alert("error");
			},
			success: function (data) {
				var data = eval("(" + data + ")");
				layer.msg(data.msg);
			}
		});
	}

	function insertmenmber() {
		$.ajax({
			cache: true,
			type: "POST",
			url: "<?= RUN . '/webviews/insertmember1' ?>",
			data: {email:$('#youxiang').val(),yanzhengma:$('#yanzhengma').val(),mima:$('#mima').val(),querenmima:$('#querenmima').val(),shoujihao:$('#shoujihao').val(),xing:$('#xing').val(),ming:$('#ming').val(),gsming:$('#gsming').val(),gsdizhi:$('#gsdizhi').val(),gsjianjie:$('#gsjianjie').val()},
			async: false,
			error: function (request) {
				alert("error");
			},
			success: function (data) {
				var data = eval("(" + data + ")");
				if (data.result){
					layer.msg(data.msg);
					setTimeout(function(){
						window.location.href='/webviews/yuanzhucelogin';
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
