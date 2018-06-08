@extends('layouts.master')
@section('content')
	<div style="margin:0px auto;">
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th>項次</th>
					<th>名稱</th>
					<th>預計完成時間</th>
					<th>內容</th>
					<th>備註</th>
					<th>詳情</th>
				</tr>
			</thead>
			<tbody>
				@foreach($post as $list)
					<tr>
						<td>{{$list->id}}</td>
						<td>{{$list->write_name}}</td>
						<td>{{$list->finish_time}}</td>
						<td>{{$list->content}}</td>
						<td>{{$list->remark}}</td>
						<td><input type="button" value="查看"></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection