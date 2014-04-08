@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Broadcasts
@stop

@section('page-title')
@parent
Broadcasts
@stop

{{-- Content --}}
@section('content')

<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">
    <h3 class="box-title">All Broadcasts</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
    <th>Title</th>
    <th>Game</th>
    <th>Start</th>
    <th>End</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>

@foreach($broadcasts as $broadcast)
<tr>
    <td>{{ $broadcast->title }}</td>
    <td>{{ $broadcast->game->name }}</td>
    <td>{{ $broadcast->match }} Vs {{ $broadcast->match }}</td>
    <td>{{ $broadcast->start_at }}</td>
    <td>{{ $broadcast->end_at }}</td>
    <td>X</td>
</tr>
@endforeach

</tbody>
<tfoot>
<tr>
    <th>Title</th>
    <th>Game</th>
    <th>Start</th>
    <th>End</th>
    <th>Actions</th>
</tr>
</tfoot>
</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>


<div class="pull-right">
    <a href="{{ URL::route('admin.genres.create') }}" class="btn btn-success btn-lg">Add New Genre</a>
</div>

</section><!-- /.content -->
@stop

