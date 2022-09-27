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
    <script src="<?= STA ?>/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?= STA ?>/js/jquery.mini.js"></script>
    <script type="text/javascript" src="<?= STA ?>/js/xadmin.js"></script>
</head>
<body>
<div class="x-nav">
          <span class="layui-breadcrumb">
            <a>
              <cite>农场主信息</cite></a>
          </span>
</div>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-body ">
                    <form class="layui-form layui-col-space5" method="get" action="<?= RUN, '/goods/goods_list' ?>">
                        <div class="layui-inline layui-show-xs-block">
                            <input type="text" name="xingming" id="xingming" value="<?php echo $xingming ?>"
                                   placeholder="农场主名称" autocomplete="off" class="layui-input">
                        </div>
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="youxiang" id="youxiang" value="<?php echo $youxiang ?>"
								   placeholder="邮件" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-inline layui-show-xs-block">
							<input type="text" name="dianhua" id="dianhua" value="<?php echo $dianhua ?>"
								   placeholder="电话" autocomplete="off" class="layui-input">
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
                            <th>语言</th>
                            <th>农场主名称</th>
							<th>显示状态</th>
                            <th>农场主头像</th>
                            <th>添加时间</th>
							<th>编辑时间</th>
                            <th>操作</th>
                        </thead>
                        <tbody>
                        <?php if (isset($list) && !empty($list)) { ?>
                            <?php foreach ($list as $num => $once): ?>
                                <tr id="p<?= $once['id'] ?>" sid="<?= $once['id'] ?>">
									<?php if ($once['yuyanflg']==1){ ?>
										<td style="color: green;">中文</td>
									<?php }elseif ($once['yuyanflg']==2){ ?>
										<td style="color: red;">英文</td>
									<?php }else{ ?>
										<td style="color: #ff820b;">数据错误</td>
									<?php } ?>
                                    <td><?= $once['xingming'] ?></td>
									<?php if ($once['zhuangtai']==1){ ?>
									<td style="color: green;">显示中</td>
									<?php }elseif ($once['zhuangtai']==2){ ?>
										<td style="color: red;">非显示</td>
									<?php }else{ ?>
										<td style="color: #ff820b;">申请中</td>
									<?php } ?>
                                    <td><img src="<?= $once['touxiang'] ?>" style="width: 50px;height: 50px;"></td>
                                    <td><?= date('Y-m-d H:i:s', $once['addtime']) ?></td>
									<td><?= empty($once['updatetime'])?'暂无编辑':date('Y-m-d H:i:s', $once['updatetime']) ?></td>
                                    <td class="td-manage">
                                        <button class="layui-btn layui-btn-normal"
                                                onclick="xadmin.open('编辑','<?= RUN . '/goods/goods_edit?id=' ?>'+'<?= $once['id'] ?>',1000,600)">
                                            <i class="layui-icon">&#xe642;</i>编辑
                                        </button>
										<button class="layui-btn layui-btn-normal"
												onclick="xadmin.open('翻译','<?= RUN . '/goods/goods_edit?id=' ?>'+'<?= $once['idf'] ?>',1000,600)">
											<?php if ($once['yuyanflg']==1){ ?>
												<i class="layui-icon">&#xe642;</i>英文翻译
											<?php }elseif ($once['yuyanflg']==2){ ?>
												<i class="layui-icon">&#xe642;</i>中文翻译
											<?php }else{ ?>
											<?php } ?>
										</button>
										<?php if ($once['zhuangtai']==1){ ?>
											<button class="layui-btn layui-btn-normal"
													onclick="goods_delete_state('<?= $once['id'] ?>',2)"><i class="layui-icon">&#xe642;</i>不显示
											</button>
										<?php }elseif ($once['zhuangtai']==2){ ?>
											<button class="layui-btn layui-btn-normal"
													onclick="goods_delete_state('<?= $once['id'] ?>',1)"><i class="layui-icon">&#xe642;</i>显示
											</button>
											<button class="layui-btn layui-btn-danger"
													onclick="goods_delete('<?= $once['id'] ?>')"><i class="layui-icon">&#xe640;</i>删除
											</button>
										<?php }else{ ?>
											<button class="layui-btn layui-btn-normal"
													onclick="goods_delete_state('<?= $once['id'] ?>',1)"><i class="layui-icon">&#xe642;</i>显示
											</button>
											<button class="layui-btn layui-btn-danger"
													onclick="goods_delete('<?= $once['id'] ?>')"><i class="layui-icon">&#xe640;</i>删除
											</button>
										<?php } ?>



                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="11" style="text-align: center;">暂无数据</td>
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
</body>
<script>
    function goods_delete(id) {
        layer.confirm('您是否确认删除？', {
                title: '温馨提示',
                btn: ['确认', '取消']
                // 按钮
            },
            function (index) {
                $.ajax({
                    type: "post",
                    data: {"id": id},
                    dataType: "json",
                    url: "<?= RUN . '/goods/goods_delete' ?>",
                    success: function (data) {
                        if (data.success) {
                            $("#p" + id).remove();
                            layer.alert(data.msg, {
                                    title: '温馨提示',
                                    icon: 6,
                                    btn: ['确认']
                                },
                            );
                        } else {
                            layer.alert(data.msg, {
                                    title: '温馨提示',
                                    icon: 5,
                                    btn: ['确认']
                                },
                            );
                        }
                    },
                });
            });
    }

	function goods_delete_state(id,zhuangtai) {
		layer.confirm('您是否确认更改显示状态？', {
					title: '温馨提示',
					btn: ['确认', '取消']
					// 按钮
				},
				function (index) {
					$.ajax({
						type: "post",
						data: {"id": id,"zhuangtai": zhuangtai},
						dataType: "json",
						url: "<?= RUN . '/goods/goods_delete_state' ?>",
						success: function (data) {
							if (data.success) {
								layer.alert(data.msg, {
											title: '温馨提示',
											icon: 6,
											btn: ['确认']
										},
										function () {
											window.location.reload();
										}
								);
							} else {
								layer.alert(data.msg, {
											title: '温馨提示',
											icon: 5,
											btn: ['确认']
										},
										function () {
											window.location.reload();
										}
								);
							}

						},
					});
				});
	}
</script>
</html>
