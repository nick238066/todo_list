@extends('layouts.master')
@section('content')
	<div style="margin:0px auto;">
		<form class="form-horizontal" action="{{ route('main.add') }}" method="post">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<div class="form-group">
				<label class="col-sm-2 control-label">填寫人：</label>
				<div class="col-sm-10">
					<input class="form-control" id="form_name" name="form_name" type="text" value="">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">預計完成時間：</label>
				<div class="col-sm-10">
					<input class="form-control" id="form_finish_time" name="form_finish_time" type="text" value="">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">內容：</label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="5" id="form_content" name="form_content"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">備註：</label>
				<div class="col-sm-10">
					<input class="form-control" id="form_remark" name="form_remark" type="text" value="">
				</div>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
@endsection