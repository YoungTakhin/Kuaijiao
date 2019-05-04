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
		<p>共{{ $homework['row_num'] }}条记录</p>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">课程名</th>
					<th scope="col">作业编号</th>
					<th scope="col">学号</th>
					<th scope="col">学生姓名</th>
					<th scope="col">下载</th>
					<th scope="col">删除</th>
				</tr>
			</thead>
			<tbody>
				@for ($i = 0; $i < $homework['row_num']; $i++)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $homework['row'][$i]['coursename'] }}</td>
						<td>{{ $homework['row'][$i]['homeworkid'] }}</td>
						<td>{{ $homework['row'][$i]['studentid'] }}</td>
						<td>{{ $homework['row'][$i]['username'] }}</td>
						<td>
							<form method="GET" action="{{ url('/teacher/downHomework') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input name="homeworkid" type="text" class="custom-file-input" id="homeworkid" style="display: none;" value="{{ $homework['row'][$i]['homeworkid'] }}">
								<button type="submit" class="btn btn-primary btn-sm"><span class="oi oi-cloud-download" title="下载" aria-hidden="true"></button>
							</form>
						</td>
						<td>
							<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $i + 1 }}"><span class="oi oi-delete" title="删除" aria-hidden="true"></button>
							<div class="modal fade" id="exampleModal{{ $i + 1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<form method="POST" action="{{ url('/teacher/deleteHomework') }}">
											{{ csrf_field() }}
											<input name="homeworkid" type="text" class="custom-file-input" id="homeworkid" style="display: none;" value="{{ $homework['row'][$i]['homeworkid'] }}">
											<input name="studentid" type="text" class="custom-file-input" id="studentid" style="display: none;" value="{{ $homework['row'][$i]['studentid'] }}">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel ">删除作业</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<div class="custom-file col-sm-12">
														<span>是否删除 {{ $homework['row'][$i]['username'] }} 的 {{ $homework['row'][$i]['coursename'] }} 作业：{{ $homework['row'][$i]['homeworkid'] }} ？<br>请确保文件已下载！</span>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
												<button name="deleteHomework" type="submit" class="btn btn-primary">删除</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</td>
					</tr>
				@endfor
			</tbody>
		</table>
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