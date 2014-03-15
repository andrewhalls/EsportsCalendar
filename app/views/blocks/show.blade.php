@extends('layouts.default')

@section('content')

<h1>All blocks</h1>

<p>{{ link_to_route('blocks.create', 'Add new block') }}</p>

<div class="well clearfix">
    <div class="col-md-8">
        @if ($block->first_name)
        <p><strong>First Name:</strong> {{ $block->first_name }} </p>
        @endif
        @if ($block->last_name)
        <p><strong>Last Name:</strong> {{ $block->last_name }} </p>
        @endif
        <p><strong>Email:</strong> {{ $block->email }}</p>

    </div>
</div>

<hr />

<h4>Block Object</h4>

<div>
    <p>{{ var_dump($block) }}</p>
</div>

<hr>

{{ $block->renderable->show() }}

@stop