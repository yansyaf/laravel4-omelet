@extends('admin/layout')

@section('title')
  User Management
@stop

@section('header')
  @parent
@stop

@section('navbar')
  @parent
@stop

@section('content')
  @parent

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="page-header">
		<h3>
			User Management
			<div class="pull-right">
				<a href="{{{ URL::to('admin/users/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>

	<table id="users" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2" data-dynatable-column="id">{{{ Lang::get('admin/users/table.id') }}}</th>
				<th class="col-md-2" data-dynatable-column="username">{{{ Lang::get('admin/users/table.username') }}}</th>
				<th class="col-md-2" data-dynatable-column="email">{{{ Lang::get('admin/users/table.email') }}}</th>
				<th class="col-md-2" data-dynatable-column="rolename">{{{ Lang::get('admin/users/table.rolename') }}}</th>
				<th class="col-md-2" data-dynatable-column="confirmed">{{{ Lang::get('admin/users/table.confirmed') }}}</th>
				<th class="col-md-2" data-dynatable-column="created_at">{{{ Lang::get('admin/users/table.created_at') }}}</th>
				<!-- <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th> -->
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>

</div>
@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">

$(document).ready(function() {
	
	$('#users').dynatable({
	  dataset: {
	    ajax: true,
	    ajaxUrl: "{{ URL::to('admin/users/data') }}",
	    ajaxOnLoad: true,
	    records: []
	  }
	});

});
</script>
@stop

@section('scripts')
@stop