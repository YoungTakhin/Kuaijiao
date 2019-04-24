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
	<body>
		<div class="col-12 p-2">
			<form name="insertHomework" method="POST" action="{{ url('/operation/insertStudentCourse') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group row">
					<label for="courseid" class="col-sm-2 col-form-label">学生</label>
					<div class="col-sm-10">
						<select name="id" class="form-control custom-select" id="id">
							@for ($i = 0; $i < $studentCourse[0]['row_num2']; $i++)
								<option value="{{ $studentCourse[0]['row2'][$i]['id'] }}">{{ $studentCourse[0]['row2'][$i]['id'] }} : {{ $studentCourse[0]['row2'][$i]['username'] }}</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="courseid" class="col-sm-2 col-form-label">课程</label>
					<div class="col-sm-10">
						<select name="courseid" class="form-control custom-select" id="courseid">
							@for ($i = 0; $i < $studentCourse[1]['row_num1']; $i++)
								<option value="{{ $studentCourse[1]['row1'][$i]['courseid'] }}">{{ $studentCourse[1]['row1'][$i]['courseid'] }} : {{ $studentCourse[1]['row1'][$i]['coursename'] }}</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-10">
						<button name="insertStudentCourse" type="submit" class="btn btn-primary">选课</button>
					</div>
				</div>
			</form>
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