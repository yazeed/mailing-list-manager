@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

<div class="row">
	<h4>Current Users:</h4>
	<table class="full-width">
		<thead>
			<th>User</th>
			<th>Status</th>
			<th>Options</th>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td><a href="{{ action('Sentinel\UserController@show', array($user->id)) }}">{{ $user->email }}</a></td>
					<td>{{ $user->status }} </td>
					<td>
						<button class="button small" type="button" onClick="location.href='{{ action('Sentinel\UserController@edit', array($user->id)) }}'">Edit</button> 
						@if ($user->status != 'Suspended')
							<button class="button small" type="button" onClick="location.href='{{ route('Sentinel\suspendUserForm', array($user->id)) }}'">Suspend</button> 
						@else
							<button class="button small" type="button" onClick="location.href='{{ action('Sentinel\UserController@unsuspend', array($user->id)) }}'">Un-Suspend</button> 
						@endif
						@if ($user->status != 'Banned')
							<button class="button small" type="button" onClick="location.href='{{ action('Sentinel\UserController@ban', array($user->id)) }}'">Ban</button> 
						@else
							<button class="button small" type="button" onClick="location.href='{{ action('Sentinel\UserController@unban', array($user->id)) }}'">Un-Ban</button> 
						@endif
						
						<button class="button small alert action_confirm" href="{{ action('Sentinel\UserController@destroy', array($user->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>


@stop
