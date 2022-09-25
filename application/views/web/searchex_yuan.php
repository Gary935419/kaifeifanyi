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
	<script type="text/javascript" src="<?= STA ?>/js/web/jquery.date_input.pack.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/web/height_line.js"></script>
	<script src="<?= STA ?>/js/web/index.js"></script>

	<!--[if IE 6]>
	<script src="<?= STA ?>/js/web/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
	<script type="text/javascript">
		DD_belatedPNG.fix('*');
	</script>
	<![endif]-->
	<script type="text/javascript">
		$(function () {
			$('.date_picker').date_input();
			$('.date_picker1').date_input();
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

	</div>

	<div class="mcenter">
		<div class="searchex_xiaoliat">
		    <div class="loginnew loginnew1">
    
    		<?php if (empty($youxiang)){ ?>
    			<!--未登录-->
    			<a href="<?= RUN . '/webviews/search' ?>" class="search_login">
    				<img src="<?= STA ?>/images/web/ico12.png" alt="" />
    				<span><?php echo $yuyan1['text1'] ?>/<?php echo $yuyan1['text2'] ?></span>
    			</a>
    		<?php }else{ ?>
    			<!--登录-->
    			
    			<div class="login_wei"> 
    			<div class="search_login">
    				<img src="<?= STA ?>/images/web/ico12.png" alt="" />
    				<span><?php echo $youxiang ?></span>
    			</div>
    			<a href="<?= RUN . '/webviews/index?ltype=3' ?>" class="search_login">
    				<?php if (empty($ltype)){ ?>
    					<span>登出</span>
    				<?php }else{ ?>
    					<span>Logout</span>
    				<?php } ?>
    			</a>
    			</div>
    		<?php } ?>
    		<?php if (empty($ltype)){ ?>
    			<a href="<?= RUN . '/webviews/searchex_yuan?ltype=2&id=' . $id ?>" class="search_login">
    				<span>English</span>
    			</a>
    		<?php }else{ ?>
    			<a href="<?= RUN . '/webviews/searchex_yuan?ltype=1&id=' . $id ?>" class="search_login">
    				<span>中文</span>
    			</a>
    		<?php } ?>
    	</div>
			<a href="<?= RUN . '/' ?>">
				<img src="<?= STA ?>/images/web/logo2.png" alt="" />
			</a>
			<span class="register_en"><?php echo $yuyan2['text1'] ?></span>
			<span class="register_zh"></span>
			<div class="search_box">
				<a href="<?= RUN . '/webviews/searchex_xiaolist?stype=1' ?>" class="search_box_link"><?php echo $yuyan1['text3'] ?></a>
				<span class="search_box_dian"></span>
				<a href="<?= RUN . '/webviews/searchex_yuanlist?stype=2' ?>" class="search_box_link search_box_on"><?php echo $yuyan1['text4'] ?></a>
			</div>
			<div class="searchex_form">
				<input type="text" name="guojia" id="guojia" placeholder="<?php echo $yuyan1['text5'] ?>" />
				<button class="search_form_btu" onclick="guojia()"><?php echo $yuyan1['text6'] ?></button>
			</div>
			<?php if (empty($youxiang)){ ?>
			<?php }else{ ?>
				<!--登录-->
				<div class="searchex_xiaoliat_login">
					<img src="<?= STA ?>/images/web/ico12.png" alt="">
					<span><?php echo $youxiang ?></span>
				</div>
			<?php } ?>
		</div>
		<div class="center">
			<div class="inner">
				<?php if (empty($ltype)){ ?>
					<div class="zi">
						<a style="font-weight: bold" href="<?= RUN . '/' ?>">首页&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>
						<a style="font-weight: bold" href="<?= RUN . '/webviews/searchex_yuanlist?stype=2' ?>">原产地&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>
						<a style="font-weight: bold" href="#">原产地详情&nbsp;&nbsp;&nbsp;</a>
					</div>
				<?php }else{ ?>
					<div class="zi">
						<a style="font-weight: bold" href="<?= RUN . '/' ?>">Top&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>
						<a style="font-weight: bold" href="<?= RUN . '/webviews/searchex_xiaolist?stype=1' ?>">ORIGINS&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>
						<a style="font-weight: bold" href="#">ORIGINS Details&nbsp;&nbsp;&nbsp;</a>
					</div>
				<?php } ?>
				<?php if (!empty($showflg)){ ?>
					<?php if (empty($ltype)){ ?>
						<span style="font-size: 16px;color: #af8750;display: inline-flex;" class="caption">※以下内容翻译由科大讯飞翻译提供。</span>
					<?php }else{ ?>
						<span style="font-size: 16px;color: #af8750;display: inline-flex;" class="caption">※The translation of the following is provided by iFLYTEK Translations.</span>
					<?php } ?>
				<?php } ?>
				<!--sp-->
				<div class="spsearchex_yuan_sp">
				   
					<div class="spsearchex_yuan_sp_block">
						<img src="<?php echo $data['nonglogo'] ?>" alt="" />
					
                        
						<span class="searchex_yuan_top_title"><?php echo $data['xingming'] ?></span>
						<span class="searchex_yuan_top_text"><?php echo $data['jianjie'] ?></span>
						<div class="spsearchex_yuan_sp_area">
							<span class="spsearchex_yuan_sp_name"><?php echo $yuyan3['text12'] ?></span>
							<div class="searchex_yuan_top_box">
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $guojia ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['guojia'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $chengshi ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['chengshi'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text10'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['dianhua'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text11'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['youxiang'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text14'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['kafeiming'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text15'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['caijididian'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text17'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['zhongzhimianji']  ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text23'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['niancanliang']  ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text16'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['xiangxidizhi']  ?>
								</div>
							</div>
							<div class="searchex_yuan_area" id="a1">
								<div class="searchex_yuan_center_title">
									<span class="searchex_yuan_name"><?php echo $yuyan3['text26'] ?></span>
									<span class="searchex_yuan_xian"></span>
								</div>
								<div class="searchex_yuan_box">
									<?php echo $data['fazhanshi'] ?>
								</div>
							</div>
							<div class="searchex_yuan_area" id="a2">
								<div class="searchex_yuan_center_title">
									<span class="searchex_yuan_name"><?php echo $yuyan3['text27'] ?></span>
									<span class="searchex_yuan_xian"></span>
								</div>
								<div class="searchex_yuan_box">
									<?php echo $data['zhuyaochanpin'] ?>
								</div>
							</div>
						</div>
					</div>
					<span class="spsearchex_yuan_sp_menu"><?php echo $mulu ?></span>
					<div class="spsearchex_yuan_sp_menumodel">
						<div class="spsearchex_yuan_sp_menusection">
							<span class="spsearchex_yuan_sp_menutitle"><?php echo $mulu ?></span>
							<div class="spsearchex_yuan_sp_menuarea">
								<a href="#a1" class="spsearchex_yuan_sp_menulink spsearchex_yuan_sp_menuon">1、<?php echo $yuyan3['text26'] ?></a>
								<a href="#a2" class="spsearchex_yuan_sp_menulink">2、<?php echo $yuyan3['text27'] ?></a>
							</div>
<!--							<span class="spsearchex_yuan_sp_menuclose">关闭</span>-->
						</div>
					</div>
				</div>
				<!--pc-->
				<div class="searchex_yuan_pc">
					<div class="searchex_yuan_top">
						<img src="<?php echo $data['nonglogo'] ?>" alt="" />
						<div class="searchex_yuan_top_area">
						
							<span class="searchex_yuan_top_title"><?php echo $data['xingming'] ?></span>
							<span class="searchex_yuan_top_text"><?php echo $data['jianjie'] ?></span>
							<div class="searchex_yuan_top_box">
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $guojia ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['guojia'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $chengshi ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['chengshi'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text10'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['dianhua'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text11'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['youxiang'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text14'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['kafeiming'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text15'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['caijididian'] ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text17'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['zhongzhimianji']  ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text23'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['niancanliang']  ?></span>
								</div>
								<div class="searchex_yuan_top_info">
									<span class="searchex_yuan_top_name"><?php echo $yuyan3['text16'] ?>：</span>
									<span class="searchex_yuan_top_caption"><?php echo $data['xiangxidizhi']  ?>
								</div>
							</div>
						</div>
					</div>
					<div class="searchex_yuan_center">
						<div class="searchex_yuan_block">
							<div class="searchex_yuan_area" id="a1">
								<div class="searchex_yuan_center_title">
									<span class="searchex_yuan_name"><?php echo $yuyan3['text26'] ?></span>
									<span class="searchex_yuan_xian"></span>
								</div>
								<div class="searchex_yuan_box">
									<?php echo $data['fazhanshi'] ?>
								</div>
							</div>
							<div class="searchex_yuan_area" id="a2">
								<div class="searchex_yuan_center_title">
									<span class="searchex_yuan_name"><?php echo $yuyan3['text27'] ?></span>
									<span class="searchex_yuan_xian"></span>
								</div>
								<div class="searchex_yuan_box">
									<?php echo $data['zhuyaochanpin'] ?>
								</div>
							</div>
						</div>
						<div class="searchex_yuan_fixed">
							<span class="searchex_yuan_fixed_name"><?php echo $mulu ?></span>
							<div class="searchex_yuan_fixed_box">
								<a href="#a1" class="searchex_yuan_fixed_link searchex_yuan_fixed_on">1、<?php echo $yuyan3['text26'] ?></a>
								<a href="#a2" class="searchex_yuan_fixed_link">2、<?php echo $yuyan3['text27'] ?></a>
							</div>
						</div>
					</div>
					<!--					<div class="searchex_yuan_footer">-->
					<!--						<span class="searchex_yuan_footer_title">搜索发现</span>-->
					<!--						<div class="searchex_yuan_footer_link">-->
					<!--							<a href="">非洲</a>-->
					<!--							<a href="">人工处理</a>-->
					<!--							<a href="">埃塞俄比亚</a>-->
					<!--							<a href="">机械加工</a>-->
					<!--						</div>-->
					<!--					</div>-->
<!--					<span class="small">京公网安备11000002000001号</span>-->
				</div>
               
			</div>
		</div>
	</div>

	<script>
		$(function(){
			$(".searchex_yuan_fixed_box a").click(function(){
				var hr = $(this).attr("href");
				var anh = $(hr).offset().top;
				$("html,body").stop().animate({scrollTop:anh},800);
				$(this).addClass("searchex_yuan_fixed_on")
						.siblings().removeClass("searchex_yuan_fixed_on")
			})
			$(".spsearchex_yuan_sp_menuarea a").click(function(){
				var hr = $(this).attr("href");
				var anh = $(hr).offset().top;
				$("html,body").stop().animate({scrollTop:anh},800);
				$(this).addClass("spsearchex_yuan_sp_menuon")
						.siblings().removeClass("spsearchex_yuan_sp_menuon");
				$(".spsearchex_yuan_sp_menumodel").hide();
			})
		})
	</script>

</div><!--  / .max-->
<script>
	function guojia() {
		window.location.href='/webviews/searchex_yuanlist?guojia='+$('#guojia').val();
	}
</script>

</body>

</html>
