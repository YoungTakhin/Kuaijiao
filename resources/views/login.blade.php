<!DOCTYPE html>
<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<meta name="Keywords" content="">
		<meta name="Description" content="">

		<title>"快交"作业提交系统</title>

		<link rel="icon" type="image/x-icon" href="" />
		<!-- Bootstrap -->
		<link href="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap.css" rel="stylesheet">
		<!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
		<!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
		<!--[if lt IE 9]>
			<script src="https://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
			<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.js"></script>
		<![endif]-->

		<!-- Open-iconic -->
		<link href="https://cdn.bootcss.com/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" rel="stylesheet">

		<!-- Bootstrap-select -->
		<link href="https://cdn.bootcss.com/bootstrap-select/1.13.5/css/bootstrap-select.css" rel="stylesheet">

		<!-- 自定义CSS -->
		<link rel="stylesheet" type="text/css" href="">
		<style type="text/css">
		</style>
	</head>
	<body class="col-12">
		<div style="height: 30vh;"></div>
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-auto">
					<ul class="nav">
						<li class="nav-item">
							<a class="list-group-item list-group-item-action active" id="list-student-list" data-toggle="list" href="#list-student" role="tab" aria-controls="student">学生</a>
						</li>
						<li class="nav-item">
							<a class="list-group-item list-group-item-action" id="list-teacher-list" data-toggle="list" href="#list-teacher" role="tab" aria-controls="teacher">教师</a>
						</li>
						<li class="nav-item">
							<a class="list-group-item list-group-item-action" id="list-operation-list" data-toggle="list" href="#list-operation" role="tab" aria-controls="operation">管理</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row align-items-center justify-content-center">
				<div class="col-auto">
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active p-2" id="list-student" role="tabpanel" aria-labelledby="list-student-list">
							<form name="slogin" method="POST" action="slogin.php">
								<div class="col-12">
									<table>
										<tr>
											<td>学号：</td>
											<td><input name="id" type="studentId" class="form-control" id="inputPassword" placeholder="请输入学号"></td>
										</tr>
										<tr>
											<td>密码：</td>
											<td><input name="password" type="password" class="form-control" id="inputPassword" placeholder="请输入密码"></td>
										</tr>
										<tr>
											<td colspan="2">
												<button name="slogin" type="submit" id="student" class="btn btn-primary btn-block">登录</button>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">忘记密码</a>
											</td>
											<td class="text-right">
												<a href="#">注册</a>
											</td>
										</tr>
									</table>
								</div>
							</form>
						</div>
						<div class="tab-pane fade p-2" id="list-teacher" role="tabpanel" aria-labelledby="list-teacher-list">
							<form name="tlogin" method="POST" action="tlogin.php">
								<div class="col-12">
									<table>
										<tr>
											<td>工号：</td>
											<td><input name="id" type="teacherId" class="form-control" id="inputPassword" placeholder="请输入工号"></td>
										</tr>
										<tr>
											<td>密码：</td>
											<td><input name="password" type="password" class="form-control" id="inputPassword" placeholder="请输入密码"></td>
										</tr>
										<tr>
											<td colspan="2">
												<button name="tlogin" type="submit" id="teacher" class="btn btn-primary btn-block">登录</button>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">忘记密码</a>
											</td>
											<td class="text-right">
												<a href="#">注册</a>
											</td>
										</tr>
									</table>
								</div>
							</form>
						</div>
						<div class="tab-pane fade p-2" id="list-operation" role="tabpanel" aria-labelledby="list-operation-list">
							<form name="ologin" method="POST" action="ologin.php">
								<div class="col-12">
									<table>
										<tr>
											<td>账号：</td>
											<td><input name="id" type="operationId" class="form-control" id="inputPassword" placeholder="请输入账号"></td>
										</tr>
										<tr>
											<td>密码：</td>
											<td><input name="password" type="password" class="form-control" id="inputPassword" placeholder="请输入密码"></td>
										</tr>
										<tr>
											<td colspan="2">
												<button name="ologin" type="submit" id="operation" class="btn btn-primary btn-block">登录</button>
											</td>
										</tr>
										<tr>
											<td>
												<a href="#">忘记密码</a>
											</td>
											<td class="text-right">
												<a href="#">注册</a>
											</td>
										</tr>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>{{$stat}}</div>
	</body>

	<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>

	<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
	<script src="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/js/bootstrap.bundle.js"></script>

	<!-- Bootstrap-select -->
	<script src="https://cdn.bootcss.com/bootstrap-select/1.13.5/js/bootstrap-select.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap-select/1.13.5/js/i18n/defaults-zh_CN.js"></script>

	<script type="text/javascript">
		
	</script>
</html>