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

</head>

<body>
<div class="max">
	<div class="mhead">

	</div>

	<div class="mcenter">
		<div class="search">
			<div class="search_section">

					<img src="<?= STA ?>/images/web/logo2.png" alt="" />
				<input type="hidden" name="user_flg" id="user_flg" value="<?php echo $user_flg ?>" />
				<div class="search_box">
					<a href="<?= RUN . '/webviews/searchex_xiaolist?stype=1' ?>" class="search_box_link search_box_on"><?php echo $yuyan1['text3'] ?></a>
					<span class="search_box_dian"></span>
					<a href="<?= RUN . '/webviews/searchex_yuanlist?stype=2' ?>" class="search_box_link"><?php echo $yuyan1['text4'] ?></a>
				</div>
				<div class="search_form">
					<input style="color: #fff;" type="text" name="guojia" id="guojia" placeholder="<?php echo $yuyan1['text5'] ?>" />
					<button class="search_form_btu" onclick="guojia()"><?php echo $yuyan1['text6'] ?></button>
				</div>
				<?php if (empty($youxiang)){ ?>
					<div class="spsearch">
						<a href="<?= RUN . '/webviews/search' ?>" class="spsearch_link"><?php echo $yuyan1['text1'] ?></a>
						<a href="<?= RUN . '/webviews/search' ?>" class="spsearch_link"><?php echo $yuyan1['text2'] ?></a>
					</div>
				<?php } ?>
				<div class="search_footer" style="margin-top: 50px;">
					<span class="search_footer_en"><?php echo $yuyan1['text7'] ?></span>
					<span class="search_footer_zh"></span>
				</div>
				<div class="loginnew">
    				<?php if (empty($ltype)){ ?>
    					<a href="<?= RUN . '/webviews/index?ltype=2' ?>" class="search_login" style="margin-top: 60px">
    						<span>English</span>
    					</a>
    				<?php }else{ ?>
    					<a href="<?= RUN . '/webviews/index?ltype=1' ?>" class="search_login" style="margin-top: 60px">
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
	</div>
	<div class="mfoot">

	</div>


</div><!--  / .max-->
<script>
	function guojia() {
		window.location.href='/webviews/searchex_xiaolist?guojia='+$('#guojia').val();
	}
</script>
<script>
	$(document).ready(function(){
		if ($('#user_flg').val() == 1){
			//编写代码
			window.location.href='/webviews/index';
		}
	});
</script>
</body>

</html>
