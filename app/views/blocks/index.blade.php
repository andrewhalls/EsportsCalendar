@extends('layouts.default')

@section('content')

<h1>All blocks</h1>

<p>{{ link_to_route('blocks.create', 'Add new block') }}</p>

@if (count($blocks) > 0)
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				{{headings}}
			</tr>
		</thead>

		<tbody>
			@foreach ($blocks as $block)
				<tr>
					{{fields}}
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no blocks
@endif

@stop