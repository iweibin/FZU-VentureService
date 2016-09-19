<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理员-福州大学大学生创业服务网</title>
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/date/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/01/Admin/Public/date/bootstrap/css/bootstrap-datetimepicker.min.css" /><!--日期插件样式-->
	<script src="/demo/jyzd/01/Admin/Public/date/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
	<script src="/demo/jyzd/01/Admin/Public/js/jquery.form.js" charset="UTF-8"></script>

</head>
<body>
	<!-- Modify Start -->
	<div class="modify-wrapper">
		<div class="modify-password-box modify-box">
			<span class="close"></span>
			<form action="/demo/jyzd/01/Admin/index.php/home/admin/pwdModify" id="modify-password" class="modify-form" method="post">
				<p class="old-line">	
					<input type="password" name="old_pwd" placeholder="旧密码" value="" required>
				</p>
				<p class="new-line">
					<input type="password" name="new_pwd" placeholder="新密码" value="" required>
				</p>
				<p class="submit-line">
					<input class="submit" type="submit" value="确认修改">
				</p>
			</form>
		</div>
	</div>
	<!-- Modify End -->

	<!-- Admin Start -->
	<div class="admin-wrapper">
		<div class="container">
			<div class="user-box-top">
				<img src="/demo/jyzd/01/Admin/Public/images/setting.png" alt="">
				<h1>管理中心</h1>
				<div class="admin-modify">
					<p>你好，<span><?php $user = session('login_manager'); echo $user['name'] != '' ? $user['name'] : "管理员"; ?>！</span><span class="psbtn">修改密码</span><span class="exit"><a href="/demo/jyzd/01/Admin/index.php/home/home/logout">注销登录</a></span></p>
				</div>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/notice/index">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/user/index">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/project/index">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/field/index">基地管理</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/class/index">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/document/index">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/demo/jyzd/01/Admin/index.php/home/competition/index">比赛管理</a></li>
				</ul>
			</div>
