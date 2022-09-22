
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
		<div class="register_yuan">
			<div class="register_section">
				<a href="<?= RUN . '/' ?>">
					<img src="<?= STA ?>/images/web/logo2.png" alt="" />
				</a>
				<span class="register_en"><?php echo $yuyan1['text7'] ?></span>
				<span class="register_zh"></span>
				<div class="register_area">
					<a href="<?= RUN . '/webviews/yuanzhuce' ?>" class="register_link register_on"><?php echo $yuyan1['text4'] ?></a>
					<span class="register_dian"></span>
					<a href="<?= RUN . '/webviews/xiaozhuce' ?>" class="register_link register_on"><?php echo $yuyan1['text3'] ?></a>
				</div>
			</div>
			<div class="loginnew">
    		<?php if (empty($ltype)){ ?>
    			<a href="<?= RUN . '/webviews/search?ltype=2' ?>" class="search_login" style="margin-top: 60px">
    				<span>English</span>
    			</a>
    		<?php }else{ ?>
    			<a href="<?= RUN . '/webviews/search?ltype=1' ?>" class="search_login" style="margin-top: 60px">
    				<span>中文</span>
    			</a>
    		<?php } ?>
    
    		<?php if (empty($youxiang)){ ?>
    			<!--未登录-->
    			<a href="<?= RUN . '/webviews/search' ?>" class="search_login">
    				<img src="<?= STA ?>/images/web/ico12.png" alt="" />
    				<span><?php echo $yuyan1['text1'] ?>/<?php echo $yuyan1['text2'] ?></span>
    			</a>
    		<?php }else{ ?>
    			<!--登录-->
    			<div class="search_login">
    				<img src="<?= STA ?>/images/web/ico12.png" alt="" />
    				<span><?php echo $youxiang ?></span>
    			</div>
    			<a href="<?= RUN . '/webviews/index?ltype=3' ?>" class="search_login" style="margin-top: 120px">
    				<?php if (empty($ltype)){ ?>
    					<span>登出</span>
    				<?php }else{ ?>
    					<span>Logout</span>
    				<?php } ?>
    			</a>
    		<?php } ?>
    	</div>
		</div>
	</div>

	<div class="mfoot">

	</div>


</div><!--  / .max-->


</body>

</html>
