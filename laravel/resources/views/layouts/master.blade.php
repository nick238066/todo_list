{{-- resources/views/layouts/master.blade.php --}}

<!DOCTYPE html>
<html>
<head>
	<title>Todo List</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

		<style>
			.fakeimg {
				height: 200px;
				background: #aaa;
			}

			.text_red{
				color: red;
			}

			.add_border{
				border:1px solid #FF0000
			}

			#table_id th,.align_center{
				text-align: center;
			}

	  </style>
</head>
<body>
	<div class="jumbotron text-center" style="margin-bottom:0">
		<h1>Todo List</h1>
		<p>Strike while the iron is hot. 打鐵趁熱</p> 
	</div>

	<!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> -->
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('main.index') }}">全部</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="nav-item">
				<a href="{{ route('main.done') }}">已完成</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('main.processing') }}">處理中</a>
			</li> 
			<li class="nav-item">
				<a href="{{ route('main.process') }}">待處理</a>
			</li> 
			<li class="nav-item">
				<a href="{{ route('main.delete') }}">已刪除</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('main.add') }}">新增事項</a>
			</li>    
		</ul>
	</nav>

<div class="container" style="margin-top:30px;margin-bottom:30px">
  <div class="row">
  	
  	@yield('content')

  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  	<p>Copyright (C) 2018, Nick Hsieh</p>
</div>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#table_id').DataTable();
	});
</script>

</body>
</html>