@extends('layouts.master')
@section('content')
	<div style="width:70%;margin:0px auto;">
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th style="width:10%">項次</th>
					<th style="width:50%">內容</th>
					<th style="width:15%">預計完成時間</th>
					<th style="width:15%">填寫人</th>
					<th style="width:10%">詳情</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1?>
				@foreach($post as $list)
					<tr>
						<td class="align_center"><?php echo $i?></td>
						<td>{{$list->content_min}}</td>
						<td class="align_center">{{$list->finish_time}}</td>
						<td class="align_center">{{$list->write_name}}</td>
						<td class="align_center"><input type="button" class="load_detail" data-id="{{$list->id}}" data-toggle="modal" data-target="#myModal" value="查看"></td>
					</tr>
					<?php $i++?>
				@endforeach
			</tbody>
		</table>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">詳情</h4>
				</div>

				<div class="modal-body">
					<div>
						<form class="form-horizontal" id="add_data" action="{{ route('main.update_action') }}" method="post" onclick="return false;" autocomplete="off">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<input type="hidden" name="data_id" value="">
							<div class="form-group">
								<label class="col-sm-3 control-label"><span class="text_red">*</span>填寫人：</label>
								<div class="col-sm-9">
									<input class="form-control add_data_text" id="form_name" name="form_name" type="text" value="" disabled="disabled">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><span class="text_red">*</span>預計完成時間：</label>
								<div class="col-sm-9">
									<input class="form-control add_data_text" id="form_finish_time" name="form_finish_time" type="text" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><span class="text_red">*</span>內容：</label>
								<div class="col-sm-9">
									<textarea class="form-control add_data_text" rows="5" id="form_content" name="form_content"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">備註：</label>
								<div class="col-sm-9">
									<input class="form-control" id="form_remark" name="form_remark" type="text" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">狀態：</label>
								<div class="col-sm-9">
									<select id="status" name="status">
										<option value="0">待處理</option>
										<option value="1">處理中</option>
										<option value="2">已完成</option>
										<option value="9">刪除</option>
									</select>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" id="click_submit" class="btn btn-default">Update</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		(function($){
			var post_arr=[];
			var post = '<?php echo json_encode($post)?>';
			post = JSON.parse(post);
			// console.log(post);
			for(var key in post){
				// console.log(post[key]);
				post_arr[post[key]['id']]=post[key];
			}
			// console.log(post_arr);
			$(".load_detail").on('click',function(){
				var id = $(this).attr('data-id');
				$("input[name='data_id']").val(post_arr[id]['id']);
				$("#form_name").val(post_arr[id]['write_name']);
				$("#form_finish_time").val(post_arr[id]['finish_time']);
				$("#form_content").val(post_arr[id]['content']);
				$("#form_remark").val(post_arr[id]['remark']);
				$("#status").val(post_arr[id]['status']);
				// $("#add_data").append('<input type="hidden" name="data_id" value="'+post_arr[id]['id']+'">')
				
			});

			$("#click_submit").click(function(){
				var send_commit=true;
				$(".add_data_text").each(function(){
					// console.log($(this).val());
					var exp = $(this).val();
					if(exp === null || exp==''){
					    $(this).addClass('add_border');
					    send_commit=false;
					}else{
						$(this).removeClass('add_border');
					}
				});
				
				if(send_commit){
					$("#add_data").submit();
				}
			});

			$( "#form_finish_time" ).datepicker({
				dateFormat:"yy-mm-dd",
				minDate:"-0"
			});
		})(jQuery)
	</script>
	  
@endsection