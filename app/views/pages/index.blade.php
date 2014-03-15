@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')
<h4>Pages:</h4>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th>#</th>
				<th>Slug</th>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Options</th>
			</thead>
			<tbody>
				@foreach ($pages as $page)
					<tr>
						<td><a href="{{ action('PagesController@show', array($page->id)) }}">{{ $page->id }}</a></td>
                        <td><a href="{{ action('PagesController@show', array($page->id)) }}">{{ $page->slug }}</a></td>
						<td>{{ $page->title }} </td>
                        <td>{{ $page->author }} </td>
                        <td>{{ $page->status }} </td>
						<td>
							<button class="btn btn-default" type="button" onClick="location.href='{{ action('PagesController@edit', array($page->id)) }}'">Edit</button>
							<button class="btn btn-default action_confirm" href="{{ action('PagesController@destroy', array($page->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
  </div>
</div>
@stop
