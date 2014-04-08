@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Games
@stop

@section('page-title')
@parent
Games
@stop

{{-- Content --}}
@section('content')

<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">
    <h3 class="box-title">All Games</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
    <th>Name</th>
    <th>URL</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>

@foreach($games as $game)
<tr>
    <td>{{ $game->name }}</td>
    <td>{{ $game->url }}</td>
    <td>X</td>
</tr>
@endforeach

</tbody>
<tfoot>
<tr>
    <th>Name</th>
    <th>URL</th>
    <th>Actions</th>
</tr>
</tfoot>
</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>

<div class="pull-right">
<a href="{{ URL::route('admin.games.create') }}" class="btn btn-success btn-lg">Add New Game</a>
</div>

</section><!-- /.content -->
@stop

