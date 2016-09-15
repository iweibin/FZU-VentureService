<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理员-福州大学大学生创业服务网</title>
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/FZU-VentureService/Admin/Public/css/reset.css" />
</head>
<body>
	<!-- Modify Start -->
	<div class="modify-wrapper">
		<div class="modify-password-box modify-box">
			<span class="close"></span>
			<form action="/FZU-VentureService/Admin/index.php/home/admin/pwdModify" id="modify-password" class="modify-form" method="post">
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
				<img src="/FZU-VentureService/Admin/Public/images/setting.png" alt="">
				<h1>管理中心</h1>
				<div class="admin-modify">
					<p>你好，<span><?php $user = session('login_manager'); echo $user['name']; ?>！</span><span class="psbtn">修改密码</span><span class="exit"><a href="/FZU-VentureService/Admin/index.php/home/home/logout">注销登录</a></span></p>
				</div>
			</div>
			<div class="user-student-sidenav user-sidenav pull-left">
				<ul>
					<li class="<?php if( $MODULE == 'Notice') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/notice">资讯管理</a></li>
					<li class="user-sidnav-li admin-users <?php if( $MODULE == 'User') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/user">用户管理</a></li>
					<li class="user-sidnav-li admin-projects <?php if( $MODULE == 'Project') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/project">项目管理</a></li>
					<li class="<?php if( $MODULE == 'Field') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/field">入驻申请</a></li>
					<li class="<?php if( $MODULE == 'Class') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/class">培训管理</a></li>
					<li class="<?php if( $MODULE == 'Document') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/document">教材管理</a></li>
					<li class="<?php if( $MODULE == 'Competition') echo 'now';?>"><a href="/FZU-VentureService/Admin/index.php/home/competition">比赛管理</a></li>
				</ul>
			</div>
<!-- 项目管理 -->
<div class="user-box admin-projects-management sub-management pull-right">
	<div class="admin-top admin-projects-management">
		<ul class="admin-management-ul clearfix" id="admin-projects">
			<li class="pull-left now-li">项目审核</li>
			<li class="pull-left">项目信息</li>
		</ul>
	</div>
	<!-- 项目审核 -->
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
			<?php if(is_array($projects)): $i = 0; $__LIST__ = $projects;if( count($__LIST__)==0 ) : echo "暂无待审核的项目信息" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["status"] == 0): ?><tr>
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
							<span class="admin-project-pass admin-pass"><a href="/FZU-VentureService/Admin/index.php/home/project/pass?pid=<?php echo ($v["pid"]); ?>">通过</a></span>
							<span class="admin-project-refuse admin-refuse" id="<?php echo ($v["charge"]["tel"]); ?>" onclick="refuse(this)">拒绝</span>
						</td>
					</tr><?php endif; endforeach; endif; else: echo "暂无待审核的项目信息" ;endif; ?>
			
		</table>
	</div>
	<!-- 项目信息 -->
	<div class="admin-projects-table admin-check-projects-table admin-table" id="projects-check-table">
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
			<?php if(is_array($projects)): $i = 0; $__LIST__ = $projects;if( count($__LIST__)==0 ) : echo "暂无项目信息" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["status"] == 1): ?><tr>
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
							<a href="/FZU-VentureService/Admin/index.php/home/project/detail?pid=<?php echo ($v["pid"]); ?>"><span class="admin-view-info">查看信息</span></a>	
						</td>
					</tr><?php endif; endforeach; endif; else: echo "暂无项目信息" ;endif; ?>
		</table>
	</div>
</div>
			<div class="admin-popup">
				<div class="popup-refuse">
					<form action="/FZU-VentureService/Admin/index.php/home/admin/refuse" method="post">
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
	<script type="text/javascript">
		var refuse = function(e){
			var tel = e.id;
			document.getElementById('receiver').value = tel;
		}
	</script>
	<!-- Admin End -->
	<!-- <script src="/FZU-VentureService/Admin/Public/js/tabswift.js"></script> -->
	<script src="/FZU-VentureService/Admin/Public/js/admin.js"></script>
</body>
</html>