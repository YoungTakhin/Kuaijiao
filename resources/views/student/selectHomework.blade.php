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
		<p>共{{ $course['row_num'] }}条记录</p>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">作业编号</th>
					<th scope="col">课程名</th>
					<th scope="col">最晚上交时间</th>
					<th scope="col">下载附件</th>
					<th scope="col">提交作业</th>
				</tr>
			</thead>
			<tbody>
				@for ($i = 0; $i < $course['row_num']; $i++)
					<tr>
						<th scope="row">{{ $i + 1 }}</th>
						<td>{{ $course['row'][$i]['homeworkid'] }}</td>
						<td>{{ $course['row'][$i]['coursename'] }}</td>
						<td>{{ $course['row'][$i]['last_time'] }}</td>
						@if ($course['row'][$i]['URL'] == '')
							<td><button type="button" class="btn btn-primary btn-sm" disabled><span class="oi oi-cloud-download" title="下载" aria-hidden="true"></button></td>
						@else
							<td><button type="button" class="btn btn-primary btn-sm"><span class="oi oi-cloud-download" title="下载" aria-hidden="true"></button></td>
						@endif
						<td>
							<button type="button" class="btn btn-primary btn-sm"><span class="oi oi-cloud-upload" title="提交" aria-hidden="true" data-toggle="modal" data-target="#exampleModal{{ $i + 1 }}"></button>
							<!-- Modal -->
							<div class="modal fade" id="exampleModal{{ $i + 1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">{{ $course['row'][$i]['coursename'] }}：{{ $course['row'][$i]['homeworkid'] }}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<div class="custom-file col-sm-12">
														<input name="URL" type="file" class="custom-file-input" id="URL">
														<label class="col-sm-12 custom-file-label" for="URL">请选择要提交的作业</label>
													</div>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
											<button type="button" class="btn btn-primary">提交</button>
										</div>
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