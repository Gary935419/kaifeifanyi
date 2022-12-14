<!doctype html>
<html class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>我的管理后台-咖啡</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport"
		  content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
	<meta http-equiv="Cache-Control" content="no-siteapp"/>
	<link rel="stylesheet" href="<?= STA ?>/css/font.css">
	<link rel="stylesheet" href="<?= STA ?>/css/xadmin.css">
	<script type="text/javascript" src="<?= STA ?>/lib/layui/layui.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?= STA ?>/js/xadmin.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?= STA ?>/js/upload/jquery_form.js"></script>
</head>
<body>
<div class="x-nav">
          <span class="layui-breadcrumb">
<!--            <a href="--><? //= RUN . '/admin/index' ?><!--">最初のページ</a>-->
            <a>
              <cite>会员管理(原产地)</cite></a>
          </span>
	<!--          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="ページを更新">-->
	<!--            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>-->
</div>
<div class="layui-fluid">
	<div class="layui-row layui-col-space15">
		<div class="layui-col-md12">
			<div class="layui-card">
				<div class="layui-card-body ">
					<form class="layui-form layui-col-space5" method="get" action="<?= RUN, '/member/member_listv' ?>">
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="youxiang" id="youxiang" value="<?php echo $youxiang ?>"
								   placeholder="邮件" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="shoujihao" id="shoujihao" value="<?php echo $shoujihao ?>"
								   placeholder="手机号" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="gongsiming" id="gongsiming" value="<?php echo $gongsiming ?>"
								   placeholder="公司名" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="xingming" id="xingming" value="<?php echo $xingming ?>"
								   placeholder="姓名" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<button class="layui-btn" lay-submit="" lay-filter="sreach"><i
										class="layui-icon">&#xe615;</i></button>
						</div>
					</form>
				</div>
				<div class="layui-card-body ">
					<table class="layui-table layui-form">
						<thead>
						<tr>
							<th>手机号</th>
							<th>邮箱</th>
							<th>姓名</th>
							<th>公司名称</th>
							<th>公司地址</th>
							<th>公司简介</th>
						</thead>
						<tbody>
						<?php if (isset($list) && !empty($list)) { ?>
							<?php foreach ($list as $num => $once): ?>
								<tr id="p<?= $once['mid'] ?>" sid="<?= $once['mid'] ?>">
									<td><?= $once['shoujihao'] ?></td>
									<td><?= $once['youxiang'] ?></td>
									<td><?= $once['xing'] ?><?= $once['ming'] ?></td>
									<td><?= $once['gsming'] ?></td>
									<td><?= $once['gsdizhi'] ?></td>
									<td><?= $once['gsjianjie'] ?></td>
								</tr>
							<?php endforeach; ?>
						<?php } else { ?>
							<tr>
								<td colspan="10" style="text-align: center;">暂无数据</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="layui-card-body ">
					<div class="page">
						<?= $pagehtml ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<script>
	layui.use(['form', 'layer'],
			function () {
				var form = layui.form,
						layer = layui.layer;
			});
</script>
</body>
</html>
