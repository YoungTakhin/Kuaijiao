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
	<body class="col-12 m-0">
		<nav class="col-12 navbar navbar-dark bg-primary">
			<div class="col-10 col-sm">
				<a class="col-12 col-sm navbar-brand" href="#">
					<img src="#" width="30" height="30" class="d-inline-block align-top" alt="">
					<span>"快交"运维端</span>
				</a>
			</div>
			<div class="d-none d-sm-block col-12 col-sm text-right">
				<div class="btn-group" role="group" aria-label="Person Information">
					<button type="button" class="btn btn-sm btn-outline-light">个人中心 <span class="oi oi-person" title="个人中心" aria-hidden="true"></span></button>
					<button type="button" id="logout" class="btn btn-sm btn-outline-light">注销 <span class="oi oi-account-logout" title="注销" aria-hidden="true"></span></button>
				</div>
			</div>
			<div class="d-block d-sm-none col-2 col-sm text-right">
				<div class="btn-group">
					<button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#">个人中心 <span class="oi oi-person" title="个人中心" aria-hidden="true"></span></a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="login">注销 <span class="oi oi-account-logout" title="注销" aria-hidden="true"></span></a>
					</div>
				</div>
			</div>
		</nav>
		<div class="row">
			<div class="col-12 col-sm-2 bg-light text-dark text-center align-middle m-0 p-0"><span>{{$user['id']}} {{$user['username']}}</span></div>
			<ul class="col-12 col-sm-10 nav nav-tabs m-0 p-0" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="mode1-tab" data-toggle="tab" href="#mode1" role="tab" aria-controls="mode1" aria-selected="true">学生</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="mode2-tab" data-toggle="tab" href="#mode2" role="tab" aria-controls="mode2" aria-selected="false">教师</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="mode3-tab" data-toggle="tab" href="#mode3" role="tab" aria-controls="mode3" aria-selected="false">课程</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="mode4-tab" data-toggle="tab" href="#mode4" role="tab" aria-controls="mode4" aria-selected="false">选课</a>
				</li>
			</ul>
		</div>
		<div class="row tab-content p-0" id="myTabContent">
			<div class="col-12 tab-pane fade show active" id="mode1" role="tabpanel" aria-labelledby="mode1-tab">
				<div class="row">
					<div class="col-12 col-sm-2 nav flex-column nav-pills p-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active text-center" id="m1o1-tab" data-toggle="pill" href="#m1o1" role="tab" aria-controls="m1o1" aria-selected="true">学生查询</a>
						<a class="nav-link text-center" id="m1o2-tab" data-toggle="pill" href="#m1o2" role="tab" aria-controls="m1o2" aria-selected="false">学生新增</a>
						<a class="nav-link text-center" id="m1o3-tab" data-toggle="pill" href="#m1o3" role="tab" aria-controls="m1o3" aria-selected="false">学生删除</a>
					</div>
					<div class="col-12 col-sm-10 tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="m1o1" role="tabpanel" aria-labelledby="m1o1-tab">
							<iframe src="operation/selectStudent" class="col-12" frameborder="0" height="800vh"></iframe>
						</div>
						<div class="tab-pane fade" id="m1o2" role="tabpanel" aria-labelledby="m1o2-tab">
							<iframe src="insertStudent" class="col-12" frameborder="0" height="800vh"></iframe>
						</div>
						<div class="tab-pane fade" id="m1o3" role="tabpanel" aria-labelledby="m1o3-tab">开发中......</div>
					</div>
				</div>
			</div>
			<div class="col-12 tab-pane fade" id="mode2" role="tabpanel" aria-labelledby="mode2-tab">
				<div class="row">
					<div class="col-12 col-sm-2 nav flex-column nav-pills p-0" id="mode2-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active text-center" id="m2o1-tab" data-toggle="pill" href="#m2o1" role="tab" aria-controls="m2o1" aria-selected="true">教师查询</a>
						<a class="nav-link text-center" id="m2o2-tab" data-toggle="pill" href="#m2o2" role="tab" aria-controls="m2o2" aria-selected="false">教师新增</a>
						<a class="nav-link text-center" id="m2o3-tab" data-toggle="pill" href="#m2o3" role="tab" aria-controls="m2o3" aria-selected="false">小功能3</a>
					</div>
					<div class="col-12 col-sm-10 tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="m2o1" role="tabpanel" aria-labelledby="m2o1-tab">
							<iframe src="operation/selectTeacher" class="col-12" frameborder="0" height="800vh"></iframe>
						</div>
						<div class="tab-pane fade" id="m2o2" role="tabpanel" aria-labelledby="m2o2-tab">开发中......</div>
						<div class="tab-pane fade" id="m2o3" role="tabpanel" aria-labelledby="m2o3-tab">开发中......</div>
					</div>
				</div>
			</div>
			<div class="col-12 tab-pane fade" id="mode3" role="tabpanel" aria-labelledby="mode3-tab">
				<div class="row">
					<div class="col-12 col-sm-2 nav flex-column nav-pills p-0" id="mode3-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active text-center" id="m3o1-tab" data-toggle="pill" href="#m3o1" role="tab" aria-controls="m3o1" aria-selected="true">课程查询</a>
						<a class="nav-link text-center" id="m3o2-tab" data-toggle="pill" href="#m3o2" role="tab" aria-controls="m3o2" aria-selected="false">课程新增</a>
						<a class="nav-link text-center" id="m3o3-tab" data-toggle="pill" href="#m3o3" role="tab" aria-controls="m3o3" aria-selected="false">相关网课</a>
					</div>
					<div class="col-12 col-sm-10 tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="m3o1" role="tabpanel" aria-labelledby="m3o1-tab">
							<iframe src="operation/selectCourse" class="col-12" frameborder="0" height="800vh"></iframe>
						</div>
						<div class="tab-pane fade" id="m3o2" role="tabpanel" aria-labelledby="m3o2-tab">开发中......</div>
						<div class="tab-pane fade" id="m3o3" role="tabpanel" aria-labelledby="m3o3-tab">开发中......</div>
					</div>
				</div>
			</div>
			<div class="col-12 tab-pane fade" id="mode4" role="tabpanel" aria-labelledby="mode4-tab">
				<div class="row">
					<div class="col-12 col-sm-2 nav flex-column nav-pills p-0" id="mode4-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active text-center" id="m4o1-tab" data-toggle="pill" href="#m4o1" role="tab" aria-controls="m4o1" aria-selected="true">选课查询</a>
						<a class="nav-link text-center" id="m4o2-tab" data-toggle="pill" href="#m4o2" role="tab" aria-controls="m4o2" aria-selected="false">学生选课</a>
						<a class="nav-link text-center" id="m4o3-tab" data-toggle="pill" href="#m4o3" role="tab" aria-controls="m4o3" aria-selected="false">小功能3</a>
					</div>
					<div class="col-12 col-sm-10 tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="m4o1" role="tabpanel" aria-labelledby="m3o1-tab">开发中......</div>
						<div class="tab-pane fade" id="m4o2" role="tabpanel" aria-labelledby="m3o2-tab">
							<iframe src="operation/studentCourse" class="col-12" frameborder="0" height="800vh"></iframe>
						</div>
						<div class="tab-pane fade" id="m4o3" role="tabpanel" aria-labelledby="m3o3-tab">开发中......</div>
					</div>
				</div>
			</div>
		</div>	
	</body>

	<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>

	<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
	<script src="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/js/bootstrap.bundle.js"></script>

	<!-- Bootstrap-select -->
	<script src="https://cdn.bootcss.com/bootstrap-select/1.13.5/js/bootstrap-select.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap-select/1.13.5/js/i18n/defaults-zh_CN.js"></script>

	<script type="text/javascript">
		$("#logout").click(function() {
			window.location.href="login";
		});
		
	</script>
</html>