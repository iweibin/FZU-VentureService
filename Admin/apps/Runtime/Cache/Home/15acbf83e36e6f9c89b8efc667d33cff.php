<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>注册-福州大学创业服务网</title>
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/Admin/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/Admin/Public/css/admin.css" />
	<link rel="stylesheet" type="text/css" href="/demo/jyzd/Admin/Public/css/reset.css" />
	<!-- <link rel="stylesheet" href="<?php echo BASE_URL; ?>/Public/css/bootstrap.min.css" >
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/Public/css/admin.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/Public/css/reset.css"> -->
</head>
<body>
	<div class="signup-wrapper">
		<div class="container">
			<div class="signup-content">
				<div class="signup-logo">
					<a href="index.html"><img src="/demo/jyzd/Admin/Public/images/logo.png" alt=""></a>
				</div>
				
				<div class="signup-box">
					<div class="signup-form-student signup-form block">
						<form id="signup-form-student" class="signup-form-users" action="">
							<p class="base-information">
								<label for="susername">用户名：</label>
								<input id="susername" name="username" type="text" required>
							</p> 
							<p class="base-information">
								<label for="spassword">密码：</label>
								<input id="spassword" name="password" type="password" required>
							</p>
			
							<p>
								<input class="submit" type="submit" value="登录">
							</p>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script src="js/tabswift.js"></script>
	<script src="js/verify.js"></script>
</body>
</html>