<!-- 项目管理 -->
<div class="user-box admin-projects-management sub-management pull-right">
	<div class="admin-top admin-projects-management">
		<ul class="admin-management-ul clearfix" id="admin-projects">
			<li class="pull-left <?php if($now == 'index' ) echo 'now-li';?>"><a href="/demo/jyzd/01/Admin/index.php/home/project/index">项目审核</a></li>
			<li class="pull-left <?php if($now == 'info_list' ) echo 'now-li';?>"><a href="/demo/jyzd/01/Admin/index.php/home/project/info_list">项目信息</a></li>
		</ul>
	</div>
	<!-- 项目信息 -->
	<div class="admin-projects-table admin-check-projects-table admin-table block" id="projects-check-table">
		<table>
			<tr>
				<th class="admin-th-select">
					<input class="admin-project-select-btn" type="checkbox"> 全选
				</th>
				<th class="admin-th-project-id admin-th-id"><span>ID</span></th>
				<th class="admin-th-project-name admin-th-name"><span>项目名</span></th>
				<th class="admin-th-project-username admin-th-username"><span>负责人</span></th>
				<th class="admin-th-project-time admin-th-time"><span>申请时间</span></th>
				<th class="admin-th-project-management admin-th-management"><span>管理操作</span></th>
			</tr>
			<?php if(empty($projects)): ?><tr align="center">
					<td colspan="6">
						暂无项目信息,请先查看审核列表
					</td>
				</tr>
			<?php else: ?>
				<?php if(is_array($projects)): $i = 0; $__LIST__ = $projects;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["status"] == 1): ?><tr>
							<td class="admin-project-select">
								<input class="admin-project-select-btn" type="checkbox">
							</td>
							<td class="admin-project-id"><?php echo ($v["pid"]); ?></td>
							<td class="admin-project-name">
								<a href=""><?php echo ($v["name"]); ?></a>
							</td>
							<td class="admin-project-username"><span><?php echo ($v["charge"]["name"]); ?></span></td>
							<td class="admin-project-time"><span><?php echo ($v["issue_time"]); ?></span></td>
							<td class="admin-project-operation admin-operation">
								<a href="/demo/jyzd/01/Admin/index.php/home/project/detail?pid=<?php echo ($v["pid"]); ?>"><span class="admin-view-info">查看信息</span></a> | 
								
								<?php if($v["is_show"] == 0): ?><a href="/demo/jyzd/01/Admin/index.php/home/project/isShow?pid=<?php echo ($v["pid"]); ?>&action=yes"><span class="admin-view-info">首页显示</span></a>
								<?php else: ?>
									<a href="/demo/jyzd/01/Admin/index.php/home/project/isShow?pid=<?php echo ($v["pid"]); ?>&action=no"><span class="admin-view-info">取消首页显示</span></a><?php endif; ?>
							</td>
						</tr><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
		</table>
	</div>


	<!-- 分页栏 -->
	<div class="pull-right">
		<ul class="pagination">
			<?php if($curPage != 1 ): ?><li><a href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/1" >首页</a></li>
				<li><a href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($curPage-1); ?>">上一页</a></li><?php endif; ?>

			<?php if(($curPage > 3) AND ($curPage < $totalPage-2)): $__FOR_START_4238__=$curPage-2;$__FOR_END_4238__=$curPage+3;for($i=$__FOR_START_4238__;$i < $__FOR_END_4238__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php elseif(($curPage > $totalPage-3) AND ($totalPage > 5)): ?>
				<?php $__FOR_START_175__=$totalPage-5;$__FOR_END_175__=$totalPage;for($i=$__FOR_START_175__;$i < $__FOR_END_175__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php elseif($totalPage > 5): ?>
				<?php $__FOR_START_19644__=1;$__FOR_END_19644__=6;for($i=$__FOR_START_19644__;$i < $__FOR_END_19644__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } ?>
			<?php else: ?>
				<?php $__FOR_START_9285__=1;$__FOR_END_9285__=$totalPage;for($i=$__FOR_START_9285__;$i < $__FOR_END_9285__;$i+=1){ ?><li><a <?php if($i==$curPage) echo "class='now'"; ?> href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($i); ?>" ><?php echo ($i); ?></a></li><?php } endif; ?>

			<?php if($curPage < $totalPage-1): ?><li><a href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($curPage+1); ?>">下一页</a></li>
				<li><a href="/demo/jyzd/01/Admin/index.php/home/project/<?php echo ($now); ?>/<?php echo ($totalPage-1); ?>">末页</a></li><?php endif; ?>

			<li><a href="javascript:void(0);">共 <?php echo ($total); ?> 条记录</a></li>
		</ul>
	</div>
</div>

			<div class="admin-popup">
				<div class="popup-refuse">
					<form action="/demo/jyzd/01/Admin/index.php/home/admin/refuse" method="post">
						<p>请填写拒绝理由</p>
						<p class="refuse-hint">拒绝后将通过短信通知</p>
						<input id="module" type="hidden" name="module" value="<?php echo ($MODULE); ?>">
						<input id="receiver" type="hidden" name="receiver" value="">
						<textarea name="message"></textarea>
						<div class="popup-select clearfix">
							<span class="yes pull-left"><input type="submit" name="sub" value="确认"></span>
							<span class="no pull-right">取消</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Admin End -->
	
	<script src="/demo/jyzd/01/Admin/Public/js/admin.js"></script>


	<!-- 日期插件 -->
	<script src="/demo/jyzd/01/Admin/Public/date/bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script src="/demo/jyzd/01/Admin/Public/date/bootstrap/js/bootstrap.min.js"></script>
	<script src="/demo/jyzd/01/Admin/Public/date/bootstrap/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
		var refuse = function(e){
			var tel = e.id;
			document.getElementById('receiver').value = tel;
		}
		$('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    	});
    	$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd'});
	</script>
</body>
</html>