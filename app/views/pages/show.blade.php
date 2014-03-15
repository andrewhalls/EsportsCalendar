@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
	<h4>Account Profile</h4>
	
  	<div class="well clearfix">
	    <div class="col-md-8">
		    @if ($page->first_name)
		    	<p><strong>First Name:</strong> {{ $page->first_name }} </p>
			@endif
			@if ($page->last_name)
		    	<p><strong>Last Name:</strong> {{ $page->last_name }} </p>
			@endif
		    <p><strong>Email:</strong> {{ $page->email }}</p>
		    
		</div>
		<div class="col-md-4">
			<p><em>Account created: {{ $page->created_at }}</em></p>
			<p><em>Last Updated: {{ $page->updated_at }}</em></p>
			<button class="btn btn-primary" onClick="location.href='{{ action('PagesController@edit', array($page->id)) }}'">Edit Profile</button>
		</div>
	</div>

	<hr />

	<h4>Page Object</h4>

	<div>
		<p>{{ var_dump($page) }}</p>
	</div>

@stop
