@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
@parent
Lists
@stop

{{-- Content --}}
@section('content')

<div class="row">
	<div class="small-6 columns">
		<h3>Your Lists</h3>
	</div>
	<div class="small-6 columns">
		<a class="button right" href="{{ action('DistributionController@create') }}">New List</a>
	</div>
</div>

<div class="row">
	
	<table class="full-width">
		<thead>
			<th>Name</th>
			<th>Options</th>
		</thead>
		<tbody>
			@foreach ($distributions as $distribution)
				<tr>
					<td>
						<a href="{{ action('DistributionController@show', $distribution->id) }}">{{{ $distribution->firstName . " " . $distribution->middleName . " " . $distribution->lastName }}}</a>
					</td>
					<td>
						<button class="button small" type="button" onClick="location.href='{{ action('DistributionController@edit', array($distribution->id)) }}'">Edit</button> 
						<button class="button small alert action_confirm" href="{{ action('DistributionController@destroy', array($distribution->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="row">
	{{ $distributions->links('layouts.pagination') }}
</div>


@stop
