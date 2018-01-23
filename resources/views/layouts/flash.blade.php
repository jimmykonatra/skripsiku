@if(Session::has('flash_msg'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{Session::get('flash_msg')}}
</div>
@endif @if(Session::has('error_msg'))
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{Session::get('error_msg')}}
</div>
@endif