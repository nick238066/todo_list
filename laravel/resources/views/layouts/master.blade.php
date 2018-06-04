{{-- resources/views/layouts/master.blade.php --}}

<!DOCTYPE html>
<html>
<head>
	<title>Todo List</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

		<style>
			.fakeimg {
				height: 200px;
				background: #aaa;
			}
	  </style>
</head>
<body>
	<div class="jumbotron text-center" style="margin-bottom:0">
		<h1>Todo List</h1>
		<p>Strike while the iron is hot. 打鐵趁熱</p> 
	</div>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" href="{{ route('main.index') }}">全部</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('main.done') }}">已完成</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('main.processing') }}">處理中</a>
				</li> 
				<li class="nav-item">
					<a class="nav-link" href="{{ route('main.process') }}">待處理</a>
				</li> 
				<li class="nav-item">
					<a class="nav-link" href="{{ route('main.delete') }}">已刪除</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('main.add') }}">新增事項</a>
				</li>    
			</ul>
		</div>  
	</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
  	
  	@yield('content')

  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#table_id').DataTable();
	});
</script>

</body>
</html>