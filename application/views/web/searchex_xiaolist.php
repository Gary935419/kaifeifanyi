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
    			<a href="<?= RUN . '/webviews/searchex_xiaolist?ltype=2' ?>" class="search_login">
    				<span>English</span>
    			</a>
    		<?php }else{ ?>
    			<a href="<?= RUN . '/webviews/searchex_xiaolist?ltype=1' ?>" class="search_login">
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
				<a href="<?= RUN . '/webviews/searchex_xiaolist?stype=1' ?>" class="search_box_link search_box_on"><?php echo $yuyan1['text3'] ?></a>
				<span class="search_box_dian"></span>
				<a href="<?= RUN . '/webviews/searchex_yuanlist?stype=2' ?>" class="search_box_link"><?php echo $yuyan1['text4'] ?></a>
			</div>
			<div class="searchex_form">
				<input type="text" name="guojia" id="guojia" value="<?php echo $guojia ?>" placeholder="<?php echo $yuyan1['text5'] ?>" />
				<button class="search_form_btu" onclick="guojia()"><?php echo $yuyan1['text6'] ?></button>
			</div>
			<span class="searchex_yuan_num"><?php echo $yuyan1['text10'] ?><?php echo $tiaocount ?></span>
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
			<div class="inner search_list_inner">
				<?php if (empty($ltype)){ ?>
					<div class="zi">
						<a style="font-weight: bold" href="<?= RUN . '/' ?>">首页&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>
						<a style="font-weight: bold" href="#">消费地&nbsp;&nbsp;&nbsp;</a>
					</div>
				<?php }else{ ?>
					<div class="zi">
						<a style="font-weight: bold" href="<?= RUN . '/' ?>">Home&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>
						<a style="font-weight: bold" href="#">Roasters&nbsp;&nbsp;&nbsp;</a>
					</div>
				<?php } ?>
				<!--pc-->
				<div class="search_list_top">
					<span class="search_list_top_all"><?php echo $yuyan1['text8'] ?></span>
					<span class="search_list_top_text"><?php echo $yuyan2['text16'] ?></span>
					<input type="text" id="cai1" name="cai1" value="<?php echo $caigouliang1 ?>"/>
					<font>-</font>
					<input type="text" id="cai2" name="cai2" value="<?php echo $caigouliang2 ?>"/>
					<?php if (empty($ltype)){ ?>
						<span class="search_list_top_text">日期</span>
					<?php }else{ ?>
						<span class="search_list_top_text">Date</span>
					<?php } ?>
					<input type="date" id="date1" name="date1" value="<?php echo $date1 ?>"/>
					<font>-</font>
					<input type="date" id="date2" name="date2" value="<?php echo $date2 ?>"/>

					<button class="search_list_top_btu" onclick="caigo1()"><?php echo $yuyan1['text9'] ?></button>
				</div>
				<!--sp-->
				<div class="spsearch_list_top">
					<span class="spsearch_list_top_all">
					    <?php echo $yuyan1['text8'] ?>
					</span>
					<div class="spsearch_list_top_shou spsearch_list_top_time">
						<span><?php echo $yuyan2['text16'] ?></span>
						<?php if (empty($ltype)){ ?>
						/<span>日期</span>
					    <?php }else{ ?>
						/<span>Date</span>
					    <?php } ?>
						<img src="<?= STA ?>/images/web/jian2.png" alt="" class="spsearch_list_top_show" />
						<img src="<?= STA ?>/images/web/jian3.png" alt="" class="spsearch_list_top_hide" />
					</div>
					<div class="search_list_timemodel">
						<div class="search_list_timemodel_box">
							<input type="text" name="cai3" class="date_picker" id="cai3" value="<?php echo $caigouliang1 ?>"/>
							<span>~</span>
							<input type="text" name="cai4" class="date_picker1" id="cai4" value="<?php echo $caigouliang2 ?>"/>
						</div>
						<div class="search_list_timemodel_box">
							<input type="date" name="date3" class="date_picker" id="date3" value="<?php echo $date1 ?>"/>
							<span>~</span>
							<input type="date" name="date4" class="date_picker1" id="date4" value="<?php echo $date2 ?>"/>
						</div>
						<button class="search_list_chumodel_btu" onclick="caigo2()"><?php echo $yuyan1['text9'] ?></button>
					</div>
				</div>

				<?php if (isset($list) && !empty($list)) { ?>
					<ul class="search_list_list">
						<?php foreach ($list as $num => $once): ?>
							<li class="search_list_item">
								<a href="<?= RUN . '/webviews/searchex_xiao?id='.$once['id'] ?>" class="search_list_link">
									<div class="search_list_item_photo"><img src="<?= $once['dianlogo'] ?>" alt="" /></div>
									<div class="search_list_block">
										<div class="search_listkuai">
											<div class="search_list_info">
												<img src="<?= $once['touxiang'] ?>" alt="" />
												<div class="search_list_box">
													<span class="search_list_xiao"><?= $once['zhou'] ?></span>
													<span class="search_list_da"><?= $once['guojia'] ?></span>
												</div>
											</div>
											<div class="search_list_xian"></div>
											<div class="search_list_area">
												<span style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;word-break: break-all;"><?php echo $yuyan2['text8'] ?>：<?= $once['mingcheng'] ?></span>
												<span style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;word-break: break-all;"><?php echo $yuyan2['text15'] ?>：<?= $once['xinghao'] ?></span>
												<span style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;word-break: break-all;"><?php echo $yuyan2['text16'] ?>：<?= $once['caigouliang'] ?></span>
											</div>
											<div class="spsearch_list_area">
												<img src="<?= STA ?>/images/web/pro3.jpg" alt="" />
												<div class="spsearch_list_box">
													<span style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;word-break: break-all;"><?php echo $yuyan2['text8'] ?>：<?= $once['mingcheng'] ?></span>
													<span style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;word-break: break-all;"><?php echo $yuyan2['text15'] ?>：<?= $once['xinghao'] ?></span>
													<span style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;word-break: break-all;"><?php echo $yuyan2['text16'] ?>：<?= $once['caigouliang'] ?></span>
												</div>
											</div>
										</div>
									</div>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php } else { ?>
					<div style="text-align: center;font-size: 20px;margin-bottom: 100px;">
						<?php echo $yuyan1['text12'] ?>
					</div>
				<?php } ?>
			</div>
			<?php if (empty($youxiang)){ ?>
				<div class="search_list_bottom">
					<span class="search_list_small"><?php echo $yuyan1['text1'] ?>/<?php echo $yuyan1['text2'] ?></span>
					<div class="search_list_bottom_box">
						<a href="<?= RUN . '/webviews/yuanzhuce' ?>"><?php echo $yuyan1['text4'] ?></a>
						<a href="<?= RUN . '/webviews/xiaozhuce' ?>"><?php echo $yuyan1['text3'] ?></a>
					</div>
					<?php if (empty($ltype)){ ?>
						<span class="close">关闭</span>
					<?php }else{ ?>
						<span class="close">Close</span>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		
	</div>
</div><!--  / .max-->

<script>
	function guojia() {
		window.location.href='/webviews/searchex_xiaolist?guojia='+$('#guojia').val();
	}
	function caigo1() {
		window.location.href='/webviews/searchex_xiaolist?caigouliang1='+$('#cai1').val()+'&caigouliang2='+$('#cai2').val()+'&date1='+$('#date1').val()+'&date2='+$('#date2').val();
	}
	function caigo2() {
		window.location.href='/webviews/searchex_xiaolist?caigouliang1='+$('#cai3').val()+'&caigouliang2='+$('#cai4').val()+'&date1='+$('#date3').val()+'&date2='+$('#date4').val();
	}
</script>
</body>

</html>
