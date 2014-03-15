@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h4>Current Users:</h4>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th>User</th>
				<th>Status</th>
				<th>Options</th>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td><a href="{{ action('UserController@show', array($user->id)) }}">{{ $user->email }}</a></td>
						<td>{{ $user->status }} </td>
						<td>
							<button class="btn btn-default" type="button" onClick="location.href='{{ action('UserController@edit', array($user->id)) }}'">Edit</button> 
							@if ($user->status != 'Suspended')
								<button class="btn btn-default" type="button" onClick="location.href='{{ route('suspendUserForm', array($user->id)) }}'">Suspend</button> 
							@else
								<button class="btn btn-default" type="button" onClick="location.href='{{ action('UserController@unsuspend', array($user->id)) }}'">Un-Suspend</button> 
							@endif
							@if ($user->status != 'Banned')
								<button class="btn btn-default" type="button" onClick="location.href='{{ action('UserController@ban', array($user->id)) }}'">Ban</button> 
							@else
								<button class="btn btn-default" type="button" onClick="location.href='{{ action('UserController@unban', array($user->id)) }}'">Un-Ban</button> 
							@endif
							
							<button class="btn btn-default action_confirm" href="{{ action('UserController@destroy', array($user->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
  </div>
</div>
@stop
