@extends('layouts.master')
@section('content')
	<style type="text/css">
		.add_border{
			border:1px solid #FF0000
		}
	</style>


	<div class="container">
		<form class="form-horizontal" id="add_data" action="{{ route('main.add') }}" method="post" onclick="return false;">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label">填寫人：</label>
				<div class="col-sm-10">
					<input class="form-control add_data_text" id="form_name" name="form_name" type="text" value="">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">預計完成時間：</label>
				<div class="col-sm-10">
					<input class="form-control add_data_text" id="form_finish_time" name="form_finish_time" type="text" value="">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">內容：</label>
				<div class="col-sm-10">
					<textarea class="form-control add_data_text" rows="5" id="form_content" name="form_content"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">備註：</label>
				<div class="col-sm-10">
					<input class="form-control add_data_text" id="form_remark" name="form_remark" type="text" value="">
				</div>
			</div>
			<div class="pull-right">
				<button type="reset" class="btn btn-default">清除</button>
				<button type="submit" id="click_submit" class="btn btn-default">送出</button>
			</div>
		</form>
	</div>

	<script type="text/javascript">
		$('document').ready(function(){
			$("#click_submit").click(function(){
				var send_commit=true;
				$(".add_data_text").each(function(){
					console.log($(this).val());
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
		});

	</script>

@endsection