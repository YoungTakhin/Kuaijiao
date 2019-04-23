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
			<form name="insertHomework" method="POST" action="{{ url('/teacher/upHomework') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group row">
					<label for="courseid" class="col-sm-2 col-form-label">课程</label>
					<div class="col-sm-10">
						<select name="courseid" class="form-control custom-select" id="courseid">
							@for ($i = 0; $i < $course['row_num']; $i++)
								<option selected value="{{ $course['row'][0]['courseid'] }}">{{ $course['row'][0]['coursename'] }}</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="description" class="col-sm-2 col-form-label">作业描述</label>
					<div class="col-sm-10">
						<textarea name="description" class="form-control" id="description" placeholder="请输入作业描述"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="lastdate" class="col-sm-2 col-form-label">最晚上交时间</label>
					<div class="col-sm-10">
						<input name="lastdate" type="text" class="form-control" id="lastdate" placeholder="请选择最晚上交时间">
					</div>
				</div>
				<div class="form-group row">
					<label for="URL" class="col-sm-2 col-form-label">作业附件</label>
					<div class="col-sm-10">
						<div class="custom-file col-sm-12">
							<input name="URL" type="file" class="custom-file-input" id="URL">
							<label class="col-sm-12 custom-file-label" for="URL">请上传作业附件</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-10">
						<button name="upHomework" type="submit" class="btn btn-primary">布置</button>
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